{include file = "header.tpl" _css = "page" _js = "page"}
<html>
<head>
    <title>友達を検索 {$name}</title>
</head>
<p>友達を検索</p>
<form method = "POST" action = "Friends_Search.php">
    検索したい友達のユーザIDを入力してください。
    <input id = 'search_id' type = 'text' name = 'input_friends_id' size = '30' maxlength="20">
    <input type = 'submit' name = 'search_button' value = '検索'>
</form>
<body>
    {if $searched_user_data != null}
            {if $request_info[0]['friends_request_flg'] != 1 AND $requested_info[0]['friends_request_flg'] != 1}
                    {$searched_user_data['name']}
                    <form method = "POST" action = "Friends_Search.php">
                      <input type = "submit" name = "request_button" value = "友達リクエスト">
                      <input type = "hidden" name = "requested_user_id" value = {$searched_user_data['id']}>
                    </form>
            {/if}
    {/if}
    {if ($searched_user_data == null || $data['friends_request_flg'] == 1) && $cnt == 1}
        一致するユーザは存在しません。ユーザIDが違うか、すでにリクエストを出している、または友達の可能性があります。
    {/if}
</body>
</html>