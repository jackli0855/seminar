<?php /* Smarty version 2.6.19, created on 2011-02-06 16:11:17
         compiled from regist.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'form', 'regist.tpl', 30, false),array('function', 'form_input', 'regist.tpl', 31, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>セミナー画面 | セミナー管理</title>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common_meta.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<script language="JavaScript" type="text/javascript">
<!--
function set_item(no) {
    document.form_main.item.value = no;
}
//-->
</script>
'; ?>

</head>
<body>
<div id="body">

<!-- メイン -->
<div id="main">
<h3 class="h301 mt0">&nbsp;&nbsp;セミナー画面</h3>

<div class="textbox01">

<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
<span style="color:red"><?php echo $this->_tpl_vars['error']; ?>
</span><br />
<?php endforeach; endif; unset($_from); ?>

<?php $this->_tag_stack[] = array('form', array('ethna_action' => 'regist','name' => 'form_main')); $_block_repeat=true;smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php echo smarty_function_form_input(array('name' => 'seq'), $this);?>

<table id="regist_form" border="0" cellspacing="1">
<tbody>
<tr>
<td><b>セミナーID</b></td>
<td>&nbsp;&nbsp;</td>
<td><b><?php echo $_SESSION['seminar_id']; ?>
</b></td>
</tr>
<tr>
<td>&nbsp;</td><td>&nbsp;&nbsp;</td><td>&nbsp;</td>
</tr>
<tr>
<td >セミナータイトル</td>
<td>&nbsp;&nbsp;</td>
<td><?php echo smarty_function_form_input(array('name' => 'seminar_title','size' => '50'), $this);?>
<font size="-1" color="#ff0000">必須</font></td>
</tr>
<tr>
<td>&nbsp;</td><td>&nbsp;&nbsp;</td><td>&nbsp;</td>
</tr>
<tr>
<td>講師名</td>
<td>&nbsp;&nbsp;</td>
<td><?php echo smarty_function_form_input(array('name' => 'seminar_lecturer','size' => '50'), $this);?>
<font size="-1" color="#ff0000">必須</font></td>
</tr>
<tr>
<td>&nbsp;</td><td>&nbsp;&nbsp;</td><td>&nbsp;</td>
</tr>
<tr>
<td >セミナーコメント</td>
<td>&nbsp;&nbsp;</td>
<td><?php echo smarty_function_form_input(array('name' => 'seminar_comment','cols' => '40','rows' => '5'), $this);?>
<font size="-1" color="#ff0000">必須</font></td>
</tr>
<tr>
<td>&nbsp;</td><td>&nbsp;&nbsp;</td><td>&nbsp;</td>
</tr>
<!--
<tr>
<td >フッター</td>
<td>&nbsp;&nbsp;</td>
<td><?php echo smarty_function_form_input(array('name' => 'seminar_footer','size' => '50'), $this);?>
</td>
</tr>
-->
<td><input type="hidden" name="seminar_footer" value=""></td>
<tr>
<td>開催日時</td>
<td>&nbsp;&nbsp;</td>
<td><?php echo smarty_function_form_input(array('name' => 'styear'), $this);?>
年<?php echo smarty_function_form_input(array('name' => 'stmonth'), $this);?>
月<?php echo smarty_function_form_input(array('name' => 'stday'), $this);?>
日<?php echo smarty_function_form_input(array('name' => 'sthour'), $this);?>
時</td>
</tr>
<tr>
<td>&nbsp;</td><td>&nbsp;&nbsp;</td><td>&nbsp;</td>
</tr>
</tbody>
</table>
<?php echo smarty_function_form_input(array('name' => 'regist_btn'), $this);?>
&nbsp;&nbsp;<?php echo smarty_function_form_input(array('name' => 'menu_btn'), $this);?>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</div>
<center>
<?php $this->_tag_stack[] = array('form', array('ethna_action' => 'adminlogin','name' => 'form_main2')); $_block_repeat=true;smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<input type="submit" name="login_btn" value="ログアウト" />
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</center>
</div>
<!-- /メイン -->

</div>
</body>
</html>