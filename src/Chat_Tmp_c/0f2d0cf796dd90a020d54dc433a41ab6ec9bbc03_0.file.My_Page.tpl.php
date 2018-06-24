<?php
/* Smarty version 3.1.31, created on 2018-06-24 19:01:32
  from "/src/Chat_Tmp/My_Page.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2f6bfcea60f9_67013753',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0f2d0cf796dd90a020d54dc433a41ab6ec9bbc03' => 
    array (
      0 => '/src/Chat_Tmp/My_Page.tpl',
      1 => 1529834490,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_5b2f6bfcea60f9_67013753 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_css'=>"page",'_js'=>"page"), 0, false);
?>

<html>
<head>
    <title><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
さんのマイページ</title>
</head>
<p><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
　さん</p>
<body>

</body>
</html>
<?php }
}
