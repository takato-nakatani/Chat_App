<html>
<head>
    <title>掲示版3 {$name}</title>
</head>
<form method = "POST" action = "MyContribution.php">
    <p>タイムライン</p>
    <input type = 'submit' name = 'Logoutbutton' value = "ログアウト">
</form>
<form method = "POST" action = "Keiziban3.php">
    <input type = 'submit' name = 'homebutton' value = 'マイページ'><br /><br /><br />
</form>
<body>
            {if $fetchAll != NULL}
                {foreach from = $fetchAll item = $data}
                    {$cnt++}.　<{$data['time']}>

                    <form method = "POST" action = "MyContribution.php">
                        {if $data['user_id'] == $login_user_id}
                            <input type = "submit" name = "editbutton{$cnt}" value = "編集">
                            <input type = "submit" name = "deletebutton{$cnt}" value = "削除">
                        {else}
                            {$data['account_id']}さんの投稿
                        {/if}
                        <input type = "hidden" name = "contents_id{$cnt}" value = {$data['id']}>
                    </form>
                    {$data['contents']|e}<br /><br />



                {/foreach}
            {/if}

            <form method = "POST" action = "MyContribution.php">
                <p>何してるなう？？(１００文字以内)</p>
                <textarea name = 'contribution' cols = '75' rows = '10' maxlength = "500" wrap = "hard"></textarea><br />
                <input type = 'submit' name = 'contributionbutton' value = '投稿!!'>
            </form>
</body>
</html>