<?php /* Smarty version 2.6.19, created on 2011-04-21 23:07:04
         compiled from menu.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'form', 'menu.tpl', 41, false),array('function', 'form_input', 'menu.tpl', 42, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理者メニュー | セミナー管理</title>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common_meta.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<script>
<!--
function setValue(no) {
	document.form_main.menu.value = no;
	document.form_main.submit();
}
function semidel() {
    if (!document.form_main.seminar_id.value) {
        alert(\'セミナーを選択してください\');
    }else{
        if (confirm(\'セミナーを削除します、よろしいですか？\')) {
          document.form_main.delete_btn.value=\'削除\';
          document.form_main.submit();
        }
    }
}
-->
</script>
'; ?>

</head>
<body>
<div id="body">

<!-- メイン -->
<div id="main">
<h3 class="h301 mt0">セミナー管理 メニュー</h3>

<div class="loginbox">

<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
<span class="frd"><?php echo $this->_tpl_vars['error']; ?>
</span><br />
<?php endforeach; endif; unset($_from); ?>

<?php $this->_tag_stack[] = array('form', array('name' => 'form_main','ethna_action' => 'menu')); $_block_repeat=true;smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php echo smarty_function_form_input(array('name' => 'menu'), $this);?>

<table cellspacing="0">
<tr>
<td>新規セミナーID</td>
<td><?php echo smarty_function_form_input(array('name' => 'seminar_new'), $this);?>
&nbsp;&nbsp;<font size="-1" color="#ff0000">新規セミナーIDは英数字6文字以上です</font></td>
</tr>
<tr>
<td>セミナー選択</td>
<td><?php echo smarty_function_form_input(array('name' => 'seminar_id'), $this);?>
&nbsp;&nbsp;<input type="button" onclick="semidel();return false;" value="削除" /><font size="-1">&nbsp;&nbsp;セミナーを削除します</font></td>
</tr>
<tr>
<td>&nbsp;</td><td></td>
</tr>
<tr>
<td>管理メニュー</td>
<td><a href="#" onclick="setValue(1)">■講師用画面</a><!-- <br><a href="#" onclick="setValue(2)">（受講者用画面）</a>--></td>
</tr>
<tr>
<th></th>
<td><a href="#" onclick="setValue(3)">■セミナー予約</a>&nbsp;&nbsp;<font size="-2">（受講者ログイン設定）</font></td>
</tr>
<tr>
<th></th>
<td><a href="#" onclick="setValue(4)">■セミナー画面</a>&nbsp;&nbsp;<font size="-2">（タイトル、講師名など）</font></td>
</tr>
<tr>
<th></th>
<td>&nbsp;</td>
</tr>
</table>
<input type="hidden" name="delete_btn" value="" />
<input type="hidden" name="menu_btn" value="" />
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<center>
<?php $this->_tag_stack[] = array('form', array('ethna_action' => 'adminlogin','name' => 'form_main2')); $_block_repeat=true;smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<input type="submit" name="login_btn" value="ログアウト" />
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_form($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</center>
</div>

</div>
<!-- /メイン -->


</div>
</body>
</html>