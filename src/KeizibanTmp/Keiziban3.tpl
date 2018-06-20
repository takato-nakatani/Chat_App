<html>
<head>
    <title>ホーム {$name}さん</title>
</head>
<form method = "POST" action = "Keiziban3.php">
    <p>{$name}　さん</p>
    <input type = 'submit' name = 'Logoutbutton' value = 'ログアウト'>
</form>
<form method = "POST" action = "MyContribution.php">
    <input type = 'submit' name = 'MyConbutton' value = 'タイムライン'>
</form>
<form method = "POST" action = "Chat_List.php">
    <input type = 'submit' name = 'chatlistbutton' value = 'チャット'>
</form>
<form method = "POST" action = "Request_Management.php">
    <input type = 'submit' name = 'Request_Management_button' value = '友達リクエスト管理'>
</form>
<form method = "POST" action = "Friends_search.php">
    <input type = 'submit' name = 'Friends_search_button' value = '友達検索'>
</form>
<body>

</body>
</html>
