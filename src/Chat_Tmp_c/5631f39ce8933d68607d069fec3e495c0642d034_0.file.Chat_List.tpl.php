<?php
/* Smarty version 3.1.31, created on 2018-06-24 03:09:45
  from "/src/Chat_Tmp/Chat_List.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2e8ce9997723_52000515',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5631f39ce8933d68607d069fec3e495c0642d034' => 
    array (
      0 => '/src/Chat_Tmp/Chat_List.tpl',
      1 => 1529773802,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2e8ce9997723_52000515 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<head>
    <title>友達一覧 <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</title>
</head>
<form method = "POST" action = "Chat_List.php">
    <input type = 'submit' name = 'Logoutbutton' value = "ログアウト">
</form>
<form method = "POST" action = "Timeline.php">
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
<p>友達リスト</p>
<body>
    <?php if ($_smarty_tpl->tpl_vars['friends_list']->value != array(array())) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['friends_list']->value, 'friend_data');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['friend_data']->value) {
?>
                <form method = "POST" action = "Chat_List.php">
                    <input type = "submit" name = "chat_button<?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>
" value = <?php echo $_smarty_tpl->tpl_vars['friend_data']->value['name'];?>
>
                    <input type = "hidden" name = "friend_pair_id<?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>
" value = <?php echo $_smarty_tpl->tpl_vars['friend_data']->value['id'];?>
>
                    <input type = "hidden" name = "friend_name<?php echo $_smarty_tpl->tpl_vars['cnt']->value++;?>
" value = <?php echo $_smarty_tpl->tpl_vars['friend_data']->value['name'];?>
>
                </form>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

    <?php }?>
</body>
</html><?php }
}
