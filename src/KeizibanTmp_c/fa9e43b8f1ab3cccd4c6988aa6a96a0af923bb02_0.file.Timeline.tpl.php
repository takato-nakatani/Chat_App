<?php
/* Smarty version 3.1.31, created on 2018-06-24 01:09:49
  from "/src/KeizibanTmp/Timeline.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2e70cd7fc173_84340596',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fa9e43b8f1ab3cccd4c6988aa6a96a0af923bb02' => 
    array (
      0 => '/src/KeizibanTmp/Timeline.tpl',
      1 => 1529764181,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2e70cd7fc173_84340596 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<head>
    <title>掲示版3 <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</title>
</head>
<form method = "POST" action = "MyContribution.php">
    <p>タイムライン</p>
    <input type = 'submit' name = 'Logoutbutton' value = "ログアウト">
</form>
<form method = "POST" action = "Keiziban3.php">
    <input type = 'submit' name = 'homebutton' value = 'マイページ'><br /><br /><br />
</form>
<form method = "POST" action = "EditContents.php">
    <input type = 'submit' name = 'mycontributionbutton' value = 'マイ投稿'><br /><br /><br />
</form>
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

            <form method = "POST" action = "MyContribution.php">
                <p>何してるなう？？(１００文字以内)</p>
                <textarea name = 'contribution' cols = '75' rows = '10' maxlength = "100" wrap = "hard"></textarea><br />
                <input type = 'submit' name = 'contributionbutton' value = '投稿!!'>
            </form>
</body>
</html><?php }
}
