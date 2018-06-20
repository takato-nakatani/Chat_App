<?php
/* Smarty version 3.1.31, created on 2018-06-21 03:50:42
  from "/src/KeizibanTmp/friends_search.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2aa202cd4ad4_20703447',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b2cc2c52fd2e0abfa9969683410ac72dfc1f6d24' => 
    array (
      0 => '/src/KeizibanTmp/friends_search.tpl',
      1 => 1529520453,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2aa202cd4ad4_20703447 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<head>
    <title>チャット <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</title>
</head>
<form method = "POST" action = "MyContribution.php">
    <p>友達を検索</p>
    <input type = 'submit' name = 'Logoutbutton' value = "ログアウト">
</form>
<form method = "POST" action = "Keiziban3.php">
    <input type = 'submit' name = 'homebutton' value = 'マイページ'>
</form>
<form method = "POST" action = "MyContribution.php">
    <input type = 'submit' name = 'MyConbutton' value = 'タイムライン'>
</form>
<form method = "POST" action = "Chat_List.php">
    <input type = 'submit' name = 'chatlistbutton' value = 'チャット'>
</form>
<form method = "POST" action = "Request_Management.php">
    <input type = 'submit' name = 'Request_Management_button' value = '友達リクエスト管理'>
</form>
<form method = "POST" action = "Friends_search.php">
    検索したい友達のユーザIDを入力してください。
    <input id = 'search_id' type = 'text' name = 'input_friends_id' size = '30' maxlength="20">
    <input type = 'submit' name = 'Request_Management_button' value = '検索'>
</form>
<body>
    <?php if ($_smarty_tpl->tpl_vars['friends_data']->value != NULL) {?>
        <?php echo $_smarty_tpl->tpl_vars['friends_data']->value['name'];?>

        <form method = "POST" action = "Friends_search.php">
          <input type = "submit" name = "request_button" value = "友達リクエスト">
          <input type = "hidden" name = "requested_user_id" value = <?php echo $_smarty_tpl->tpl_vars['friends_data']->value['id'];?>
>
        </form>
    <?php } else { ?>
        一致したユーザはいませんでした。
    <?php }?>
</body>
</html><?php }
}
