{include file = "header.tpl" _css = "page" _js = "page"}
<html>

<head>
    <title>{$name}</title>
</head>
<body>
<div class="container">
    <h1>友達リスト</h1>
    {if $friends_list != array(array())}
        {foreach from = $friends_list item = $friend_data}
                <form method = "POST" action = "Chat_List.php">
                    <div class="col-sm-6">
                        <input type = "submit" class="col-sm-6 btn btn-large btn-success" name = "chat_button{$cnt}" value = {$friend_data['name']}>
                        <input type = "hidden" name = "friend_pair_id{$cnt}" value = {$friend_data['id']}>
                        <input type = "hidden" name = "friend_name{$cnt++}" value = {$friend_data['name']}>
                    </div>

                </form>
        {/foreach}
    {/if}
</div>
</body>
</html>