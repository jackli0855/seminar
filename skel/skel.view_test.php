<?php
/**
 *  {$view_path}
 *
 *  @author     {$author}
 *  @package    Seminar
 *  @version    $Id: skel.view_test.php 503 2008-04-25 04:06:08Z mumumu-org $
 */

/**
 *  {$forward_name}�ӥ塼�μ���
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Seminar
 */
class {$view_class}_TestCase extends Ethna_UnitTestCase
{
    /**
     *  @access private
     *  @var    string  �ӥ塼̾
     */
    var $forward_name = '{$forward_name}';

    /**
     *    �ƥ��Ȥν����
     *
     *    @access public
     */
    function setUp()
    {
        $this->createPlainActionForm(); // ���������ե�����κ���
        $this->createViewClass();       // �ӥ塼�κ���
    }

    /**
     *    �ƥ��Ȥθ����
     *
     *    @access public
     */
    function tearDown()
    {
    }

    /**
     *  {$forward_name}�����������Υ���ץ�ƥ��ȥ�����
     *
     *  @access public
     */
    function test_viewSample()
    {
        /*
        // �ե����������
        $this->af->set('id', 1);

        // {$forward_name}����������
        $this->vc->preforward();
        $this->assertNull($this->af->get('data'));
        */

        /**
         *  TODO: �ƥ��ȥ������򵭽Ҥ��Ʋ�������
         *  @see http://simpletest.org/en/first_test_tutorial.html
         *  @see http://simpletest.org/en/unit_test_documentation.html
         */
        $this->fail('No Test! write Test!');
    }
}
?>
