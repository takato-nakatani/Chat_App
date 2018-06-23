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
<form method = "POST" action = "friends_search.php">
    <input type = 'submit' name = 'Friends_search_button' value = '友達検索'>
</form>
<body>
<form method = "POST" action = "Request_Management.php">
    申請されているリクエスト<br />
    {if $arr_requested != array(array())}
        {foreach from = $arr_requested item = $data}
            {$data['name']}さん
            {$data['id']}
            <input type = 'submit' name = "Request_Accept_button{$cnt}" value = '承認'>
            <input type = "hidden" name = "Request_Accept{$cnt}" value = "">

            <input type = 'submit' name = "Request_Refuse_button{$cnt}" value = '拒否'><br /><br /><br />
            <input type = "hidden" name = "Request_Refuse{$cnt}" value = "">
            <input type = "hidden" name = "requester_id{$cnt}" value = {$data['id']} >
            {*{$cnt++} *}
        {/foreach}
    {else}
        承認待ちのリクエストはありません。<br /><br /><br />
    {/if}

<form method = "POST" action = "Request_Management.php">
    承認待ちのリクエスト<br />
    {if $arr_request != array(array())}
        {foreach from = $arr_request item = $data}
            {*{$cnt++} *}
            {$data['name']}さん
            <input type = 'submit' name = 'Request_cancel_button{$cnt}' value = '申請取り消し'><br /><br /><br />
            <input type = "hidden" name = "requested_user_id{$cnt}" value = {$data['id']}>
        {/foreach}
    {else}
        申請中のリクエストはありません。<br /><br /><br />
    {/if}
</form>
</body>
</html>