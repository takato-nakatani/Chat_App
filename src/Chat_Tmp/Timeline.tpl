{include file = "header.tpl" _css = "page" _js = "page"}
<html>
<head>
    <title>{$name}</title>
</head>
<body>
<div class="container">
    <h1>タイムライン</h1>
            {if $friends_contribution != NULL}
                {foreach from = $friends_contribution item = $data}
                        <div class="card bg-light mb-3" style="max-width: 50rem;">
                            <div class="card-header">
                                {$friends_data['name']}さんの投稿
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    {$cnt}.　<{$data['time']}>
                                </h4>
                                <p class="card-text">
                                    <input type = "hidden" name = "contents_id{$cnt++}" value = {$data['id']}>
                                    {$data['contents']}<br /><br />
                                </p>
                            </div>
                        </div>
                {/foreach}
            {/if}

            <form method = "POST" action = "Timeline.php">
                <p>何してるなう？？(１００文字以内)</p>
                <textarea name = 'contribution' cols = '75' rows = '10' maxlength = "100" wrap = "hard"></textarea><br />
                <input type = 'submit' class = "btn btn-large btn-primary" name = 'contributionbutton' value = '投稿!!'>
            </form>
</div>
</body>
</html>