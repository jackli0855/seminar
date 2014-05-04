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
 *  action�¹ԥ��饹
 *
 *  @author     {$author}
 *  @package    Seminar
 *  @access     public
 */
class Seminar_ActionClass extends Ethna_ActionClass
{
    /**
     *  �ǡ����١�����³��ʸ�����������Ԥ�
     *  DB��³ �������� /etc/memberpj-ini.php �˵���
     */
    var $db;
    function Seminar_ActionClass(&$backend)
    {
        session_start();

        /** �ǡ����١�����³ */
        parent::Ethna_ActionClass($backend);
        $this->db = $this->backend->getDB();
        $sth = $this->db->db->prepare('SET NAMES utf8');
        $result = $this->db->db->execute($sth);

        return $result;
    }
    /**
     * ������ʱ�(�羮)���������������롣
     * @param int $nLengthRequired ɬ�פ�ʸ����Ĺ����ά����� 6 ʸ��
     * @return String �������ʸ����
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
     * ������ʱ�(��)�������������롣
     * @param int $nLengthRequired ɬ�פ�ʸ����Ĺ����ά����� 2 ʸ��
     * @return String �������ʸ����
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
     *  ���������¹�����ǧ�ڽ�����Ԥ�
     *
     *  @access public
     *  @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
     */
    function authenticate()
    {
        return parent::authenticate();
    }

    /**
     *  ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
     *
     *  @access public
     *  @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
     */
    function prepare()
    {
        return parent::prepare();
    }

    /**
     *  ���������¹�
     *
     *  @access public
     *  @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
     */
    function perform()
    {
        return parent::perform();
    }
}
// }}}
?>
