{include file = "header.tpl" _css = "page" _js = "page"}
<html>
<head>
    <title>友達を検索 {$name}</title>
</head>
<body>
<div class="container">
    <h1>友達を検索</h1>
    <form method = "POST" action = "Friends_Search.php">
        検索したい友達のユーザIDを入力してください。
        <div class=" text-right form-group" style="max-width: 50rem;">
            <input id = 'search_id' class = "form-control mb-3" type="text" name = "input_friends_id" size = '30' maxlength = "20">
            <input type = 'submit' class = "btn btn-large btn-primary" name = 'search_button' value = '検索'>
        </div>
    </form>
    {if $searched_user_data != null}
        {if $request_info[0]['friends_request_flg'] != 1 AND $requested_info[0]['friends_request_flg'] != 1}
            <div class="text-center card bg-light mb-3" style="max-width: 50rem;">
                <div class="card-body">
                    <p class="card-text">
                        {$searched_user_data['name']}
                        <form method = "POST" action = "Friends_Search.php">
                            <input type = "submit" class = "btn btn-large btn-primary" name = "request_button" value = "友達リクエスト">
                            <input type = "hidden" name = "requested_user_id" value = {$searched_user_data['id']}>
                        </form>
                    </p>
                </div>
            </div>
            {/if}
    {/if}
</div>
</body>
</html>