<?php
/* Smarty version 3.1.31, created on 2018-06-25 00:47:09
  from "/src/Chat_Tmp/Chat_List.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2fbcfdb0e366_90900984',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ba5cd0e47f9527ece99a6b98d4841e456a1e3fc' => 
    array (
      0 => '/src/Chat_Tmp/Chat_List.tpl',
      1 => 1529855992,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_5b2fbcfdb0e366_90900984 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_css'=>"page",'_js'=>"page"), 0, false);
?>

<html>

<head>
    <title><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</title>
</head>
<body>
<div class="container">
    <h1>友達リスト</h1>
    <?php if ($_smarty_tpl->tpl_vars['friends_list']->value != array(array())) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['friends_list']->value, 'friend_data');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['friend_data']->value) {
?>
                <form method = "POST" action = "Chat_List.php">
                    <div class="col-sm-6">
                        <input type = "submit" class="col-sm-6 btn btn-large btn-success" name = "chat_button<?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>
" value = <?php echo $_smarty_tpl->tpl_vars['friend_data']->value['name'];?>
>
                        <input type = "hidden" name = "friend_pair_id<?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>
" value = <?php echo $_smarty_tpl->tpl_vars['friend_data']->value['id'];?>
>
                        <input type = "hidden" name = "friend_name<?php echo $_smarty_tpl->tpl_vars['cnt']->value++;?>
" value = <?php echo $_smarty_tpl->tpl_vars['friend_data']->value['name'];?>
>
                    </div>

                </form>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

    <?php }?>
</div>
</body>
</html><?php }
}
