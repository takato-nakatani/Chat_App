<?php
/* Smarty version 3.1.31, created on 2018-06-25 01:23:58
  from "/src/Chat_Tmp/Friends_Search.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2fc59e3b9a38_86170693',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '55e15c506c5baf231bd0506dcf8cab5570e51c78' => 
    array (
      0 => '/src/Chat_Tmp/Friends_Search.tpl',
      1 => 1529858201,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_5b2fc59e3b9a38_86170693 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_css'=>"page",'_js'=>"page"), 0, false);
?>

<html>
<head>
    <title>友達を検索 <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</title>
</head>
<body>
<div class="container">
    <h1>友達を検索</h1>
    <form method = "POST" action = "Friends_Search.php">
        検索したい友達のユーザIDを入力してください。
        <div class=" text-right form-group" style="max-width: 50rem;">
            <input id = 'search_id' class = "form-control mb-3" type="text" name = "input_friends_id" size = '30' maxlength = "20">
            <input type = 'submit' class = "btn btn-large btn-primary" name = 'search_button' value = '検索'>
        </div>
    </form>
    <?php if ($_smarty_tpl->tpl_vars['searched_user_data']->value != null) {?>
        <?php if ($_smarty_tpl->tpl_vars['request_info']->value[0]['friends_request_flg'] != 1 && $_smarty_tpl->tpl_vars['requested_info']->value[0]['friends_request_flg'] != 1) {?>
            <div class="text-center card bg-light mb-3" style="max-width: 50rem;">
                <div class="card-body">
                    <p class="card-text">
                        <?php echo $_smarty_tpl->tpl_vars['searched_user_data']->value['name'];?>

                        <form method = "POST" action = "Friends_Search.php">
                            <input type = "submit" class = "btn btn-large btn-primary" name = "request_button" value = "友達リクエスト">
                            <input type = "hidden" name = "requested_user_id" value = <?php echo $_smarty_tpl->tpl_vars['searched_user_data']->value['id'];?>
>
                        </form>
                    </p>
                </div>
            </div>
            <?php }?>
    <?php }?>
</div>
</body>
</html><?php }
}
