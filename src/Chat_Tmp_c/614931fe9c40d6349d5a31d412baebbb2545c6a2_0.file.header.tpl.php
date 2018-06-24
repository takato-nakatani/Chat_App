<?php
/* Smarty version 3.1.31, created on 2018-06-24 19:35:59
  from "/src/Chat_Tmp/header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2f740f522fe7_96591169',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '614931fe9c40d6349d5a31d412baebbb2545c6a2' => 
    array (
      0 => '/src/Chat_Tmp/header.tpl',
      1 => 1529836557,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2f740f522fe7_96591169 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html lang = "ja">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<?php echo '<script'; ?>
 src="../js/bootstrap.min.js"><?php echo '</script'; ?>
>
<div class = "p-3">
<ul class="list-inline">
    <li class="list-inline-item"><a href="../My_Page.php">マイページ</a></li>
    <li class="list-inline-item"><a href="../Timeline.php">タイムライン</a></li>
    <li class="list-inline-item"><a href="../My_Contribution.php">マイ投稿</a></li>
    <li class="list-inline-item"><a href="../Chat_List.php">チャット</a></li>
    <li class="list-inline-item"><a href="../Request_Management.php">友達リクエスト管理</a></li>
    <li class="list-inline-item"><a href="../Friends_Search.php">友達検索</a></li>
</ul>
</html><?php }
}
