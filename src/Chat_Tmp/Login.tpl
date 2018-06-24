<link rel="stylesheet" href="../css/bootstrap.min.css">
<script src="../js/bootstrap.min.js"></script>
<html>
<head>
    <meta charset="UTF-8" />
    <title>ログイン画面</title>
</head>
<body>
<div class="container">
    <h1>ログイン</h1>
    <form method = "POST" action = "Login.php">
        <label>ユーザID(半角英数字２字以上２０字以内)：</label>
        <input id = 'nametextbox' type = 'text' name = 'Loginname' size = '20' maxlength="20"><br />

        <label>パスワード(半角英数字８字以上３０字以内)：</label>
        <input id = 'passwordtextbox' type = 'password' name = 'Loginpass' size = '30' maxlength="30"><br />
            <p>{$error_msg}</p><p>{$error_msg_preg_match}</p><p>{$input_error_msg}</p>
        <input type = 'submit' class = "btn btn-large btn-primary" name = 'Loginbutton' value = 'ログイン'>
    </form>
    <form method = "POST" action = "Registration.php">
        <p>まだ新規登録されていない方は以下の＜新規登録＞ボタンより新規登録を行ってください。</p>
        <input type = 'submit' class = "btn btn-large btn-primary" name = 'NewRegistration' value = '新規登録'>
    </form>
</div>
</body>
</html>