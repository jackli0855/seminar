<?php
/**
 *  Regist.php
 *
 *  @author     {$author}
 *  @package    Seminar
 *  @version    $Id: skel.action.php 387 2006-11-06 14:31:24Z cocoitiban $
 */

/**
 *  registフォームの実装
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Seminar
 */
class Seminar_Form_Regist extends Seminar_ActionForm
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
        'seminar_title' => array(
            'type'          => VAR_TYPE_STRING,  // 入力値型
            'form_type'     => FORM_TYPE_TEXT, // フォーム型
            'name'          => 'セミナータイトル', // 表示名
            'required'      => true,             // 必須オプション(true/false)
        ),
        'seminar_lecturer' => array(
            'type'          => VAR_TYPE_STRING,  // 入力値型
            'form_type'     => FORM_TYPE_TEXT,   // フォーム型
            'name'          => '講師名',         // 表示名
            'required'      => true,            // 必須オプション(true/false)
        ),
        'seminar_comment' => array(
            'type'          => VAR_TYPE_STRING,  // 入力値型
            'form_type'     => FORM_TYPE_TEXTAREA, // フォーム型
            'name'          => 'セミナーコメント', // 表示名
            'required'      => true,             // 必須オプション(true/false)
        ),
        'seminar_footer' => array(
            'type'          => VAR_TYPE_STRING,  // 入力値型
            'form_type'     => FORM_TYPE_TEXT, // フォーム型
            'name'          => 'フッター',       // 表示名
            'required'      => false,             // 必須オプション(true/false)
        ),
        'styear' => array(
            'type'          => VAR_TYPE_STRING,   // 入力値型
            'form_type'     => FORM_TYPE_SELECT,  // フォーム型
            'name'          => '開始年',          // 表示名
            'required'      => true,              // 必須オプション(true/false)
            'option'        => array('2011'=>'2011','2012'=>'2012','2013'=>'2013','2014'=>'2014','2015'=>'2015','2016'=>'2016','2017'=>'2017'),
        ),
        'stmonth' => array(
            'type'          => VAR_TYPE_STRING,   // 入力値型
            'form_type'     => FORM_TYPE_SELECT,  // フォーム型
            'name'          => '開始月',          // 表示名
            'required'      => true,              // 必須オプション(true/false)
            'option'        => array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12'),
        ),
        'stday' => array(
            'type'          => VAR_TYPE_STRING,   // 入力値型
            'form_type'     => FORM_TYPE_SELECT,  // フォーム型
            'name'          => '開始日',          // 表示名
            'required'      => true,              // 必須オプション(true/false)
            'option'        => array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12','13'=>'13','14'=>'14','15'=>'15','16'=>'16','17'=>'17','18'=>'18','19'=>'19','20'=>'20','21'=>'21','22'=>'22','23'=>'23','24'=>'24','25'=>'25','26'=>'26','27'=>'27','28'=>'28','29'=>'29','30'=>'30','31'=>'31'),
        ),
        'sthour' => array(
            'type'          => VAR_TYPE_STRING,   // 入力値型
            'form_type'     => FORM_TYPE_SELECT,  // フォーム型
            'name'          => '開始時',          // 表示名
            'required'      => true,              // 必須オプション(true/false)
            'option'        => array('00:00'=>'00:00','0:30'=>'00:30','01:00'=>'01:00','01:30'=>'01:30','02:00'=>'02:00','02:30'=>'02:30','03:00'=>'03:00','03:30'=>'03:30','04:00'=>'04:00','04:30'=>'04:30','05:00'=>'05:00','05:30'=>'05:30','06:00'=>'06:00','06:30'=>'06:30','07:00'=>'07:00','07:30'=>'07:30','08:00'=>'08:00','08:30'=>'08:30','09:00'=>'09:00','09:30'=>'09:30','10:00'=>'10:00','10:30'=>'10:30','11:00'=>'11:00','11:30'=>'11:30','12:00'=>'12:00','12:30'=>'12:30','13:00'=>'13:00','13:30'=>'13:30','14:00'=>'14:00','14:30'=>'14:30','15:00'=>'15:00','15:30'=>'15:30','16:00'=>'16:00','16:30'=>'16:30','17:00'=>'17:00','17:30'=>'17:30','18:00'=>'18:00','18:30'=>'18:30','19:00'=>'19:00','19:30'=>'19:30','20:00'=>'20:00','20:30'=>'20:30','21:00'=>'21:00','21:30'=>'21:30','22:00'=>'22:00','22:30'=>'22:30','23:00'=>'23:00','23:30'=>'23:30'),
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
 *  registアクションの実装
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Seminar
 */
class Seminar_Action_Regist extends Seminar_ActionClass
{
    /**
     *  registアクションの前処理
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
                return 'regist';
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
        $this->af->set('seminar_title',$row['seminar_title']);
        $this->af->set('seminar_lecturer',$row['seminar_lecturer']);
        $this->af->set('seminar_comment',$row['seminar_comment']);
        $this->af->set('seminar_footer',$row['seminar_footer']);
        $this->af->set('styear',substr($row['seminar_datetime'],0,4));
        $this->af->set('stmonth',sprintf("%d",substr($row['seminar_datetime'],5,2)));
        $this->af->set('stday',sprintf("%d",substr($row['seminar_datetime'],8,2)));
        $this->af->set('sthour',substr($row['seminar_datetime'],11,5));
        return 'regist';
    }

    /**
     *  registアクションの実装
     *
     *  @access public
     *  @return string  遷移名
     */
    function perform()
    {
        if ($this->af->get('seq')>0) {
            /* 更新 */
            $sql  = "UPDATE seminar SET seminar_title=?,seminar_lecturer=?,seminar_comment=?,seminar_footer=?,seminar_datetime=? WHERE seq=?";
            $dary = array($this->af->get('seminar_title'),$this->af->get('seminar_lecturer'),$this->af->get('seminar_comment'),$this->af->get('seminar_footer'),$this->af->get('styear').'-'.$this->af->get('stmonth').'-'.$this->af->get('stday').' '.$this->af->get('sthour').':00',$this->af->get('seq'));
        } else {
            /* 新規挿入 */
            $sql  = "INSERT INTO seminar (user_seq,seminar_id,seminar_title,seminar_lecturer,seminar_comment,seminar_footer,seminar_datetime,status,regist_datetime) value (?,?,?,?,?,?,?,1,now())";
            $dary = array($_SESSION["user_seq"],$_SESSION['seminar_id'],$this->af->get('seminar_title'),$this->af->get('seminar_lecturer'),$this->af->get('seminar_comment'),$this->af->get('seminar_footer'),$this->af->get('styear').'-'.$this->af->get('stmonth').'-'.$this->af->get('stday').' '.$this->af->get('sthour').':00');
        }
        $sth = $this->db->db->prepare($sql);
        $result = $this->db->db->execute($sth, $dary);
        if (Ethna::isError($result)) {
            $this->ae->add('','時間をおいてから再度行ってください', E_DB_QUERY);
            return 'regist';
        }
        $this->ae->add('','登録しました', E_FORM_INVALIDVALUE);
        if ($this->af->get('seq')>0) {
        } else {
            // INSERTしたseq読込み
            $sql = "SELECT seq FROM seminar WHERE user_seq=? AND status=1 AND seminar_id=?";
            $dary = array($_SESSION["user_seq"],$_SESSION['seminar_id']);
            $sth = $this->db->db->prepare($sql);
            $result = $this->db->db->execute($sth, $dary);
            if (Ethna::isError($result)) {
                $this->ae->add('','時間をおいてから再度行ってください', E_DB_QUERY);
                return 'regist';
            }
            $row = $result->fetchRow(DB_FETCHMODE_ASSOC);
            $this->af->set('seq',$row['seq']);
        }
        return 'regist';
    }
}
?>
