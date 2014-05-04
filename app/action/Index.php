<?php
/**
 *  Index.php
 *
 *  @author    {$author}
 *  @package   Seminar
 *  @version   $Id: app.action.default.php 728 2009-02-05 18:36:10Z mumumu-org $
 */

/**
 *  indexフォームの実装
 *
 *  @author    {$author}
 *  @access    public
 *  @package   Seminar
 */

class Seminar_Form_Index extends Seminar_ActionForm
{
    /** @var    bool    バリデータにプラグインを使うフラグ */
    var $use_validator_plugin = true;

    /**
     *  @access   private
     *  @var      array   フォーム値定義
     */
     var $form = array(
       /*
        *  TODO: このアクションが使用するフォームを記述してください
        *
        *  記述例(typeを除く全ての要素は省略可能)：
        *
        *  'sample' => array(
        *  // フォームの定義
        *      'type'        => VAR_TYPE_INT,        // 入力値型
        *      'form_type'   => FORM_TYPE_TEXT,      // フォーム型
        *      'name'        => 'サンプル',          // 表示名
        *  
        *  // バリデータ(記述順にバリデータが実行されます)
        *      'required'    => true,                        // 必須オプション(true/false)
        *      'min'         => null,                        // 最小値
        *      'max'         => null,                        // 最大値
        *      'regexp'      => null,                        // 文字種指定(正規表現)
        *
        *  // フィルタ
        *      'filter'      => null,                        // 入力値変換フィルタオプション
        *  ),
        */
      );
}

/**
 *  indexアクションの実装
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Seminar
 */
class Seminar_Action_Index extends Seminar_ActionClass
{
        /**
         *  indexアクションの前処理
         *
         *  @access    public
         *  @return    string  Forward先(正常終了ならnull)
         */
        function prepare()
        {
                return null;
        }

        /**
         *  indexアクションの実装
         *
         *  @access    public
         *  @return    string  遷移名
         */
        function perform()
        {
                return 'index';
        }
}
?>
