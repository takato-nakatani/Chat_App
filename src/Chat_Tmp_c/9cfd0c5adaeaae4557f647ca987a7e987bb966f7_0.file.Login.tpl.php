<?php
/* Smarty version 3.1.31, created on 2018-06-24 23:45:26
  from "/src/Chat_Tmp/Login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2fae8609e7e9_56274765',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9cfd0c5adaeaae4557f647ca987a7e987bb966f7' => 
    array (
      0 => '/src/Chat_Tmp/Login.tpl',
      1 => 1529851523,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2fae8609e7e9_56274765 (Smarty_Internal_Template $_smarty_tpl) {
?>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<?php echo '<script'; ?>
 src="../js/bootstrap.min.js"><?php echo '</script'; ?>
>
<html>
<head>
    <meta charset="UTF-8" />
    <title>ログイン画面</title>
</head>
<body>
<div class="container">
    <h1>ログイン</h1>
    <form method = "POST" action = "Login.php">
        <label>ユーザ名(半角英数字２字以上２０字以内)：</label>
        <input id = 'nametextbox' type = 'text' name = 'Loginname' size = '20' maxlength="20"><br />

        <label>パスワード(半角英数字８字以上３０字以内)：</label>
        <input id = 'passwordtextbox' type = 'password' name = 'Loginpass' size = '30' maxlength="30"><br />
            <p><?php echo $_smarty_tpl->tpl_vars['error_msg']->value;?>
</p><p><?php echo $_smarty_tpl->tpl_vars['error_msg_preg_match']->value;?>
</p><p><?php echo $_smarty_tpl->tpl_vars['input_error_msg']->value;?>
</p>
        <input type = 'submit' class = "btn btn-large btn-primary" name = 'Loginbutton' value = 'ログイン'>
    </form>
    <form method = "POST" action = "Registration.php">
        <p>まだ新規登録されていない方は以下の＜新規登録＞ボタンより新規登録を行ってください。</p>
        <input type = 'submit' class = "btn btn-large btn-primary" name = 'NewRegistration' value = '新規登録'>
    </form>
</div>
</body>
</html><?php }
}
