<?php
/* Smarty version 3.1.31, created on 2018-06-24 18:49:25
  from "/src/Chat_Tmp/Timeline.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2f6925770157_34160780',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '39530eb763212ac02bb822b780e5746db3978ca8' => 
    array (
      0 => '/src/Chat_Tmp/Timeline.tpl',
      1 => 1529833711,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_5b2f6925770157_34160780 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_css'=>"page",'_js'=>"page"), 0, false);
?>

<html>
<head>
    <title>タイムライン <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</title>
</head>
<p>タイムライン</p>
<body>
            <?php if ($_smarty_tpl->tpl_vars['friends_contribution']->value != NULL) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['friends_contribution']->value, 'data');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['data']->value) {
?>
                    <?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>
.　<<?php echo $_smarty_tpl->tpl_vars['data']->value['time'];?>
>
                    <?php echo $_smarty_tpl->tpl_vars['data']->value['account_id'];?>
さんの投稿
                    <input type = "hidden" name = "contents_id<?php echo $_smarty_tpl->tpl_vars['cnt']->value++;?>
" value = <?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
>
                    <?php echo $_smarty_tpl->tpl_vars['data']->value['contents'];?>
<br /><br />
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

            <?php }?>

            <form method = "POST" action = "Timeline.php">
                <p>何してるなう？？(１００文字以内)</p>
                <textarea name = 'contribution' cols = '75' rows = '10' maxlength = "100" wrap = "hard"></textarea><br />
                <input type = 'submit' name = 'contributionbutton' value = '投稿!!'>
            </form>
</body>
</html><?php }
}
