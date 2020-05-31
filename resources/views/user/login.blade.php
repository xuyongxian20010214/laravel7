@extends('layouts.bst')
@section('content')
    <h1>登录</h1>
<form action="/user/login" method="post">
    <table border="1">
        <tr>
            <td>用户名：</td>
            <td><input type="text" name="username" placeholder="请输入用户名"></td>
        </tr>
        <tr>
            <td>密码：</td>
            <td><input type="password" name="password" placeholder="请输入密码"></td>
        </tr>
        <tr>
            <td><input type="submit" value="登录"></td>
            <td></td>
        </tr>

    </table>
</form>
@endsection
@section('footer')
    @parent
    <script src='/js/goods/goods.js'></script>
@endsection