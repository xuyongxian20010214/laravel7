@extends('layouts.bst')
@section('content')
    <title>个人中心</title>
    <h1>欢迎来到个人中心</h1>
    @foreach($data as $k=>$v)
        用户名：{{$v->username}} </br>
        手机号：{{$v->phone}}
    @endforeach
    <hr>
    <img src="/img/about.jpg"width="50%">
@endsection
@section('footer')
    @parent
    <script src="/js/goods/goods.js"></script>
@endsection