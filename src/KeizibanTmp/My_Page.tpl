<html>
<head>
    <title>{$name}さんのマイページ</title>
</head>
<form method = "POST" action = "My_Page.php">
    <p>{$name}　さん</p>
    <input type = 'submit' name = 'Logoutbutton' value = 'ログアウト'>
</form>
<form method = "POST" action = "Timeline.php">
    <input type = 'submit' name = 'MyConbutton' value = 'タイムライン'>
</form>
<form method = "POST" action = "Chat_List.php">
    <input type = 'submit' name = 'chatlistbutton' value = 'チャット'>
</form>
<form method = "POST" action = "Request_Management.php">
    <input type = 'submit' name = 'Request_Management_button' value = '友達リクエスト管理'>
</form>
<form method = "POST" action = "Friends_Search.php">
    <input type = 'submit' name = 'Friends_search_button' value = '友達検索'>
</form>
<body>

</body>
</html>
