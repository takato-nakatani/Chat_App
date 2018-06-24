{include file = "header.tpl" _css = "page" _js = "page"}
<html>
<head>
    <title>友達一覧 {$name}</title>
</head>
<p>友達リスト</p>
<body>
    {if $friends_list != array(array())}
        {foreach from = $friends_list item = $friend_data}
                <form method = "POST" action = "Chat_List.php">
                    <input type = "submit" name = "chat_button{$cnt}" value = {$friend_data['name']}>
                    <input type = "hidden" name = "friend_pair_id{$cnt}" value = {$friend_data['id']}>
                    <input type = "hidden" name = "friend_name{$cnt++}" value = {$friend_data['name']}>
                </form>
        {/foreach}
    {/if}
</body>
</html>