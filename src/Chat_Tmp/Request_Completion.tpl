{include file = "header.tpl" _css = "page" _js = "page"}
<html>
<head>
    <meta charset="UTF-8" />
    <title>友達リクエスト完了画面</title>
</head>
<body>
<div class="container">
    <h1>友達の申請が完了しました。</h1>
    <form method = "POST" action = "Timeline.php">
        <input type = "submit" class = "btn btn-large btn-primary" name = "back_mypage" value = "マイページに戻る">
    </form>
    <form method = "POST" action = "Request_Management.php">
        <input type = "submit" class = "btn btn-large btn-primary" name = "move_friends_request" value = "友達リクエスト管理へ">
    </form>
</div>
</body>
</html>