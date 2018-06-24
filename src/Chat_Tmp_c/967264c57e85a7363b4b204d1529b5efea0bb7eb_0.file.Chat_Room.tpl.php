<?php
/* Smarty version 3.1.31, created on 2018-06-23 18:55:07
  from "/src/Chat_Tmp/Chat_Room.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2e18fbba5cf3_13791617',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '967264c57e85a7363b4b204d1529b5efea0bb7eb' => 
    array (
      0 => '/src/Chat_Tmp/Chat_Room.tpl',
      1 => 1529747702,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2e18fbba5cf3_13791617 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<head>
    <title>チャット <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</title>
</head>
<form method = "POST" action = "Timeline.php">
    <input type = 'submit' name = 'Logoutbutton' value = "ログアウト">
</form>
<form method = "POST" action = "My_Page.php">
    <input type = 'submit' name = 'homebutton' value = 'マイページ'>
</form>
<form method = "POST" action = "Timeline.php">
    <input type = 'submit' name = 'MyConbutton' value = 'タイムライン'>
</form>
<form method = "POST" action = "Friends_Search.php">
    <input type = 'submit' name = 'Friends_search_button' value = '友達を検索する'>
</form>
<form method = "POST" action = "Request_Management.php">
    <input type = 'submit' name = 'Request_Management_button' value = '友達リクエスト管理'>
</form>
<body>
<form method = "POST" action = "Chat_Room.php">
    <?php echo $_smarty_tpl->tpl_vars['friend_account_data']->value['name'];?>
さん<br /><br /><br />
    <?php if ($_smarty_tpl->tpl_vars['chat_data']->value != array(array())) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['chat_data']->value, 'chat');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['chat']->value) {
?>
                <?php if ($_smarty_tpl->tpl_vars['chat']->value['sender_id'] == $_smarty_tpl->tpl_vars['login_user']->value) {?>
                    自分    <<?php echo $_smarty_tpl->tpl_vars['chat']->value['time'];?>
>
                    <br /><?php echo $_smarty_tpl->tpl_vars['chat']->value['contents'];?>

                    <input type = "submit" name = "delete_button<?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>
" value = "削除">
                    <input type = "hidden" name = "friends_pair_id<?php echo $_smarty_tpl->tpl_vars['cnt']->value++;?>
" value = <?php echo $_smarty_tpl->tpl_vars['chat']->value['id'];?>
>
                <?php } else { ?>
                    <?php echo $_smarty_tpl->tpl_vars['chat']->value['name'];?>
さん    <<?php echo $_smarty_tpl->tpl_vars['chat']->value['time'];?>
>
                    <br /><?php echo $_smarty_tpl->tpl_vars['chat']->value['contents'];?>

                <?php }?>
                <br /><br /><br />
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

    <?php }?>
</form>
<form method = "POST" action = "Chat_Room.php">
    <p>送りたい言葉</p>
    <textarea name = 'chat_input' cols = '100' rows = '5' maxlength = "300" wrap = "hard"></textarea><br />
    <input type = "submit" name = "chat_send_button" value = "送信">
</form>
</body>
</html><?php }
}
