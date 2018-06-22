<html>
<head>
    <title>チャット {$name}</title>
</head>
<form method = "POST" action = "MyContribution.php">
    <p>友達を検索</p>
    <input type = 'submit' name = 'Logoutbutton' value = "ログアウト">
</form>
<form method = "POST" action = "Keiziban3.php">
    <input type = 'submit' name = 'homebutton' value = 'マイページ'>
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
    検索したい友達のユーザIDを入力してください。
    <input id = 'search_id' type = 'text' name = 'input_friends_id' size = '30' maxlength="20">
    <input type = 'submit' name = 'search_button' value = '検索'>
</form>
<body>
    {if $searched_user_data != NULL}
        {foreach from = $searched_user_data item = $data}
            {if $request_info[0]['friends_request_flg'] != 1 && $requested_info[0]['friends_request_flg'] != 1}
                    {$data['name']}
                    <form method = "POST" action = "Friends_search.php">
                      <input type = "submit" name = "request_button" value = "友達リクエスト">
                      <input type = "hidden" name = "requested_user_id" value = {$data['id']}>
                    </form>
            {/if}
        {/foreach}
    {/if}
    {if ($searched_user_data == NULL || $data['friends_request_flg'] == 1) && $cnt == 1}
        一致するユーザは存在しません。ユーザIDが違うか、すでにリクエストを出している、または友達の可能性があります。
    {/if}
</body>
</html>