<?php
/* Smarty version 3.1.31, created on 2018-06-24 03:09:17
  from "/src/KeizibanTmp/Login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2e8ccd318233_36089258',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a97a5d89581e4a0aa9612b87b5d26c3b6c8c4d99' => 
    array (
      0 => '/src/KeizibanTmp/Login.tpl',
      1 => 1529773802,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2e8ccd318233_36089258 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<head>
    <meta charset="UTF-8" />
    <title>ログイン画面</title>
</head>
<body>
<form method = "POST" action = "Login.php">
    <p>掲示板</p>
    <label>ユーザ名(半角英数字２字以上２０字以内)：</label>
    <input id = 'nametextbox' type = 'text' name = 'Loginname' size = '20' maxlength="20"><br />

    <label>パスワード(半角英数字８字以上３０字以内)：</label>
    <input id = 'passwordtextbox' type = 'password' name = 'Loginpass' size = '30' maxlength="30"><br />

    <input type = 'submit' name = 'Loginbutton' value = 'ログイン'>
</form>
<form method = "POST" action = "Registration.php">
    <p>まだ新規登録されていない方は以下の＜新規登録＞ボタンより新規登録を行ってください。</p>
    <input type = 'submit' name = 'NewRegistration' value = '新規登録'>
</form>
</body>
</html><?php }
}
