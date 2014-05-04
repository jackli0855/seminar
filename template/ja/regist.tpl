<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>セミナー画面 | セミナー管理</title>
{include file="common_meta.tpl"}
{literal}
<script language="JavaScript" type="text/javascript">
<!--
function set_item(no) {
    document.form_main.item.value = no;
}
//-->
</script>
{/literal}
</head>
<body>
<div id="body">

<!-- メイン -->
<div id="main">
<h3 class="h301 mt0">&nbsp;&nbsp;セミナー画面</h3>

<div class="textbox01">

{foreach from=$errors item=error}
<span style="color:red">{$error}</span><br />
{/foreach}

{form ethna_action="regist" name="form_main" }
{form_input name="seq"}
<table id="regist_form" border="0" cellspacing="1">
<tbody>
<tr>
<td><b>セミナーID</b></td>
<td>&nbsp;&nbsp;</td>
<td><b>{$smarty.session.seminar_id}</b></td>
</tr>
<tr>
<td>&nbsp;</td><td>&nbsp;&nbsp;</td><td>&nbsp;</td>
</tr>
<tr>
<td >セミナータイトル</td>
<td>&nbsp;&nbsp;</td>
<td>{form_input name="seminar_title" size="50"}<font size="-1" color="#ff0000">必須</font></td>
</tr>
<tr>
<td>&nbsp;</td><td>&nbsp;&nbsp;</td><td>&nbsp;</td>
</tr>
<tr>
<td>講師名</td>
<td>&nbsp;&nbsp;</td>
<td>{form_input name="seminar_lecturer" size="50"}<font size="-1" color="#ff0000">必須</font></td>
</tr>
<tr>
<td>&nbsp;</td><td>&nbsp;&nbsp;</td><td>&nbsp;</td>
</tr>
<tr>
<td >セミナーコメント</td>
<td>&nbsp;&nbsp;</td>
<td>{form_input name="seminar_comment" cols="40" rows="5"}<font size="-1" color="#ff0000">必須</font></td>
</tr>
<tr>
<td>&nbsp;</td><td>&nbsp;&nbsp;</td><td>&nbsp;</td>
</tr>
<!--
<tr>
<td >フッター</td>
<td>&nbsp;&nbsp;</td>
<td>{form_input name="seminar_footer" size="50"}</td>
</tr>
-->
<td><input type="hidden" name="seminar_footer" value=""></td>
<tr>
<td>開催日時</td>
<td>&nbsp;&nbsp;</td>
<td>{form_input name="styear"}年{form_input name="stmonth"}月{form_input name="stday"}日{form_input name="sthour"}時</td>
</tr>
<tr>
<td>&nbsp;</td><td>&nbsp;&nbsp;</td><td>&nbsp;</td>
</tr>
</tbody>
</table>
{form_input name="regist_btn"}&nbsp;&nbsp;{form_input name="menu_btn"}
{/form}
</div>
<center>
{form ethna_action="adminlogin" name="form_main2" }
<input type="submit" name="login_btn" value="ログアウト" />
{/form}
</center>
</div>
<!-- /メイン -->

</div>
</body>
</html>