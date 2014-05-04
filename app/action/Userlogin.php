<?php
/**
 *  Userlogin.php
 *
 *  @author     {$author}
 *  @package    Seminar
 *  @version    $Id: skel.action.php 387 2006-11-06 14:31:24Z cocoitiban $
 */

/**
 *  userloginフォームの実装
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Seminar
 */
class Seminar_Form_Userlogin extends Seminar_ActionForm
{
    /** @var    bool    バリデータにプラグインを使うフラグ */
    var $use_validator_plugin = true;

    /**
     *  @access private
     *  @var    array   フォーム値定義
     */
    var $form = array(
        'user_name' => array(
            'type'          => VAR_TYPE_STRING,  // 入力値型
            'form_type'     => FORM_TYPE_HIDDEN, // フォーム型
            'name'          => 'ユーザname',     // 表示名
            'required'      => true,             // 必須オプション(true/false)
            'regexp'        => '/[0-9a-zA-Z]+/', // 文字種指定(正規表現)
        ),
        'seminar_id' => array(
            'type'          => VAR_TYPE_STRING,  // 入力値型
            'form_type'     => FORM_TYPE_HIDDEN, // フォーム型
            'name'          => 'セミナーID',     // 表示名
            'required'      => true,             // 必須オプション(true/false)
            'regexp'        => '/[0-9a-zA-Z]+/', // 文字種指定(正規表現)
        ),
        'login_id' => array(
            // ログインIDの定義
            'type'          => VAR_TYPE_STRING,  // 入力値型
            'form_type'     => FORM_TYPE_TEXT,   // フォーム型
            'name'          => 'ログインID',     // 表示名
            'required'      => true,             // 必須オプション(true/false)
            'regexp'        => '/[0-9a-zA-Z]+/', // 文字種指定(正規表現)
        ),
        'password' => array(
            // パスワードの定義
            'type'          => VAR_TYPE_STRING,    // 入力値型
            'form_type'     => FORM_TYPE_PASSWORD, // フォーム型
            'name'          => 'パスワード',       // 表示名
            'required'      => true,             // 必須オプション(true/false)
            'regexp'        => '/[0-9a-zA-Z]+/', // 文字種指定(正規表現)
        ),
        'login_btn' => array(
            // ログインの定義
            'type'          => VAR_TYPE_STRING,  // 入力値型
            'form_type'     => FORM_TYPE_TEXT, // フォーム型
            'name'          => 'ログイン',       // 表示名
        ),
    );
}

/**
 *  userloginアクションの実装
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Seminar
 */
class Seminar_Action_Userlogin extends Seminar_ActionClass
{
    /**
     *  userloginアクションの前処理
     *
     *  @access public
     *  @return string      遷移名(正常終了ならnull, 処理終了ならfalse)
     */
    function prepare()
    {
        if ($this->af->get('login_btn') == "ログアウト") {
            // tyoukou_user status,ipを更新
            $sql  = "UPDATE tyoukou_user SET status=3,ip=NULL WHERE seq=?";
            $dary = array($_SESSION['tyoukou_user_seq']);
            $sth = $this->db->db->prepare($sql);
            $result = $this->db->db->execute($sth, $dary);
            if (Ethna::isError($result)) {
                $this->ae->add('','時間をおいてから再度行ってください', E_DB_QUERY);
                return 'userlogin';
            }
            // SESSION情報削除
            $_SESSION = array();
            session_destroy();
            $this->ae->add('','ログアウトしました', E_DB_QUERY);
            return 'userlogin';
        }
        if ($this->af->get('login_btn') == "ログイン")
        {
            // 入力データのバリデート(値の検証)
            if ($this->af->validate() > 0) {
                return 'userlogin';
            }
            return null;
        }
        if (!$this->af->get('seminar_id')) {
            $this->ae->add('','urlにセミナーIDを指定してください', E_DB_QUERY);
        }
        return 'userlogin';
    }

    /**
     *  userloginアクションの実装
     *
     *  @access public
     *  @return string  遷移名
     */
    function perform()
    {
        // ログインID、パスワードチェック
        $sql  = "SELECT s.seq,u.name FROM seminar s,user u WHERE s.seminar_id=? AND s.audience_login_id=? AND s.audience_login_pass=? AND s.status=1 AND s.user_seq=u.seq AND u.name=?" ;
        $dary = array($this->af->get('seminar_id'),$this->af->get('login_id'),$this->af->get('password'),$this->af->get('user_name'));
        $sth = $this->db->db->prepare($sql);
        $res = $this->db->db->execute($sth, $dary);
        if (Ethna::isError($res)) {
            $this->ae->add('','時間をおいてから再度行ってください', E_DB_QUERY);
            return 'userlogin';
        }
        $row = $res->fetchRow(DB_FETCHMODE_ASSOC);
        if (!$row['seq']) {
            // 聴講オプション有(1)の時はtyoukou_userのID/PASSをチェック
            $sql  = "SELECT s.seq,u.name,t.seq as tseq,t.status,t.ip FROM seminar s,user u,tyoukou_user t WHERE s.seminar_id=? AND t.login_id=? AND t.pass=? AND s.status=1 AND s.seq=t.seminar_seq AND s.user_seq=u.seq AND u.name=?" ;
            $dary = array($this->af->get('seminar_id'),$this->af->get('login_id'),$this->af->get('password'),$this->af->get('user_name'));
            $sth = $this->db->db->prepare($sql);
            $res = $this->db->db->execute($sth, $dary);
            if (Ethna::isError($res)) {
                $this->ae->add('','時間をおいてから再度行ってください', E_DB_QUERY);
                return 'userlogin';
            }
            $row = $res->fetchRow(DB_FETCHMODE_ASSOC);
            if (!$row['seq']) {
                $this->ae->add('','ログインエラー', E_FORM_INVALIDVALUE);
                return 'userlogin';
            }
            if ($row['status']==1 &&
                $_SERVER["REMOTE_ADDR"] != $row['ip']) {
                $this->ae->add('','このIDは既に使用されています（重複ログイン）', E_FORM_INVALIDVALUE);
                return 'userlogin';
            }
            // tyoukou_user statusを更新
            $sql  = "UPDATE tyoukou_user SET status=1,ip=? WHERE seq=?";
            $dary = array($_SERVER["REMOTE_ADDR"],$row['tseq']);
            $sth = $this->db->db->prepare($sql);
            $result = $this->db->db->execute($sth, $dary);
            if (Ethna::isError($result)) {
                $this->ae->add('','時間をおいてから再度行ってください', E_DB_QUERY);
                return 'userlogin';
            }
            // 聴講者用ログイン情報設定
            $_SESSION['tyoukou_user_seq']  = $row['tseq'];
        }
        // セッションにログイン情報設定
        $_SESSION['seminar_id']  = $this->af->get("seminar_id");
        $_SESSION['seminar_seq'] = $row['seq'];
        // 受講者画面へ遷移
        header('Location: ../fms/wowzaseminar/'.$row['name'].'/audience.php?seminar_id='.$this->af->get('seminar_id'));
        exit;
        return 'userlogin';
    }
}
?>
