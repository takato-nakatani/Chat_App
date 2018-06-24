<?php
/* Smarty version 3.1.31, created on 2018-06-25 01:04:53
  from "/src/Chat_Tmp/Request_Management.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2fc12517d476_65336401',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '64db5d7bb123cf09cc8369393c05c1d469d5f882' => 
    array (
      0 => '/src/Chat_Tmp/Request_Management.tpl',
      1 => 1529857057,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_5b2fc12517d476_65336401 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_css'=>"page",'_js'=>"page"), 0, false);
?>

<html>
<head>
    <title><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</title>
</head>
<body>
<div class="container">
    <h1>友達リクエストを管理</h1>
    <form method = "POST" action = "Request_Management.php">
        <div class="mx-auto text-right card bg-light mb-3" style="max-width: 50rem;">
            <div class="text-left card-header">
                申請されているリクエスト
            </div>
            <div class="text-center card-body">
                <p class="card-text">
                    <?php if ($_smarty_tpl->tpl_vars['arr_requested']->value != array(array())) {?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['arr_requested']->value, 'data');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['data']->value) {
?>
                            <?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
さん
                            <?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>

                            <input type = 'submit' class = "btn btn-large btn-primary" name = "Request_Accept_button<?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>
" value = '承認'>
                            <input type = "hidden" name = "Request_Accept<?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>
" value = "">

                            <input type = 'submit' class = "btn btn-large btn-primary" name = "Request_Refuse_button<?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>
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
                </p>
            </div>
        </div>
    </form>
    <form method = "POST" action = "Request_Management.php">
        <div class="mx-auto card bg-light mb-3" style="max-width: 50rem;">
            <div class="text-left card-header">
                承認待ちのリクエスト
            </div>
            <div class="text-center card-body">
                <p class="card-text">
                    <?php if ($_smarty_tpl->tpl_vars['arr_request']->value != array(array())) {?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['arr_request']->value, 'data');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['data']->value) {
?>
                            <?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
さん
                            <input type = 'submit' class = "btn btn-large btn-primary" name = 'Request_cancel_button<?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>
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
                </p>
            </div>
        </div>
    </form>
</div>
</body>
</html><?php }
}
