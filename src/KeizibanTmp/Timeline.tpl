<html>
<head>
    <title>タイムライン {$name}</title>
</head>
<form method = "POST" action = "Timeline.php">
    <p>タイムライン</p>
    <input type = 'submit' name = 'Logoutbutton' value = "ログアウト">
</form>
<form method = "POST" action = "My_Page.php">
    <input type = 'submit' name = 'homebutton' value = 'マイページ'>
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
<form method = "POST" action = "My_Contribution.php">
    <input type = 'submit' name = 'mycontributionbutton' value = 'マイ投稿'><br /><br /><br />
</form>
<body>
            {if $friends_contribution != NULL}
                {foreach from = $friends_contribution item = $data}
                    {$cnt}.　<{$data['time']}>
                    {$data['account_id']}さんの投稿
                    <input type = "hidden" name = "contents_id{$cnt++}" value = {$data['id']}>
                    {$data['contents']}<br /><br />
                {/foreach}
            {/if}

            <form method = "POST" action = "Timeline.php">
                <p>何してるなう？？(１００文字以内)</p>
                <textarea name = 'contribution' cols = '75' rows = '10' maxlength = "100" wrap = "hard"></textarea><br />
                <input type = 'submit' name = 'contributionbutton' value = '投稿!!'>
            </form>
</body>
</html>