<?php
/* Smarty version 3.1.31, created on 2018-06-21 03:28:32
  from "/src/KeizibanTmp/MyPage.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2a9cd0600508_38617162',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'acebce52c2633ad50e011f6583bd21a7e3f35eab' => 
    array (
      0 => '/src/KeizibanTmp/MyPage.tpl',
      1 => 1529517451,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2a9cd0600508_38617162 (Smarty_Internal_Template $_smarty_tpl) {
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
<body>
            <?php if ($_smarty_tpl->tpl_vars['fetchAll']->value != NULL) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fetchAll']->value, 'data');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['data']->value) {
?>
                    <?php echo $_smarty_tpl->tpl_vars['cnt']->value++;?>
.　<<?php echo $_smarty_tpl->tpl_vars['data']->value['time'];?>
>

                    <form method = "POST" action = "MyContribution.php">
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['user_id'] == $_smarty_tpl->tpl_vars['login_user_id']->value) {?>
                            <input type = "submit" name = "editbutton<?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>
" value = "編集">
                            <input type = "submit" name = "deletebutton<?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>
" value = "削除">
                        <?php } else { ?>
                            <?php echo $_smarty_tpl->tpl_vars['data']->value['account_id'];?>
さんの投稿
                        <?php }?>

                        <input type = "hidden" name = "contents_id<?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>
" value = <?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
>
                    </form>
                    <?php echo e($_smarty_tpl->tpl_vars['data']->value['contents']);?>
<br /><br />



                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

            <?php }?>

            <form method = "POST" action = "MyContribution.php">
                <p>何してるなう？？(１００文字以内)</p>
                <textarea name = 'contribution' cols = '75' rows = '10' maxlength = "500" wrap = "hard"></textarea><br />
                <input type = 'submit' name = 'contributionbutton' value = '投稿!!'>
            </form>
</body>
</html><?php }
}
