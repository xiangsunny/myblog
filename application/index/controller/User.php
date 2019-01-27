<?php
namespace app\index\controller;
use think\Controller;
use app\admin\model\User as MyUser;
use app\admin\model\Article as MyArticle;
use think\Session;
use think\Db;

class User extends Controller
{
    public function regist($code='')
    {
        if(request()->isPost())
        {
            $data = [
                'username'  =>  input('user'),
                'password'  =>  input('password1')
            ];
//             $validate = validate("User");   //使用助手函数实例化验证器，验证用户名是否重复
            $validate = \think\Loader::validate('User');
            if(!$validate->check($data))
                return $this->error('用户名重复','regist');
//                 return $this->getError();
            else 
            {
                $pwd1 = input('password1');
                $pwd2 = input('password2');
                if($pwd1 != $pwd2)
                    return $this->error('两次密码不正确','regist');
                else 
                {
                    $captcha= new \think\captcha\Captcha();     //验证码
                    if(!$captcha->check($code))
                        return $this->error('验证码错误','login');
                    else{
                        $username = input('user');
                        $email = input('email');
                        $user = new MyUser([        //实例化user
                            'username'  =>  $username,     //通过md5加密
                            'password'  =>  md5($pwd1),
                            'email'     =>  $email
                        ]);
                        if($user->save())       //保存user到数据库
                            return $this->success("注册成功!",'index/index');
                        else 
                            return $this->error("注册失败，请重新注册",'regist');
                    }
                }
            }
        }
        else
        {
            return $this->fetch('regist');      //get请求
        }
    }
    
    public function login($code="")
    {
        if(request()->isPost())
        {
            $username = input('username');
            $user = MyUser::get(['username'=>$username]);   //在数据库中查询username
            if($user)       //如果查询到数据
            {
                $password = input('password');
                if ($user->password == md5($password))      //密码验证成功
                {
                    $captcha= new \think\captcha\Captcha();     //验证码
                    if(!$captcha->check($code))
                        return $this->error('验证码错误','index\index');
                    //验证通过，登录成功
                    else{
                        Session::set("id",$user->id);
                        Session::set("name",$user->username);
                        $this->assign('id',$user->id);
                        return $this->success("欢迎回来",'index\index');
                    }
                }
                else {
                    return $this->error('密码输入错误','login');
                }
            }
            else    // 数据库中找不到用户
                return $this->error('没有这个用户','login');
        }
        else 
            return $this->fetch('login');
    }
    
    //退出当前账号函数
    public function logout()    
    {
        session(null);      //清除session，退出当前账号
        return $this->success('退出成功','index\index');
    }
}