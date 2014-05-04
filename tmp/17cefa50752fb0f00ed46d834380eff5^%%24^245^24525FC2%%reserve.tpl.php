<?php /* Smarty version 2.6.19, created on 2012-05-28 19:27:49
         compiled from reserve.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'form', 'reserve.tpl', 30, false),array('function', 'form_input', 'reserve.tpl', 31, false),)), $this); ?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>セミナー予約 | セミナー管理</title>
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
<h3 class="h301 mt0">&nbsp;&nbsp;セミナー予約</h3>

<div class="textbox01">

<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
<span style="color:red"><?php echo $this->_tpl_vars['error']; ?>
</span><br />
<?php endforeach; endif; unset($_from); ?>

<?php $this->_tag_stack[] = array('form', array('ethna_action' => 'reserve','name' => 'form_main')); $_block_repeat=true;smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php echo smarty_function_form_input(array('name' => 'seq'), $this);?>

<table id="regist_form" border="0" cellspacing="1">
<tbody>
<tr>
<td ><b>セミナーID</b></td>
<td>&nbsp;&nbsp;</td>
<td><b><?php echo $_SESSION['seminar_id']; ?>
</b></td>
</tr>
<tr>
<td>&nbsp;</td><td>&nbsp;&nbsp;</td><td>&nbsp;</td>
</tr>
<tr>
<td nowrap>受講者ログイン有無</td>
<td>&nbsp;&nbsp;</td>
<td><?php echo smarty_function_form_input(array('name' => 'audience_login_umu'), $this);?>
</td>
</tr>
<tr>
<td>&nbsp;</td><td>&nbsp;&nbsp;</td><td>&nbsp;</td>
</tr>
<tr>
<td>受講者ログインID</td>
<td>&nbsp;&nbsp;</td>
<td><?php echo smarty_function_form_input(array('name' => 'audience_login_id'), $this);?>
&nbsp;&nbsp;<font size="-1" color="#ff0000">英数字6文字以上です</font></td>
</tr>
<tr>
<td>&nbsp;</td><td>&nbsp;&nbsp;</td><td>&nbsp;</td>
</tr>

<tr>
<td>受講者パスワード</td>
<td>&nbsp;&nbsp;</td>
<td><?php echo smarty_function_form_input(array('name' => 'audience_login_pass'), $this);?>
&nbsp;&nbsp;<font size="-1" color="#ff0000">英数字6文字以上です</font></td>
</tr>
<tr>
<td>&nbsp;</td><td>&nbsp;&nbsp;</td><td>&nbsp;</td>
</tr>

<tr>
<td>聴講オプション</td>
<td>&nbsp;&nbsp;</td>
<td><?php echo smarty_function_form_input(array('name' => 'tyoukou_option'), $this);?>
&nbsp;&nbsp;&nbsp;発行ID数&nbsp;<?php echo smarty_function_form_input(array('name' => 'tyoukou_cnt','size' => '4','maxlength' => '3'), $this);?>
&nbsp;&nbsp;<font size="-1" color="#ff0000">1-300を指定してください</font></td>
</tr>
<tr>
<td>&nbsp;</td><td>&nbsp;&nbsp;</td><td>&nbsp;</td>
</tr>

<tr>
<td></td>
<td>&nbsp;&nbsp;</td>
<td bgcolor="ffffff">
<?php if ($this->_tpl_vars['form']['tyoukou_option']): ?>
聴講者用に発行したログインID/パスワード<br>
<?php $_from = $this->_tpl_vars['app']['idpass_ary']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['idpass']):
?>
&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['idpass']['login_id']; ?>
/<?php echo $this->_tpl_vars['idpass']['pass']; ?>
<br>
<?php endforeach; endif; unset($_from); ?>
聴講者用ダイレクトログインurlはこちらをご案内してください&nbsp;（ログインID/パスワードは置き換えてください）<br>
http://<?php echo $_SERVER['SERVER_NAME']; ?>
/seminar/index.php?action_userlogin=true&user_name=<?php echo $_SESSION['name']; ?>
&seminar_id=<?php echo $_SESSION['seminar_id']; ?>
&login_id=ログインID&password=パスワード&login_btn=%E3%83%AD%E3%82%B0%E3%82%A4%E3%83%B3<br><br>
<?php endif; ?>
受講者(または聴講者用)ログインurlはこちらをご案内してください<br>http://<?php echo $_SERVER['SERVER_NAME']; ?>
/seminar/index.php?action_userlogin=true&user_name=<?php echo $_SESSION['name']; ?>
&seminar_id=<?php echo $_SESSION['seminar_id']; ?>
<br><br>受講者urlはこちら(ログイン無しの時)<br>http://<?php echo $_SERVER['SERVER_NAME']; ?>
/fms/liveseminar3/<?php echo $_SESSION['name']; ?>
/audience.php?seminar_id=<?php echo $_SESSION['seminar_id']; ?>
<br><br>講師urlはこちら(ログイン無しの時)<br>http://<?php echo $_SERVER['SERVER_NAME']; ?>
/fms/liveseminar3/<?php echo $_SESSION['name']; ?>
/lecturer2.php?seminar_id=<?php echo $_SESSION['seminar_id']; ?>
</td>
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