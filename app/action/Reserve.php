<?php
/**
 *  Reserve.php
 *
 *  @author     {$author}
 *  @package    Seminar
 *  @version    $Id: skel.action.php 387 2006-11-06 14:31:24Z cocoitiban $
 */

/**
 *  reserveフォームの実装
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Seminar
 */
class Seminar_Form_Reserve extends Seminar_ActionForm
{
    /** @var    bool    バリデータにプラグインを使うフラグ */
    var $use_validator_plugin = true;

    /**
     *  @access private
     *  @var    array   フォーム値定義
     */
    var $form = array(
        'seq' => array(
            'type'          => VAR_TYPE_STRING,   // 入力値型
            'form_type'     => FORM_TYPE_HIDDEN,  // フォーム型
            'name'          => 'seq',             // 表示名
            'required'      => false,             // 必須オプション(true/false)
        ),
        'audience_login_umu' => array(
            'type'          => VAR_TYPE_STRING,   // 入力値型
            'form_type'     => FORM_TYPE_RADIO,   // フォーム型
            'name'          => '受講者ログイン有無',    // 表示名
            'required'      => true,              // 必須オプション(true/false)
            'option'        => array('1'=>'有','0'=>'無'),
        ),
        'audience_login_id' => array(
            'type'          => VAR_TYPE_STRING,   // 入力値型
            'form_type'     => FORM_TYPE_TEXT,    // フォーム型
            'name'          => '受講者ID',        // 表示名
            'required'      => false,            // 必須オプション(true/false)
            'min'           => 6,                // 最小値
            'regexp'        => '/^[0-9a-zA-Z_-]+$/', // 文字種指定(正規表現)
        ),
        'audience_login_pass' => array(
            'type'          => VAR_TYPE_STRING,   // 入力値型
            'form_type'     => FORM_TYPE_TEXT,    // フォーム型
            'name'          => '受講者パスワード',// 表示名
            'required'      => false,             // 必須オプション(true/false)
            'min'           => 6,                // 最小値
            'regexp'        => '/^[0-9a-zA-Z_-]+$/', // 文字種指定(正規表現)
        ),
        'tyoukou_option' => array(
            'type'          => VAR_TYPE_STRING,   // 入力値型
            'form_type'     => FORM_TYPE_CHECKBOX,    // フォーム型
            'name'          => '聴講オプション',// 表示名
            'required'      => false,             // 必須オプション(true/false)
            'option'        => array('1'=>''),
        ),
        'tyoukou_cnt' => array(
            'type'          => VAR_TYPE_STRING,   // 入力値型
            'form_type'     => FORM_TYPE_TEXT,    // フォーム型
            'name'          => '発行ID数',        // 表示名
            'required'      => false,             // 必須オプション(true/false)
            'regexp'        => '/^[0-9]+$/',      // 文字種指定(正規表現)
        ),
        'regist_btn' => array(
            'type'          => VAR_TYPE_STRING,   // 入力値型
            'form_type'     => FORM_TYPE_SUBMIT,  // フォーム型
            'name'          => '登録',            // 表示名
        ),
        'menu_btn' => array(
            'type'          => VAR_TYPE_STRING,   // 入力値型
            'form_type'     => FORM_TYPE_SUBMIT,  // フォーム型
            'name'          => 'メニュー',        // 表示名
        ),
        'login_btn' => array(
            // ログアウトの定義
            'type'          => VAR_TYPE_STRING, // 入力値型
            'form_type'     => FORM_TYPE_TEXT,  // フォーム型
            'name'          => 'ログアウト',    // 表示名
        ),
    );
}

/**
 *  reserveアクションの実装
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Seminar
 */
class Seminar_Action_Reserve extends Seminar_ActionClass
{
    /**
     *  reserveアクションの前処理
     *
     *  @access public
     *  @return string      遷移名(正常終了ならnull, 処理終了ならfalse)
     */
    function prepare()
    {
        // セッションログイン情報チェック
        if (!strlen($_SESSION['user_seq'])) {
            $this->ae->add('','ログインエラー', E_DB_QUERY);
            return 'adminlogin';
        }
        if ($this->af->get('login_btn') == "ログアウト") {
            // SESSION情報削除
            $_SESSION = array();
            session_destroy();
            return 'adminlogin';
        }
        // メニューボタン押下
        if ($this->af->get('menu_btn') == "メニュー") {
            header('Location: index.php?action_menu=true');
        }
        // 登録ボタン押下
        if ($this->af->get('regist_btn') == "登録") {
            // 入力データのバリデート(値の検証)
            if ($this->af->validate() > 0) {
                return 'reserve';
            }
            if ($this->af->get('audience_login_umu')==1 &&
               (!$this->af->get('audience_login_id') ||
                !$this->af->get('audience_login_pass'))) {
                $this->ae->add('','受講者ログインID／受講者パスワードを入力してください', E_DB_QUERY);
                return 'reserve';
            }
            if ($this->af->get('tyoukou_option')==1) {
                if (!$this->af->get('tyoukou_cnt')) {
                  $this->ae->add('','発行ID数を入力してください', E_DB_QUERY);
                  return 'reserve';
                } elseif ($this->af->get('tyoukou_cnt')>300) {
                  $this->ae->add('','発行ID数は300以内です', E_DB_QUERY);
                  return 'reserve';
                } else {}
            } else {
                // 聴講オプション未入力の時は発行ID数クリアする
                $this->af->set('tyoukou_cnt','');
            }
            return null;
        }

        // seminar情報読込み
        $sql = "SELECT * FROM seminar WHERE user_seq=? AND status=1 AND seminar_id=?";
        $dary = array($_SESSION["user_seq"],$_SESSION['seminar_id']);
        $sth = $this->db->db->prepare($sql);
        $result = $this->db->db->execute($sth, $dary);
        if (Ethna::isError($result)) {
            $this->ae->add('','時間をおいてから再度行ってください', E_DB_QUERY);
            return 'menu';
        }
        $row = $result->fetchRow(DB_FETCHMODE_ASSOC);
        $this->af->set('seq',$row['seq']);
        $this->af->set('audience_login_umu',$row['audience_login_umu']);
        $this->af->set('audience_login_id',$row['audience_login_id']);
        $this->af->set('audience_login_pass',$row['audience_login_pass']);
        $this->af->set('tyoukou_option',$row['tyoukou_option']);
        $this->af->set('tyoukou_cnt',$row['tyoukou_cnt']);

        // 聴講オプション有(1)の時は tyoukou_user SELECT
        $idpass_ary = array();
        if ($row['tyoukou_option']==1) {
            // 聴講者用のID/PASS情報読込み
            $sql = "SELECT login_id,pass FROM tyoukou_user WHERE seminar_seq=? ORDER BY seq";
            $dary = array($row['seq']);
            $sth = $this->db->db->prepare($sql);
            $result = $this->db->db->execute($sth, $dary);
            if (Ethna::isError($result)) {
                $this->ae->add('','時間をおいてから再度行ってください', E_DB_QUERY);
                return 'menu';
            }
            while ($row=$result->fetchRow(DB_FETCHMODE_ASSOC)) {
                $idpass_ary[] = array(
                  'login_id' => $row['login_id'],
                  'pass'     => $row['pass'],
                );
            }
	    $this->af->setApp('idpass_ary',$idpass_ary);
        }
        return 'reserve';
    }

    /**
     *  reserveアクションの実装
     *
     *  @access public
     *  @return string  遷移名
     */
    function perform()
    {
        if ($this->af->get('seq')>0) {
            /* 更新 */
            $sql  = "UPDATE seminar SET audience_login_umu=?,audience_login_id=?,audience_login_pass=?,tyoukou_option=?,tyoukou_cnt=? WHERE seq=?";
            $dary = array($this->af->get('audience_login_umu'),$this->af->get('audience_login_id'),$this->af->get('audience_login_pass'),$this->af->get('tyoukou_option'),$this->af->get('tyoukou_cnt'),$this->af->get('seq'));
        } else {
            /* 新規挿入 */
            $sql  = "INSERT INTO seminar (user_seq,seminar_id,audience_login_umu,audience_login_id,audience_login_pass,status,tyoukou_option,tyoukou_cnt,regist_datetime) value (?,?,?,?,?,1,?,?,now())";
            $dary = array($_SESSION["user_seq"],$_SESSION['seminar_id'],$this->af->get('audience_login_umu'),$this->af->get('audience_login_id'),$this->af->get('audience_login_pass'),$this->af->get('tyoukou_option'),$this->af->get('tyoukou_cnt'));
        }
        $sth = $this->db->db->prepare($sql);
        $result = $this->db->db->execute($sth, $dary);
        if (Ethna::isError($result)) {
            $this->ae->add('','時間をおいてから再度行ってください', E_DB_QUERY);
            return 'reserve';
        }
        if ($this->af->get('seq')>0) {
        } else {
            // INSERTしたseq読込み
            $sql = "SELECT seq FROM seminar WHERE user_seq=? AND status=1 AND seminar_id=?";
            $dary = array($_SESSION["user_seq"],$_SESSION['seminar_id']);
            $sth = $this->db->db->prepare($sql);
            $result = $this->db->db->execute($sth, $dary);
            if (Ethna::isError($result)) {
                $this->ae->add('','時間をおいてから再度行ってください', E_DB_QUERY);
                return 'reserve';
            }
            $row = $result->fetchRow(DB_FETCHMODE_ASSOC);
            $this->af->set('seq',$row['seq']);
        }

        /* tyoukou_user 以前の発行IDは削除する */
        $sql  = "DELETE from tyoukou_user WHERE seminar_seq=?";
        $dary = array($this->af->get('seq'));
        $sth = $this->db->db->prepare($sql);
        $result = $this->db->db->execute($sth, $dary);
        if (Ethna::isError($result)) {
          $this->ae->add('','時間をおいてから再度行ってください', E_DB_QUERY);
          return 'reserve';
        }
        // 聴講オプション入力の時は tyoukou_user INSERT
        if ($this->af->get('tyoukou_option')==1) {
            // カウンタファイル読込み
            $cnt_file = HTTP_DIR. "/cnt/ucnt.dat";
            $cnt_len = 10;
            // カウンタファイルが存在すればカウンタ値を読み取る
            if (file_exists($cnt_file)) {
                $file = fopen($cnt_file, "r+");
                $count = fgets($file, $cnt_len);
                $count = $count + 1;
            } else {
            // カウンタファイルが存在しないなら新規作成する 
                $file = fopen($cnt_file, "w");
                $count = 1;
            }
            // ファイルポインタを先頭にセットする
            rewind($file);
            // ファイルをロックする
            flock($file, LOCK_EX);

            //ID s + 英小乱2桁 + 16進数3桁～（開始番号3e9:1001)
            //例→szy3e9
            //PASS 乱英数6桁

            $idpass = "";
            $idpass_ary = array();
            for ($i=$count;$i<$count+$this->af->get('tyoukou_cnt');$i++) {
              //ID
              $login_id = 's' .$this->getRandomString2(). dechex($i);
              //PASSWORD
              $pass = $this->getRandomString(6);
              /* INSERT */
              $sql  = "INSERT INTO tyoukou_user (seminar_seq,login_id,pass) value (?,?,?)";
              $dary = array($this->af->get('seq'),$login_id,$pass);
              $sth = $this->db->db->prepare($sql);
              $result = $this->db->db->execute($sth, $dary);
              if (Ethna::isError($result)) {
                $this->ae->add('','時間をおいてから再度行ってください', E_DB_QUERY);
                return 'reserve';
              }
              $idpass_ary[] = array(
                  'login_id' => $login_id,
	          'pass'     => $pass,
              );
              $idpass .=  $login_id ." / ". $pass ."<br>";
            }
	    $this->af->setApp('idpass_ary',$idpass_ary);
            // カウンタ値を書き込む
            fputs($file, $count+$this->af->get('tyoukou_cnt')-1, $cnt_len);
            // ファイルのロックを解除する
            flock($file, LOCK_UN);
            // ファイルを閉じる
            fclose($file);
        }
        $this->ae->add('','登録しました', E_FORM_INVALIDVALUE);
        return 'reserve';
    }
}
?>
