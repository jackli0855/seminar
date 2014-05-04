<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ログイン | セミナー管理</title>
{include file="common_meta.tpl"}
{literal}
<script>
<!--
function setValue() {
	document.form_main.login_btn.value = "ログイン";
	document.form_main.submit();
}
-->
</script>
{/literal}
</head>
<body>
<div id="body">

<!-- メイン -->
<div id="main">
<h3 class="h301 mt0">セミナー管理 ログイン</h3>

<div class="loginbox">

{foreach from=$errors item=error}
<span class="frd">{$error}</span><br />
{/foreach}

{form name="form_main" ethna_action="adminlogin"}
<table cellspacing="0">
<tr>
<th>{form_name name="login_id"}</th>
<td>{form_input name="login_id"}</td>
</tr>
<tr>
<th>{form_name name="password"}</th>
<td>{form_input name="password"}</td>
</tr>
<tr>
<th>&nbsp;</th>
<td style="padding-top:20px"><!--{form_input type="image" src="/images/common/over/btn_login.gif" name="login_btn"}--><input type="image" src="/images/login/btn_login.gif" onclick="setValue()" class="rollover" /></td>
</tr>
</table>
<input type="hidden" name="login_btn" value="" />
{/form}


</div>

</div>
<!-- /メイン -->


</div>
</body>
</html>
