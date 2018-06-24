{include file = "header.tpl" _css = "page" _js = "page"}
<html>
<head>
    <title>{$name}</title>
</head>
<body>
<div class="container">
    <h1>友達リクエストを管理</h1>
    <form method = "POST" action = "Request_Management.php">
        <div class="mx-auto text-right card bg-light mb-3" style="max-width: 50rem;">
            <div class="text-left card-header">
                申請されているリクエスト
            </div>
            <div class="text-center card-body">
                <p class="card-text">
                    {if $arr_requested != array(array())}
                        {foreach from = $arr_requested item = $data}
                            {$data['name']}さん
                            {$data['id']}
                            <input type = 'submit' class = "btn btn-large btn-primary" name = "Request_Accept_button{$cnt}" value = '承認'>
                            <input type = "hidden" name = "Request_Accept{$cnt}" value = "">

                            <input type = 'submit' class = "btn btn-large btn-primary" name = "Request_Refuse_button{$cnt}" value = '拒否'><br /><br /><br />
                            <input type = "hidden" name = "Request_Refuse{$cnt}" value = "">
                            <input type = "hidden" name = "requester_id{$cnt}" value = {$data['id']} >
                            {*{$cnt++} *}
                        {/foreach}
                    {else}
                        承認待ちのリクエストはありません。<br /><br /><br />
                    {/if}
                </p>
            </div>
        </div>
    </form>
    <form method = "POST" action = "Request_Management.php">
        <div class="mx-auto card bg-light mb-3" style="max-width: 50rem;">
            <div class="text-left card-header">
                承認待ちのリクエスト
            </div>
            <div class="text-center card-body">
                <p class="card-text">
                    {if $arr_request != array(array())}
                        {foreach from = $arr_request item = $data}
                            {$data['name']}さん
                            <input type = 'submit' class = "btn btn-large btn-primary" name = 'Request_cancel_button{$cnt}' value = '申請取り消し'><br /><br /><br />
                            <input type = "hidden" name = "requested_user_id{$cnt++}" value = {$data['id']}>
                        {/foreach}
                    {else}
                        申請中のリクエストはありません。<br /><br /><br />
                    {/if}
                </p>
            </div>
        </div>
    </form>
</div>
</body>
</html>