<?php
/* Smarty version 3.1.31, created on 2018-06-21 03:20:31
  from "/src/Chat_Tmp/My_Page.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2a9aefa22e49_30695346',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7fbdd1f38c8e9e791510b1cb5b221f75fc518cce' => 
    array (
      0 => '/src/Chat_Tmp/My_Page.tpl',
      1 => 1529518830,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2a9aefa22e49_30695346 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<head>
    <title>ホーム <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
さん</title>
</head>
<form method = "POST" action = "My_Page.php">
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
