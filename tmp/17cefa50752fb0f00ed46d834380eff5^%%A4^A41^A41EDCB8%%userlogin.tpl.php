<?php /* Smarty version 2.6.19, created on 2011-01-29 17:34:22
         compiled from userlogin.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'form', 'userlogin.tpl', 31, false),array('function', 'form_input', 'userlogin.tpl', 32, false),array('function', 'form_name', 'userlogin.tpl', 36, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>受講者ログイン</title>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common_meta.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<script>
<!--
function setValue() {
	document.form_main.login_btn.value = "ログイン";
	document.form_main.submit();
}
-->
</script>
'; ?>

</head>
<body>
<div id="body">

<!-- メイン -->
<div id="main">
<h3 class="h301 mt0">受講者ログイン</h3>

<div class="loginbox">

<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
<span class="frd"><?php echo $this->_tpl_vars['error']; ?>
</span><br />
<?php endforeach; endif; unset($_from); ?>

<?php $this->_tag_stack[] = array('form', array('name' => 'form_main','ethna_action' => 'userlogin')); $_block_repeat=true;smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php echo smarty_function_form_input(array('name' => 'user_name'), $this);?>

<?php echo smarty_function_form_input(array('name' => 'seminar_id'), $this);?>

<table cellspacing="0">
<tr>
<th><?php echo smarty_function_form_name(array('name' => 'login_id'), $this);?>
</th>
<td><?php echo smarty_function_form_input(array('name' => 'login_id'), $this);?>
</td>
</tr>
<tr>
<th><?php echo smarty_function_form_name(array('name' => 'password'), $this);?>
</th>
<td><?php echo smarty_function_form_input(array('name' => 'password'), $this);?>
</td>
</tr>
<tr>
<th>&nbsp;</th>
<td style="padding-top:20px"><!--<?php echo smarty_function_form_input(array('type' => 'image','src' => "/images/common/over/btn_login.gif",'name' => 'login_btn'), $this);?>
--><input type="image" src="/images/login/btn_login.gif" onclick="setValue()" class="rollover" /></td>
</tr>
</table>
<input type="hidden" name="login_btn" value="" />
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>


</div>

</div>
<!-- /メイン -->


</div>
</body>
</html>