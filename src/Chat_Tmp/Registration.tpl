<html>
<head>
    <meta charset="UTF-8" />
    <title>アカウント登録画面</title>
</head>
<body>
<form method = "POST" action = "Registration.php">

    <p>以下のフォームに従って＜ユーザ名＞と＜パスワード＞を設定してください</p>
    <label>ユーザ名：</label>
    <input id = 'username' type = 'text' name = 'username' size = '30' maxlength="20"><br />

    <label>ユーザID(半角英数字２字以上２０字以内)：</label>
    <input id = 'userid' type = 'text' name = 'userid' size = '30' maxlength="20"><br /

    <label>パスワード(半角英数字８字以上３０字以内)：</label>
    <input id = 'userpass' type = 'password' name = 'userpass' size = '30' maxlength="30"><br />
    <input type = 'submit' name = 'Registrationbutton' value = '登録'>

</form>
<form method = "POST" action = "Login.php">
    <input type = "submit" name = "backtoLogin" value = "ログイン画面に戻る">
</form>
</body>
</html>