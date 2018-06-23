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
<body>
<form method = "POST" action = "Chat_Room.php">
    {$friend_account_data['name']}さん<br /><br /><br />
    {if $chat_data != array(array())}
        {foreach from = $chat_data item = $chat}
                {if $chat['sender_id'] == $login_user}
                    自分    <{$chat['time']}>
                    <br />{$chat['contents']}
                    <input type = "submit" name = "delete_button{$cnt}" value = "削除">
                    <input type = "hidden" name = "friends_pair_id{$cnt++}" value = {$chat['id']}>
                {else}
                    {$chat['name']}さん    <{$chat['time']}>
                    <br />{$chat['contents']}
                {/if}
                <br /><br /><br />
        {/foreach}
    {/if}
</form>
<form method = "POST" action = "Chat_Room.php">
    <p>送りたい言葉</p>
    <textarea name = 'chat_input' cols = '100' rows = '5' maxlength = "300" wrap = "hard"></textarea><br />
    <input type = "submit" name = "chat_send_button" value = "送信">
</form>
</body>
</html>