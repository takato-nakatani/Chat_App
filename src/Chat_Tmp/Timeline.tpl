{include file = "header.tpl" _css = "page" _js = "page"}
<html>
<head>
    <title>タイムライン {$name}</title>
</head>
<p>タイムライン</p>
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