<?php
/* Smarty version 3.1.31, created on 2018-06-25 01:33:28
  from "/src/Chat_Tmp/Timeline.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2fc7d8d8d1b4_33016946',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '39530eb763212ac02bb822b780e5746db3978ca8' => 
    array (
      0 => '/src/Chat_Tmp/Timeline.tpl',
      1 => 1529858772,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_5b2fc7d8d8d1b4_33016946 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_css'=>"page",'_js'=>"page"), 0, false);
?>

<html>
<head>
    <title><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</title>
</head>
<body>
<div class="container">
    <h1>タイムライン</h1>
            <?php if ($_smarty_tpl->tpl_vars['friends_contribution']->value != NULL) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['friends_contribution']->value, 'data');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['data']->value) {
?>
                        <div class="card bg-light mb-3" style="max-width: 50rem;">
                            <div class="card-header">
                                <?php echo $_smarty_tpl->tpl_vars['friends_data']->value['name'];?>
さんの投稿
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>
.　<<?php echo $_smarty_tpl->tpl_vars['data']->value['time'];?>
>
                                </h4>
                                <p class="card-text">
                                    <input type = "hidden" name = "contents_id<?php echo $_smarty_tpl->tpl_vars['cnt']->value++;?>
" value = <?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
>
                                    <?php echo $_smarty_tpl->tpl_vars['data']->value['contents'];?>
<br /><br />
                                </p>
                            </div>
                        </div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

            <?php }?>

            <form method = "POST" action = "Timeline.php">
                <p>何してるなう？？(１００文字以内)</p>
                <textarea name = 'contribution' cols = '75' rows = '10' maxlength = "100" wrap = "hard"></textarea><br />
                <input type = 'submit' class = "btn btn-large btn-primary" name = 'contributionbutton' value = '投稿!!'>
            </form>
</div>
</body>
</html><?php }
}
