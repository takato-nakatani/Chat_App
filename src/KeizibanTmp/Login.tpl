<html>
<head>
    <meta charset="UTF-8" />
    <title>ログイン画面</title>
</head>
<body>
<form method = "POST" action = "Login.php">
    <p>掲示板</p>
    <label>ユーザ名(半角英数字２字以上２０字以内)：</label>
    <input id = 'nametextbox' type = 'text' name = 'Loginname' size = '20' maxlength="20"><br />

    <label>パスワード(半角英数字８字以上３０字以内)：</label>
    <input id = 'passwordtextbox' type = 'password' name = 'Loginpass' size = '30' maxlength="30"><br />

    <input type = 'submit' name = 'Loginbutton' value = 'ログイン'>
</form>
<form method = "POST" action = "Registration.php">
    <p>まだ新規登録されていない方は以下の＜新規登録＞ボタンより新規登録を行ってください。</p>
    <input type = 'submit' name = 'NewRegistration' value = '新規登録'>
</form>
</body>
</html>