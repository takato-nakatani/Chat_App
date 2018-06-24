<?php
/* Smarty version 3.1.31, created on 2018-06-24 18:48:33
  from "/src/Chat_Tmp/Chat_List.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2f68f1aafed6_95910835',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ba5cd0e47f9527ece99a6b98d4841e456a1e3fc' => 
    array (
      0 => '/src/Chat_Tmp/Chat_List.tpl',
      1 => 1529833711,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_5b2f68f1aafed6_95910835 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_css'=>"page",'_js'=>"page"), 0, false);
?>

<html>
<head>
    <title>友達一覧 <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</title>
</head>
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
