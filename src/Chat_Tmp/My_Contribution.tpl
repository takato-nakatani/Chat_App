{include file = "header.tpl" _css = "page" _js = "page"}
<html>
<head>
    <title>{$name}</title>
</head>
<body>
<div class="container">
    <h1>マイ投稿の編集</h1>
    <form method = "POST" action ="My_Contribution.php">
    {if $my_contribution != null}
        {foreach from = $my_contribution item = $data}
            <div class="mx_auto card bg-light mb-3" style="max-width: 50rem;">
                <div class="card-header">
                    {$cnt}
                </div>
                <div class="card-body">
                    <h2 class="card-title">
                        <{$data['time']}>
                    </h2>
                    <p class="card-text">
                        <input type = "hidden" name = "contents{$cnt}" value = {$data['contents']}>
                        <input type = "hidden" name = "contents_id{$cnt}" value = {$data['id']}>
                            <p>{$data['contents']}</p>
                        <input type = "submit" class="card-link btn btn-large btn-primary" name = "editbutton{$cnt}" value = "編集">
                        <input type = "submit" class="card-link btn btn-large btn-primary" name = "deletebutton{$cnt++}" value = "削除">
                    </p>
                </div>
            </div>
        {/foreach}
    {/if}
    </form>
    <form method = "POST" action = "My_Contribution.php">
        <p>編集後、完了ボタンを押してください。</p>
        <textarea name = 'contribution' cols = '75' rows = '10' maxlength = "500" wrap = "hard">{$before_edit}</textarea><br />
        <input type = 'submit' class = "btn btn-large btn-primary" name = 'editcompletebutton' value = '編集を完了する'>
    </form>
</div>
</body>
</html>
