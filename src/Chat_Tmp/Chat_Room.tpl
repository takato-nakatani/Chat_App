{include file = "header.tpl" _css = "page" _js = "page"}
<html>
<head>
    <title>チャット {$name}</title>
</head>
<body>
<div class="container">
<form method = "POST" action = "Chat_Room.php">
    <h1>{$friend_account_data['name']}さん</h1>
    {if $chat_data != array(array())}
        {foreach from = $chat_data item = $chat}
                {if $chat['sender_id'] == $login_user}
                    <div class="mx-auto text-right card bg-light mb-3" style="max-width: 50rem;">
                        <div class="card-header">
                            <{$chat['time']}>
                            <input type = "submit" class = "card-link btn btn-large btn-primary" name = "delete_button{$cnt}" value = "削除">
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <input type = "hidden" name = "friends_pair_id{$cnt++}" value = {$chat['id']}>
                                <p>{$chat['contents']}</p>
                            </p>
                        </div>
                    </div>
                {else}
                    <div class="mx-auto text-left card bg-light mb-3" style="max-width: 50rem;">
                        <div class="card-header">
                            <{$chat['time']}>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                            <p>{$chat['contents']}</p>
                        </p>
                        </div>
                    </div>
                {/if}
        {/foreach}
    {/if}
    <div class="mx-auto text-right form-group" style="max-width: 50rem;">
        <input class = "form-control mb-3" type="text" name = "chat_input" maxlength = "300">
        <input type = "submit" class = "btn btn-large btn-primary" name = "chat_send_button" value = "送信">
    </div>
</form>
</div>
</body>
</html>
