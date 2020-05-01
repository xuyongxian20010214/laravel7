<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录</title>
</head>
<body>
<h1>登录</h1>
<form action="/user/login" method="post">
    <table border="1">
        <tr>
            <td>用户名：</td>
            <td><input type="text" name="username" placeholder="请输入用户名"></td>
        </tr>
        <tr>
            <td>密码：</td>
            <td><input type="password" name="pwd1" placeholder="请输入密码"></td>
        </tr>
        <tr>
            <td><input type="submit" value="登录"></td>
            <td></td>
        </tr>

    </table>
</form>
</body>
</html>