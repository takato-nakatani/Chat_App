<?php
/* Smarty version 3.1.31, created on 2018-06-24 00:24:17
  from "/src/KeizibanTmp/Edit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2e6621258716_63532309',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7b3fbe250d6f94bc799dbfa348c31fa070a601ea' => 
    array (
      0 => '/src/KeizibanTmp/Edit.tpl',
      1 => 1529767469,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2e6621258716_63532309 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<head>
    <title>投稿文の編集 <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
さん</title>
</head>
<form method = "POST" action = "EditContents.php">
    <input type = 'submit' name = 'Logoutbutton' value = 'ログアウト'>
</form>
<form method = "POST" action = "EditContents.php">
    <input type = 'submit' name = 'backtomypagebutton' value = 'マイページに戻る'>
</form>
<body>

<form method = "POST" action ="EditContents.php">
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
<form method = "POST" action = "EditContents.php">
    <p>編集後、完了ボタンを押してください。</p>
    <textarea name = 'contribution' cols = '75' rows = '10' maxlength = "500" wrap = "hard"><?php echo $_smarty_tpl->tpl_vars['before_edit']->value;?>
</textarea><br />
    <input type = 'submit' name = 'editcompletebutton' value = '編集を完了する'>
</form>
</body>
</html>
<?php }
}
