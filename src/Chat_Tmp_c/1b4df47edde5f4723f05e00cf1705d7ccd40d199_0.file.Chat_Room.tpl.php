<?php
/* Smarty version 3.1.31, created on 2018-06-25 00:59:41
  from "/src/Chat_Tmp/Chat_Room.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2fbfed74e672_27459323',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1b4df47edde5f4723f05e00cf1705d7ccd40d199' => 
    array (
      0 => '/src/Chat_Tmp/Chat_Room.tpl',
      1 => 1529856746,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_5b2fbfed74e672_27459323 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_css'=>"page",'_js'=>"page"), 0, false);
?>

<html>
<head>
    <title>チャット <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</title>
</head>
<body>
<div class="container">
<form method = "POST" action = "Chat_Room.php">
    <h1><?php echo $_smarty_tpl->tpl_vars['friend_account_data']->value['name'];?>
さん</h1>
    <?php if ($_smarty_tpl->tpl_vars['chat_data']->value != array(array())) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['chat_data']->value, 'chat');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['chat']->value) {
?>
                <?php if ($_smarty_tpl->tpl_vars['chat']->value['sender_id'] == $_smarty_tpl->tpl_vars['login_user']->value) {?>
                    <div class="mx-auto text-right card bg-light mb-3" style="max-width: 50rem;">
                        <div class="card-header">
                            <<?php echo $_smarty_tpl->tpl_vars['chat']->value['time'];?>
>
                            <input type = "submit" class = "card-link btn btn-large btn-primary" name = "delete_button<?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>
" value = "削除">
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <input type = "hidden" name = "friends_pair_id<?php echo $_smarty_tpl->tpl_vars['cnt']->value++;?>
" value = <?php echo $_smarty_tpl->tpl_vars['chat']->value['id'];?>
>
                                <p><?php echo $_smarty_tpl->tpl_vars['chat']->value['contents'];?>
</p>
                            </p>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="mx-auto text-left card bg-light mb-3" style="max-width: 50rem;">
                        <div class="card-header">
                            <<?php echo $_smarty_tpl->tpl_vars['chat']->value['time'];?>
>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                            <p><?php echo $_smarty_tpl->tpl_vars['chat']->value['contents'];?>
</p>
                        </p>
                        </div>
                    </div>
                <?php }?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

    <?php }?>
    <div class="mx-auto text-right form-group" style="max-width: 50rem;">
        <input class = "form-control mb-3" type="text" name = "chat_input" maxlength = "300">
        <input type = "submit" class = "btn btn-large btn-primary" name = "chat_send_button" value = "送信">
    </div>
</form>
</div>
</body>
</html>
<?php }
}
