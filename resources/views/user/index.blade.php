@extends('layouts.bst')
@section('content')
    请先<a href="/user/login">登录</a>
    去<a href="/user/register">注册</a>
@endsection
@section('footer')
    @parent
    <script src='/js/goods/goods.js')></script>
@endsection