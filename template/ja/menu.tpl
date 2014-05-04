<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理者メニュー | セミナー管理</title>
{include file="common_meta.tpl"}
{literal}
<script>
<!--
function setValue(no) {
	document.form_main.menu.value = no;
	document.form_main.submit();
}
function semidel() {
    if (!document.form_main.seminar_id.value) {
        alert('セミナーを選択してください');
    }else{
        if (confirm('セミナーを削除します、よろしいですか？')) {
          document.form_main.delete_btn.value='削除';
          document.form_main.submit();
        }
    }
}
-->
</script>
{/literal}
</head>
<body>
<div id="body">

<!-- メイン -->
<div id="main">
<h3 class="h301 mt0">セミナー管理 メニュー</h3>

<div class="loginbox">

{foreach from=$errors item=error}
<span class="frd">{$error}</span><br />
{/foreach}

{form name="form_main" ethna_action="menu"}
{form_input name="menu"}
<table cellspacing="0">
<tr>
<td>新規セミナーID</td>
<td>{form_input name="seminar_new"}&nbsp;&nbsp;<font size="-1" color="#ff0000">新規セミナーIDは英数字6文字以上です</font></td>
</tr>
<tr>
<td>セミナー選択</td>
<td>{form_input name="seminar_id"}&nbsp;&nbsp;<input type="button" onclick="semidel();return false;" value="削除" /><font size="-1">&nbsp;&nbsp;セミナーを削除します</font></td>
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
{/form}
<center>
{form ethna_action="adminlogin" name="form_main2" }
<input type="submit" name="login_btn" value="ログアウト" />
{/form}
</center>
</div>

</div>
<!-- /メイン -->


</div>
</body>
</html>