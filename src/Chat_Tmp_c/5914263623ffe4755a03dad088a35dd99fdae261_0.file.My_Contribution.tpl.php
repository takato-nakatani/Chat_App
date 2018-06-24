<?php
/* Smarty version 3.1.31, created on 2018-06-24 18:49:24
  from "/src/Chat_Tmp/My_Contribution.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2f692432aa15_49844876',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5914263623ffe4755a03dad088a35dd99fdae261' => 
    array (
      0 => '/src/Chat_Tmp/My_Contribution.tpl',
      1 => 1529833711,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_5b2f692432aa15_49844876 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_css'=>"page",'_js'=>"page"), 0, false);
?>

<html>
<head>
    <title><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
の投稿文</title>
</head>
<body>

<form method = "POST" action ="My_Contribution.php">
<?php if ($_smarty_tpl->tpl_vars['my_contribution']->value != null) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['my_contribution']->value, 'data');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['data']->value) {
?>
            <?php echo $_smarty_tpl->tpl_vars['cnt']->value++;?>
.　<<?php echo $_smarty_tpl->tpl_vars['data']->value['time'];?>
>
            <input type = "hidden" name = "contents<?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>
" value = <?php echo $_smarty_tpl->tpl_vars['data']->value['contents'];?>
>
            <input type = "hidden" name = "contents_id<?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>
" value = <?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
>
            <input type = "submit" name = "editbutton<?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>
" value = "編集">
            <input type = "submit" name = "deletebutton<?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>
" value = "削除">
            <?php echo $_smarty_tpl->tpl_vars['data']->value['contents'];?>
<br /><br />
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
    <input type = 'submit' name = 'editcompletebutton' value = '編集を完了する'>
</form>
</body>
</html>
<?php }
}
