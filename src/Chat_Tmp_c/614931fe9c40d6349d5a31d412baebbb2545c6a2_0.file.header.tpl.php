<?php
/* Smarty version 3.1.31, created on 2018-06-25 00:03:33
  from "/src/Chat_Tmp/header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b2fb2c5427695_26246096',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '614931fe9c40d6349d5a31d412baebbb2545c6a2' => 
    array (
      0 => '/src/Chat_Tmp/header.tpl',
      1 => 1529852610,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2fb2c5427695_26246096 (Smarty_Internal_Template $_smarty_tpl) {
?>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<?php echo '<script'; ?>
 src="../js/bootstrap.min.js"><?php echo '</script'; ?>
>
<html lang = "ja">
<div class = "p-3">
    <ul class="list-inline">
        <li class="list-inline-item"><a href="../Timeline.php">マイページ</a></li>
        <li class="list-inline-item"><a href="../My_Contribution.php">マイ投稿</a></li>
        <li class="list-inline-item"><a href="../Chat_List.php">チャット</a></li>
        <li class="list-inline-item"><a href="../Request_Management.php">友達リクエスト管理</a></li>
        <li class="list-inline-item"><a href="../Friends_Search.php">友達検索</a></li>
    </ul>
    <form method = "POST" class="text-right" action = "Timeline.php">
        <input type = 'submit' class = "btn btn-large btn-primary" name = 'Logoutbutton' value = "ログアウト">
    </form>
</div>
</html>
<?php }
}
