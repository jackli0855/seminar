<?php
/**
 *  Index.php
 *
 *  @author    {$author}
 *  @package   Seminar
 *  @version   $Id: app.action.default.php 728 2009-02-05 18:36:10Z mumumu-org $
 */

/**
 *  index�ե�����μ���
 *
 *  @author    {$author}
 *  @access    public
 *  @package   Seminar
 */

class Seminar_Form_Index extends Seminar_ActionForm
{
    /** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
    var $use_validator_plugin = true;

    /**
     *  @access   private
     *  @var      array   �ե����������
     */
     var $form = array(
       /*
        *  TODO: ���Υ�������󤬻��Ѥ���ե�����򵭽Ҥ��Ƥ�������
        *
        *  ������(type��������Ƥ����ǤϾ�ά��ǽ)��
        *
        *  'sample' => array(
        *  // �ե���������
        *      'type'        => VAR_TYPE_INT,        // �����ͷ�
        *      'form_type'   => FORM_TYPE_TEXT,      // �ե����෿
        *      'name'        => '����ץ�',          // ɽ��̾
        *  
        *  // �Х�ǡ���(���ҽ�˥Х�ǡ������¹Ԥ���ޤ�)
        *      'required'    => true,                        // ɬ�ܥ��ץ����(true/false)
        *      'min'         => null,                        // �Ǿ���
        *      'max'         => null,                        // ������
        *      'regexp'      => null,                        // ʸ�������(����ɽ��)
        *
        *  // �ե��륿
        *      'filter'      => null,                        // �������Ѵ��ե��륿���ץ����
        *  ),
        */
      );
}

/**
 *  index���������μ���
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Seminar
 */
class Seminar_Action_Index extends Seminar_ActionClass
{
        /**
         *  index����������������
         *
         *  @access    public
         *  @return    string  Forward��(���ｪλ�ʤ�null)
         */
        function prepare()
        {
                return null;
        }

        /**
         *  index���������μ���
         *
         *  @access    public
         *  @return    string  ����̾
         */
        function perform()
        {
                return 'index';
        }
}
?>
