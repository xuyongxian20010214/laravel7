<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * 用户页面 index
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * 注册 -view
     */
    public function regview()
    {
        return view('user.register');
    }

    /**
     * 登录 -view
     */
    public function loginview()
    {
        return view('user.login');
    }
}












