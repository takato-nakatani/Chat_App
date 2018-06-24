<?php
/* Smarty version 3.1.31, created on 2018-06-24 19:43:18
  from "/src/Chat_Tmp/Timeline.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2f75c6500216_65953569',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0f2d0cf796dd90a020d54dc433a41ab6ec9bbc03' => 
    array (
      0 => '/src/Chat_Tmp/Timeline.tpl',
      1 => 1529836996,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_5b2f75c6500216_65953569 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_css'=>"page",'_js'=>"page"), 0, false);
?>

<html>
<head>
    <title><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
さんのマイページ</title>
</head>
<div class = "p-3">
    <p><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
　さん</p>
</div>
</html>
<?php }
}
