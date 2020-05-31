@extends('layouts.bst')
@section('content')
    <h1>注册</h1>
    <form action="/user/register" method="post">
        {{csrf_field()}}
        <table border="1">
            <tr>
                <td>用户名：</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>邮箱：</td>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
                <td>密码：</td>
                <td><input type="password" name="pwd1"></td>
            </tr>
            <tr>
                <td>确认密码：</td>
                <td><input type="password" name="pwd2"></td>
            </tr>
            <tr>
                <td>手机号：</td>
                <td><input type="tel" name="phone"></td>
            </tr>
            <tr>
                <td><input type="submit" value="提交"></td>
                <td></td>
            </tr>

        </table>
    </form>
@endsection
@section('footer')
    @parent
    <script src='/js/goods/goods.js'></script>
@endsection