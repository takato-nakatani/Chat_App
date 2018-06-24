<?php
/* Smarty version 3.1.31, created on 2018-06-24 11:44:53
  from "/src/Chat_Tmp/Request_Management.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2f05a55d3b36_01875130',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '64685d8c16d022c43f0fe52059d91edbec9e9fa3' => 
    array (
      0 => '/src/Chat_Tmp/Request_Management.tpl',
      1 => 1529773802,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2f05a55d3b36_01875130 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<head>
    <title>友達管理ページ <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</title>
</head>
<form method = "POST" action = "Request_Management.php">
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
<form method = "POST" action = "Friends_Search.php">
    <input type = 'submit' name = 'Friends_search_button' value = '友達検索'>
</form>
<body>
<form method = "POST" action = "Request_Management.php">
    申請されているリクエスト<br />
    <?php if ($_smarty_tpl->tpl_vars['arr_requested']->value != array(array())) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['arr_requested']->value, 'data');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['data']->value) {
?>
            <?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
さん
            <?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>

            <input type = 'submit' name = "Request_Accept_button<?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>
" value = '承認'>
            <input type = "hidden" name = "Request_Accept<?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>
" value = "">

            <input type = 'submit' name = "Request_Refuse_button<?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>
" value = '拒否'><br /><br /><br />
            <input type = "hidden" name = "Request_Refuse<?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>
" value = "">
            <input type = "hidden" name = "requester_id<?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>
" value = <?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
 >
            
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

    <?php } else { ?>
        承認待ちのリクエストはありません。<br /><br /><br />
    <?php }?>

<form method = "POST" action = "Request_Management.php">
    承認待ちのリクエスト<br />
    <?php if ($_smarty_tpl->tpl_vars['arr_request']->value != array(array())) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['arr_request']->value, 'data');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['data']->value) {
?>
            <?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
さん
            <input type = 'submit' name = 'Request_cancel_button<?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>
' value = '申請取り消し'><br /><br /><br />
            <input type = "hidden" name = "requested_user_id<?php echo $_smarty_tpl->tpl_vars['cnt']->value++;?>
" value = <?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

    <?php } else { ?>
        申請中のリクエストはありません。<br /><br /><br />
    <?php }?>
</form>
</body>
</html><?php }
}
