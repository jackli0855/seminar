<?php
/**
 *  Menu.php
 *
 *  @author     {$author}
 *  @package    Seminar
 *  @version    $Id: skel.action.php 387 2006-11-06 14:31:24Z cocoitiban $
 */

/**
 *  menuフォームの実装
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Seminar
 */
class Seminar_Form_Menu extends Seminar_ActionForm
{
    /** @var    bool    バリデータにプラグインを使うフラグ */
    var $use_validator_plugin = true;

    /**
     *  @access private
     *  @var    array   フォーム値定義
     */
    var $form = array(
        'seminar_new' => array(
            'type'          => VAR_TYPE_STRING,  // 入力値型
            'form_type'     => FORM_TYPE_TEXT,   // フォーム型
            'name'          => '新規セミナーID',  // 表示名
            'required'      => false,            // 必須オプション(true/false)
            'min'           => 6,                // 最小値
            'regexp'        => '/^[0-9a-zA-Z_-]+$/', // 文字種指定(正規表現)
        ),
        'seminar_id' => array(
            'type'          => VAR_TYPE_STRING,   // 入力値型
            'form_type'     => FORM_TYPE_SELECT,  // フォーム型
            'name'          => 'セミナーID',      // 表示名
            'required'      => false,             // 必須オプション(true/false)
            'option'        => array(),
        ),
        'menu' => array(
            // メニューボタン
            'type'          => VAR_TYPE_STRING, // 入力値型
            'form_type'     => FORM_TYPE_HIDDEN,// フォーム型
            'name'          => 'メニュー',      // 表示名
            'required'      => false,             // 必須オプション(true/false)
        ),
        'delete_btn' => array(
            // 削除ボタンの定義
            'type'          => VAR_TYPE_STRING, // 入力値型
            'form_type'     => FORM_TYPE_TEXT,  // フォーム型
            'name'          => '削除',    // 表示名
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
 *  menuアクションの実装
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Seminar
 */
class Seminar_Action_Menu extends Seminar_ActionClass
{
    /**
     *  menuアクションの前処理
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

        // 削除ボタンが押された時
        if ($this->af->get('delete_btn') == "削除") {
            if (strlen($this->af->get('seminar_id'))>0) {
                // seminar削除（status=9セット）
                $sql = "UPDATE seminar SET status=9 WHERE seminar_id=?";
                $dary = array($this->af->get('seminar_id'));
                $sth = $this->db->db->prepare($sql);
                $result = $this->db->db->execute($sth,$dary);
                if (Ethna::isError($result)) {
                    $this->ae->add('','時間をおいてから再度行ってください', E_DB_QUERY);
                } else {
                    $this->ae->add('','削除しました', E_DB_QUERY);
                    $this->af->set('seminar_id','');
                }
            } else {
                $this->ae->add('','セミナーIDを選択してください', E_DB_QUERY);
            }
        }

        // seminarテーブルよりsemina_id再定義
        $sql = "SELECT seq,seminar_id FROM seminar WHERE user_seq=? AND status=1 ORDER BY regist_datetime DESC";  
        $dary = array($_SESSION['user_seq']);
        $sth = $this->db->db->prepare($sql);
        $result = $this->db->db->execute($sth,$dary);
        if (Ethna::isError($result)) {
            $this->ae->add('','時間をおいてから再度行ってください', E_DB_QUERY);
                return 'adminlogin';
        }
        $wk_ary_option = array(''=>'選んで下さい');
        while($row = $result->fetchRow(DB_FETCHMODE_ASSOC)) {
            $wk_ary_option[$row['seminar_id']] = $row['seminar_id'];
        }
        $re_seminar_id = array(
            'type'          => VAR_TYPE_STRING,
            'form_type'     => FORM_TYPE_SELECT,
            'name'          => 'セミナーID',
            'required'      => false,
            'option'        => $wk_ary_option,
        );
        $this->af->setDef('seminar_id', $re_seminar_id);
        // セミナーIDが選択済みの時はデフォルトセット
        if (!$this->af->get('seminar_id') &&
             $_SESSION['seminar_id']) {
            $this->af->set('seminar_id',$_SESSION['seminar_id']);
        }

        // メニューが選択された時
        if ($this->af->get('menu')>0) {
            // 入力データのバリデート(値の検証)
            if ($this->af->validate() > 0) {
                return 'menu';
            }
            // 新規セミナー入力
            if (strlen($this->af->get('seminar_new'))>0) {
                // seminar_id重複チェック
                $sql = "SELECT seq FROM seminar WHERE user_seq=? AND seminar_id=? AND status=1";  
                $dary = array($_SESSION['user_seq'],$this->af->get('seminar_new'));
                $sth = $this->db->db->prepare($sql);
                $result = $this->db->db->execute($sth,$dary);
                if (Ethna::isError($result)) {
                  $this->ae->add('','時間をおいてから再度行ってください', E_DB_QUERY);
                  return 'menu';
                }
                $row = $result->fetchRow(DB_FETCHMODE_ASSOC);
                if ($row['seq']) {
                  $this->ae->add('','この新規セミナーIDは登録済です', E_DB_QUERY);
                  return 'menu';
                }
                return null;
            }
            // 既存セミナー選択
            if (strlen($this->af->get('seminar_id'))>0) {
                return null;
            }
            $this->ae->add('','セミナーを選択してください', E_DB_QUERY);
        }
        return 'menu';

    }

    /**
     *  menuアクションの実装
     *
     *  @access public
     *  @return string  遷移名
     */
    function perform()
    {
        //講師用画面
        if ($this->af->get('menu')==1) {
            if (strlen($this->af->get('seminar_id'))>0) {
              $_SESSION['seminar_id'] = $this->af->get('seminar_id');
              header('Location: ../fms/wowzaseminar/'.$_SESSION['name'].'/lecturer.php?seminar_id='.$this->af->get('seminar_id'));
              exit;
            } else {
              $this->ae->add('','セミナーを選択してください', E_DB_QUERY);
            }
        }
        //受講者用画面
        if ($this->af->get('menu')==2) {
            if (strlen($this->af->get('seminar_id'))>0) {
              $_SESSION['id'] = $_SESSION['user_id'];
              header('Location: ../fms/wowzaseminar/'.$_SESSION['name'].'/audience.php?seminar_id='.$this->af->get('seminar_id'));
              exit;
            } else {
              $this->ae->add('','セミナーを選択してください', E_DB_QUERY);
            }
        }
        //セミナー予約画面
        if ($this->af->get('menu')==3) {
            if (strlen($this->af->get('seminar_new'))>0) {
              $_SESSION['seminar_id'] = $this->af->get('seminar_new');
              $this->ae->add('','新規セミナーです', E_DB_QUERY);
              return 'reserve';
            } else {
              $_SESSION['seminar_id'] = $this->af->get('seminar_id');
              header('Location: index.php?action_reserve=true');
              exit;
            }
        }
        //セミナー画面
        if ($this->af->get('menu')==4) {
            if (strlen($this->af->get('seminar_new'))>0) {
              $_SESSION['seminar_id'] = $this->af->get('seminar_new');
              $this->ae->add('','新規セミナーです', E_DB_QUERY);
              return 'regist';
            } else {
              $_SESSION['seminar_id'] = $this->af->get('seminar_id');
              header('Location: index.php?action_regist=true');
              exit;
            }
        }
        return 'menu';
    }
}
?>
