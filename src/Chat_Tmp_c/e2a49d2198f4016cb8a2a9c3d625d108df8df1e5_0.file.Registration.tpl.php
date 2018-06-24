<?php
/* Smarty version 3.1.31, created on 2018-06-24 23:32:40
  from "/src/Chat_Tmp/Registration.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2fab88cd0394_62624336',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e2a49d2198f4016cb8a2a9c3d625d108df8df1e5' => 
    array (
      0 => '/src/Chat_Tmp/Registration.tpl',
      1 => 1529850759,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2fab88cd0394_62624336 (Smarty_Internal_Template $_smarty_tpl) {
?>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<?php echo '<script'; ?>
 src="../js/bootstrap.min.js"><?php echo '</script'; ?>
>
<html>
<head>
    <meta charset="UTF-8" />
    <title>アカウント登録画面</title>
</head>
<body>
<div class="container">
    <h1>アカウント登録</h1>
    <form method = "POST" action = "Registration.php">

        <p>以下のフォームに従って＜ユーザ名＞と＜パスワード＞を設定してください</p>
        <label>ユーザ名：</label>
        <input id = 'username' type = 'text' name = 'username' size = '30' maxlength="20"><br />

        <label>ユーザID(半角英数字２字以上２０字以内)：</label>
        <input id = 'userid' type = 'text' name = 'userid' size = '30' maxlength="20"><br /

        <label>パスワード(半角英数字８字以上３０字以内)：</label>
        <input id = 'userpass' type = 'password' name = 'userpass' size = '30' maxlength="30"><br />
        <p><?php echo $_smarty_tpl->tpl_vars['error_msg_preg_match']->value;?>
</p><p><?php echo $_smarty_tpl->tpl_vars['error_msg']->value;?>
</p>
        <input type = 'submit' class = "btn btn-large btn-primary" name = 'Registrationbutton' value = '登録'>
    </form>
    <form method = "POST" action = "Login.php">
        <input type = "submit" class = "btn btn-large btn-primary" name = "backtoLogin" value = "ログイン画面に戻る">
    </form>
</div>
</body>
</html><?php }
}
