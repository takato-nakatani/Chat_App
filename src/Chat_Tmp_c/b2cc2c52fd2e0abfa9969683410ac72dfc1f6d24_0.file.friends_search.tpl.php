<?php
/* Smarty version 3.1.31, created on 2018-06-23 17:55:46
  from "/src/Chat_Tmp/Friends_Search.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2e0b12e1f684_51572523',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b2cc2c52fd2e0abfa9969683410ac72dfc1f6d24' => 
    array (
      0 => '/src/Chat_Tmp/Friends_Search.tpl',
      1 => 1529744111,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2e0b12e1f684_51572523 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<head>
    <title>チャット <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</title>
</head>
<form method = "POST" action = "Timeline.php">
    <p>友達を検索</p>
    <input type = 'submit' name = 'Logoutbutton' value = "ログアウト">
</form>
<form method = "POST" action = "Timeline.php">
    <input type = 'submit' name = 'homebutton' value = 'マイページ'>
</form>
<form method = "POST" action = "Timeline.php">
    <input type = 'submit' name = 'MyConbutton' value = 'タイムライン'>
</form>
<form method = "POST" action = "Chat_List.php">
    <input type = 'submit' name = 'chatlistbutton' value = 'チャット'>
</form>
<form method = "POST" action = "Request_Management.php">
    <input type = 'submit' name = 'Request_Management_button' value = '友達リクエスト管理'>
</form>
<form method = "POST" action = "Friends_Search.php">
    検索したい友達のユーザIDを入力してください。
    <input id = 'search_id' type = 'text' name = 'input_friends_id' size = '30' maxlength="20">
    <input type = 'submit' name = 'search_button' value = '検索'>
</form>
<body>
    <?php if ($_smarty_tpl->tpl_vars['searched_user_data']->value != NULL) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['searched_user_data']->value, 'data');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['data']->value) {
?>
            <?php if ($_smarty_tpl->tpl_vars['request_info']->value[0]['friends_request_flg'] != 1 && $_smarty_tpl->tpl_vars['requested_info']->value[0]['friends_request_flg'] != 1) {?>
                    <?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>

                    <form method = "POST" action = "Friends_Search.php">
                      <input type = "submit" name = "request_button" value = "友達リクエスト">
                      <input type = "hidden" name = "requested_user_id" value = <?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
>
                    </form>
            <?php }?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

    <?php }?>
    <?php if (($_smarty_tpl->tpl_vars['searched_user_data']->value == NULL || $_smarty_tpl->tpl_vars['data']->value['friends_request_flg'] == 1) && $_smarty_tpl->tpl_vars['cnt']->value == 1) {?>
        一致するユーザは存在しません。ユーザIDが違うか、すでにリクエストを出している、または友達の可能性があります。
    <?php }?>
</body>
</html><?php }
}
