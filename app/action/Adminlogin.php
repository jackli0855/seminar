<?php
/**
 *  Adminlogin.php
 *
 *  @author     {$author}
 *  @package    Seminar
 *  @version    $Id: skel.action.php 387 2006-11-06 14:31:24Z cocoitiban $
 */

/**
 *  adminloginフォームの実装
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Seminar
 */
class Seminar_Form_Adminlogin extends Seminar_ActionForm
{
    /** @var    bool    バリデータにプラグインを使うフラグ */
    var $use_validator_plugin = true;

    /**
     *  @access private
     *  @var    array   フォーム値定義
     */
    var $form = array(
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
 *  adminloginアクションの実装
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Seminar
 */
class Seminar_Action_Adminlogin extends Seminar_ActionClass
{
    /**
     *  adminloginアクションの前処理
     *
     *  @access public
     *  @return string      遷移名(正常終了ならnull, 処理終了ならfalse)
     */
    function prepare()
    {
        if ($this->af->get('login_btn') == "ログアウト") {
            // SESSION情報削除
            $_SESSION = array();
            session_destroy();
            $this->ae->add('','ログアウトしました', E_DB_QUERY);
            return 'adminlogin';
        }
        if ($this->af->get('login_btn') == "ログイン")
        {
            // 入力データのバリデート(値の検証)
            if ($this->af->validate() > 0) {
                return 'adminlogin';
            }
            return null;
        }
        return 'adminlogin';
    }

    /**
     *  adminloginアクションの実装
     *
     *  @access public
     *  @return string  遷移名
     */
    function perform()
    {
        $pass_md = md5($this->af->get('password'));

        // ログインID、パスワードチェック
        $sql  = "SELECT seq,name FROM user WHERE login_id=? AND pass=?";
        $dary = array($this->af->get('login_id'),$pass_md);
        $sth = $this->db->db->prepare($sql);
        $res = $this->db->db->execute($sth, $dary);
        if (Ethna::isError($res)) {
            $this->ae->add('','時間をおいてから再度行ってください', E_DB_QUERY);
            return 'adminlogin';
        }
        $row = $res->fetchRow(DB_FETCHMODE_ASSOC);
        if (!$row['seq']) {
            $this->ae->add('','ログインエラー', E_FORM_INVALIDVALUE);
            return 'adminlogin';
        }

        // セッションにログイン情報設定
        $_SESSION['user_seq'] = $row['seq'];
        $_SESSION['name']     = $row['name'];

        // メニュー画面へ遷移
        header('Location: index.php?action_menu=true');
        exit;
    }
}
?>
