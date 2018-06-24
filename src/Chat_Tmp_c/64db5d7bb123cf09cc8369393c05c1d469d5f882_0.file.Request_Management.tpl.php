<?php
/* Smarty version 3.1.31, created on 2018-06-24 19:35:31
  from "/src/Chat_Tmp/Request_Management.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2f73f3ec40f3_23080911',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '64db5d7bb123cf09cc8369393c05c1d469d5f882' => 
    array (
      0 => '/src/Chat_Tmp/Request_Management.tpl',
      1 => 1529833711,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_5b2f73f3ec40f3_23080911 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_css'=>"page",'_js'=>"page"), 0, false);
?>

<html>
<head>
    <title>友達管理ページ <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</title>
</head>
<p>友達を検索</p>
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
