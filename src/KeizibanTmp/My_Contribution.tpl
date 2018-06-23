<html>
<head>
    <title>{$name}の投稿文</title>
</head>
<form method = "POST" action = "My_Contribution.php">
    <input type = 'submit' name = 'Logoutbutton' value = 'ログアウト'>
</form>
<form method = "POST" action = "My_Page.php">
    <input type = 'submit' name = 'backtomypagebutton' value = 'マイページに戻る'>
</form>
<body>

<form method = "POST" action ="My_Contribution.php">
{if $my_contribution != null}
    {foreach from = $my_contribution item = $data}
            {$cnt++}.　<{$data['time']}>
            <input type = "hidden" name = "contents{$cnt}" value = {$data['contents']}>
            <input type = "hidden" name = "contents_id{$cnt}" value = {$data['id']}>
            <input type = "submit" name = "editbutton{$cnt}" value = "編集">
            <input type = "submit" name = "deletebutton{$cnt}" value = "削除">
            {$data['contents']}<br /><br />
    {/foreach}
{/if}
</form>
<form method = "POST" action = "My_Contribution.php">
    <p>編集後、完了ボタンを押してください。</p>
    <textarea name = 'contribution' cols = '75' rows = '10' maxlength = "500" wrap = "hard">{$before_edit}</textarea><br />
    <input type = 'submit' name = 'editcompletebutton' value = '編集を完了する'>
</form>
</body>
</html>
