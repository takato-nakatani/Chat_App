<?php
/* Smarty version 3.1.31, created on 2018-06-25 01:25:36
  from "/src/Chat_Tmp/My_Contribution.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2fc60010a191_85163831',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5914263623ffe4755a03dad088a35dd99fdae261' => 
    array (
      0 => '/src/Chat_Tmp/My_Contribution.tpl',
      1 => 1529858300,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_5b2fc60010a191_85163831 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_css'=>"page",'_js'=>"page"), 0, false);
?>

<html>
<head>
    <title><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</title>
</head>
<body>
<div class="container">
    <h1>マイ投稿の編集</h1>
    <form method = "POST" action ="My_Contribution.php">
    <?php if ($_smarty_tpl->tpl_vars['my_contribution']->value != null) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['my_contribution']->value, 'data');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['data']->value) {
?>
            <div class="mx_auto card bg-light mb-3" style="max-width: 50rem;">
                <div class="card-header">
                    <?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>

                </div>
                <div class="card-body">
                    <h2 class="card-title">
                        <<?php echo $_smarty_tpl->tpl_vars['data']->value['time'];?>
>
                    </h2>
                    <p class="card-text">
                        <input type = "hidden" name = "contents<?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>
" value = <?php echo $_smarty_tpl->tpl_vars['data']->value['contents'];?>
>
                        <input type = "hidden" name = "contents_id<?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>
" value = <?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
>
                            <p><?php echo $_smarty_tpl->tpl_vars['data']->value['contents'];?>
</p>
                        <input type = "submit" class="card-link btn btn-large btn-primary" name = "editbutton<?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>
" value = "編集">
                        <input type = "submit" class="card-link btn btn-large btn-primary" name = "deletebutton<?php echo $_smarty_tpl->tpl_vars['cnt']->value++;?>
" value = "削除">
                    </p>
                </div>
            </div>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

    <?php }?>
    </form>
    <form method = "POST" action = "My_Contribution.php">
        <p>編集後、完了ボタンを押してください。</p>
        <textarea name = 'contribution' cols = '75' rows = '10' maxlength = "500" wrap = "hard"><?php echo $_smarty_tpl->tpl_vars['before_edit']->value;?>
</textarea><br />
        <input type = 'submit' class = "btn btn-large btn-primary" name = 'editcompletebutton' value = '編集を完了する'>
    </form>
</div>
</body>
</html>
<?php }
}
