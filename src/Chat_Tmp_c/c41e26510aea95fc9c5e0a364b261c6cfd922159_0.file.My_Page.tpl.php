<?php
/* Smarty version 3.1.31, created on 2018-06-24 03:09:36
  from "/src/Chat_Tmp/Timeline.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2e8ce04b8e96_66528145',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c41e26510aea95fc9c5e0a364b261c6cfd922159' => 
    array (
      0 => '/src/Chat_Tmp/Timeline.tpl',
      1 => 1529773802,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2e8ce04b8e96_66528145 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<head>
    <title><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
さんのマイページ</title>
</head>
<form method = "POST" action = "Timeline.php">
    <p><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
　さん</p>
    <input type = 'submit' name = 'Logoutbutton' value = 'ログアウト'>
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
    <input type = 'submit' name = 'Friends_search_button' value = '友達検索'>
</form>
<body>

</body>
</html>
<?php }
}
