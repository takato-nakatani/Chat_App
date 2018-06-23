<html>
<head>
    <title>チャット {$name}</title>
</head>
<form method = "POST" action = "MyContribution.php">
    <input type = 'submit' name = 'Logoutbutton' value = "ログアウト">
</form>
<form method = "POST" action = "Keiziban3.php">
    <input type = 'submit' name = 'homebutton' value = 'マイページ'>
</form>
<form method = "POST" action = "MyContribution.php">
    <input type = 'submit' name = 'MyConbutton' value = 'タイムライン'>
</form>
<form method = "POST" action = "friends_search.php">
    <input type = 'submit' name = 'Friends_search_button' value = '友達を検索する'>
</form>
<form method = "POST" action = "Request_Management.php">
    <input type = 'submit' name = 'Request_Management_button' value = '友達リクエスト管理'>
</form>
<p>友達リスト</p>
<body>
    {if $friends_list != array(array())}
        {foreach from = $friends_list item = $friend_data}
                <form method = "POST" action = "Chat_List.php">
                    <input type = "submit" name = "chat_button{$cnt}" value = {$friend_data['name']}>
                    <input type = "hidden" name = "friend_pair_id{$cnt}" value = {$friend_data['id']}>
                    <input type = "hidden" name = "friend_name{$cnt++}" value = {$friend_data['name']}>
                </form>
        {/foreach}
    {/if}
</body>
</html>