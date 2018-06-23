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
<form method = "POST" action = "EditContents.php">
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

            <form method = "POST" action = "MyContribution.php">
                <p>何してるなう？？(１００文字以内)</p>
                <textarea name = 'contribution' cols = '75' rows = '10' maxlength = "100" wrap = "hard"></textarea><br />
                <input type = 'submit' name = 'contributionbutton' value = '投稿!!'>
            </form>
</body>
</html>