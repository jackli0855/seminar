<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>セミナー予約 | セミナー管理</title>
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
<h3 class="h301 mt0">&nbsp;&nbsp;セミナー予約</h3>

<div class="textbox01">

{foreach from=$errors item=error}
<span style="color:red">{$error}</span><br />
{/foreach}

{form ethna_action="reserve" name="form_main" }
{form_input name="seq"}
<table id="regist_form" border="0" cellspacing="1">
<tbody>
<tr>
<td ><b>セミナーID</b></td>
<td>&nbsp;&nbsp;</td>
<td><b>{$smarty.session.seminar_id}</b></td>
</tr>
<tr>
<td>&nbsp;</td><td>&nbsp;&nbsp;</td><td>&nbsp;</td>
</tr>
<tr>
<td nowrap>受講者ログイン有無</td>
<td>&nbsp;&nbsp;</td>
<td>{form_input name="audience_login_umu"}</td>
</tr>
<tr>
<td>&nbsp;</td><td>&nbsp;&nbsp;</td><td>&nbsp;</td>
</tr>
<tr>
<td>受講者ログインID</td>
<td>&nbsp;&nbsp;</td>
<td>{form_input name="audience_login_id"}&nbsp;&nbsp;<font size="-1" color="#ff0000">英数字6文字以上です</font></td>
</tr>
<tr>
<td>&nbsp;</td><td>&nbsp;&nbsp;</td><td>&nbsp;</td>
</tr>

<tr>
<td>受講者パスワード</td>
<td>&nbsp;&nbsp;</td>
<td>{form_input name="audience_login_pass"}&nbsp;&nbsp;<font size="-1" color="#ff0000">英数字6文字以上です</font></td>
</tr>
<tr>
<td>&nbsp;</td><td>&nbsp;&nbsp;</td><td>&nbsp;</td>
</tr>

<tr>
<td>聴講オプション</td>
<td>&nbsp;&nbsp;</td>
<td>{form_input name="tyoukou_option"}&nbsp;&nbsp;&nbsp;発行ID数&nbsp;{form_input name="tyoukou_cnt" size="4" maxlength="3"}&nbsp;&nbsp;<font size="-1" color="#ff0000">1-300を指定してください</font></td>
</tr>
<tr>
<td>&nbsp;</td><td>&nbsp;&nbsp;</td><td>&nbsp;</td>
</tr>

<tr>
<td></td>
<td>&nbsp;&nbsp;</td>
<td bgcolor="ffffff">
{if $form.tyoukou_option}
聴講者用に発行したログインID/パスワード<br>
{foreach from=$app.idpass_ary item=idpass}
&nbsp;&nbsp;&nbsp;&nbsp;{$idpass.login_id}/{$idpass.pass}<br>
{/foreach}
聴講者用ダイレクトログインurlはこちらをご案内してください&nbsp;（ログインID/パスワードは置き換えてください）<br>
http://{$smarty.server.SERVER_NAME}/seminar/index.php?action_userlogin=true&user_name={$smarty.session.name}&seminar_id={$smarty.session.seminar_id}&login_id=ログインID&password=パスワード&login_btn=%E3%83%AD%E3%82%B0%E3%82%A4%E3%83%B3<br><br>
{/if}
受講者(または聴講者用)ログインurlはこちらをご案内してください<br>http://{$smarty.server.SERVER_NAME}/seminar/index.php?action_userlogin=true&user_name={$smarty.session.name}&seminar_id={$smarty.session.seminar_id}<br><br>受講者urlはこちら(ログイン無しの時)<br>http://{$smarty.server.SERVER_NAME}/fms/liveseminar3/{$smarty.session.name}/audience.php?seminar_id={$smarty.session.seminar_id}<br><br>講師urlはこちら(ログイン無しの時)<br>http://{$smarty.server.SERVER_NAME}/fms/liveseminar3/{$smarty.session.name}/lecturer2.php?seminar_id={$smarty.session.seminar_id}</td>
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