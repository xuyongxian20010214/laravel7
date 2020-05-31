<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\UserModel;
use http\Client\Curl\User;
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

    /**
     * 注册 业务逻辑
     */
    public function reg(Request $request)
    {
        $username = $request->input('username');
        $email = $request->input('email');
        $pwd1 = $request->input('pwd1');
        $pwd2 = $request->input('pwd2');
        $phone = $request->input('phone');

        //验证非空
        if(empty($username)){
            die('用户名不能为空');
        }
        if(empty($email)){
            die('邮箱不能为空');
        }
        if(empty($pwd1)){
            die('密码不能为空');
        }
        if(empty($pwd2)){
            die('确认密码不能为空');
        }
        if($pwd1!==$pwd2){
            die('两次输入的密码不一致，请重新输入');
        }
        if(empty($phone)){
            die('手机号不能为空');
        }

        $username_info = UserModel::where(['username'=>$username])->first();
        if($username_info){
            echo '该用户名已存在';
            header('Refresh:1;url=/user/register');
            exit;
        }
        $email = UserModel::where(['email'=>$email])->first();
        if ($email){
            echo '该邮箱已存在';
            header('Refresh:1;url=/user/register');
            exit;
        }

        $phone_info = UserModel::where(['phone'=>$phone])->first();
        if ($phone_info){
            echo '该手机号已存在';
            header('Refresh:1;url=/user/register');
            exit;
        }

        $password = password_hash($pwd1,PASSWORD_BCRYPT);
        $data = [
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'phone' => $phone,
        ];

        $res = UserModel::insertGetId($data);
        echo 'UID:'.$res;echo '</br>';
        echo '注册成功,正在跳转......';
        header('Refresh:1;url=/user/center');
    }

    /**
     * 登录 业务逻辑
     * @param Request $request
     */
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        //验证非空
        if(empty($username)){
            echo '用户名不能为空';
            header('Refresh:2;url=/user/login');die;
        }
        if(empty($password)){
            echo '密码不能为空';
            header('Refresh:2;url=/user/login');die;
        }

        $user = UserModel::where(['username'=>$username])->first();
        if ($user){
            if(password_verify($password,$user->password)){
                $token = substr(md5(time().mt_rand(1,99999)),10,10);
                setcookie('uid',$user->uid,time()+86400,'/','',false,true);
                setcookie('token',$token,time()+86400,'/user','',false,true);
                $request->session()->put('uid',$user->uid);
                $request->session()->put('token',$token);
                echo '登录成功';
                header("Refresh:1;url=/user/center");
            }else{
                echo '密码不正确';
                header("Refresh:1;url=/user/login");exit;
            }
        }else{
            echo '用户不存在';
            header("Refresh:1;url=/user/login");
        }
    }

    /**
     * 个人中心-展示页面
     */
    public function center(Request $request)
    {
        $user = UserModel::all();
        $data=[
            'data' => $user,
        ];
        return view('user.center',$data);
    }

    /**
     * 退出 quit
     */
    public function quit()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Refresh:1;url=/user/login');
    }
}














