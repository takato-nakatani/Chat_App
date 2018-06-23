<!--　友達申請の完了画面　-->


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>申請完了画面</title>
</head>
<body>
<p>友達の申請が完了しました。</p>
<form method = "POST" action = "MyContribution.php">
    <input type = "submit" name = "back_mypage" value = "マイページに戻る">
</form>
<form method = "POST" action = "Request_Management.php">
    <input type = "submit" name = "move_friends_request" value = "友達リクエスト管理へ">
</form>
<?php
    session_start();
    if(isset($_POST['backtomypage'])){
        $_SESSION['contents'] = NULL;
        header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'MyContribution.php');
    }
?>
</body>
</html>