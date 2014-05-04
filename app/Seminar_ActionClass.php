<?php
// vim: foldmethod=marker
/**
 *  Seminar_ActionClass.php
 *
 *  @author     {$author}
 *  @package    Seminar
 *  @version    $Id: app.actionclass.php 323 2006-08-22 15:52:26Z fujimoto $
 */

// {{{ Seminar_ActionClass
/**
 *  action実行クラス
 *
 *  @author     {$author}
 *  @package    Seminar
 *  @access     public
 */
class Seminar_ActionClass extends Ethna_ActionClass
{
    /**
     *  データベース接続＆文字設定処理を行う
     *  DB接続 設定情報は /etc/memberpj-ini.php に記載
     */
    var $db;
    function Seminar_ActionClass(&$backend)
    {
        session_start();

        /** データベース接続 */
        parent::Ethna_ActionClass($backend);
        $this->db = $this->backend->getDB();
        $sth = $this->db->db->prepare('SET NAMES utf8');
        $result = $this->db->db->execute($sth);

        return $result;
    }
    /**
     * ランダムな英(大小)数乱字列を生成する。
     * @param int $nLengthRequired 必要な文字列長。省略すると 6 文字
     * @return String ランダムな文字列
     */
    function getRandomString($nLengthRequired = 6){
        $sCharList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        mt_srand();
        $sRes = "";
        for($i = 0; $i < $nLengthRequired; $i++)
            $sRes .= $sCharList{mt_rand(0, strlen($sCharList) - 1)};
        return $sRes;
    }
    /**
     * ランダムな英(小)乱字列を生成する。
     * @param int $nLengthRequired 必要な文字列長。省略すると 2 文字
     * @return String ランダムな文字列
     */
    function getRandomString2($nLengthRequired = 2){
        $sCharList = "abcdefghijklmnopqrstuvwxyz";
        mt_srand();
        $sRes = "";
        for($i = 0; $i < $nLengthRequired; $i++)
            $sRes .= $sCharList{mt_rand(0, strlen($sCharList) - 1)};
        return $sRes;
    }
    /**
     *  アクション実行前の認証処理を行う
     *
     *  @access public
     *  @return string  遷移名(nullなら正常終了, falseなら処理終了)
     */
    function authenticate()
    {
        return parent::authenticate();
    }

    /**
     *  アクション実行前の処理(フォーム値チェック等)を行う
     *
     *  @access public
     *  @return string  遷移名(nullなら正常終了, falseなら処理終了)
     */
    function prepare()
    {
        return parent::prepare();
    }

    /**
     *  アクション実行
     *
     *  @access public
     *  @return string  遷移名(nullなら遷移は行わない)
     */
    function perform()
    {
        return parent::perform();
    }
}
// }}}
?>
