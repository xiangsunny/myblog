<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Admin as MyAdmin;
use think\Request;

class Login extends Controller
{
    public function Login(Request $request)    
    { 
        return $this->fetch('login');        
    }
    public function check(Request $request)
    {
        if(true !== $this->validate($request->param(),[
            'code|验证码'  => 'require|captcha'
        ])){
            return $this->error('验证码错误');
        }else 
            $admin = input('admin');
            $password = input('password');
            $res = MyAdmin::indentify($admin, $password);
            if($res == '0' )
            {
                return $this->error('用户不存在!','login');
               
            }
            elseif($res=='2')
                return $this->error('密码错误!','login');
            else 
            {
                session('name',$admin);
                session('id',$res->id);
                return $this->success('验证码正确，欢迎回来','admin/adminlist');
            }    
//             $result = MyAdmin::get(['admin'=>$admin]);
//             if(!$result)
//                 return $this->error('用户不存在!','login');
//             if(md5(input('password'))!=$result->password)
//                 return $this->error('密码错误!','login');
//             session('name',$admin);     //通过助手函数来设置session
//             session('id',$result->id);
//             return $this->success('验证码正确，欢迎回来','admin/adminlist');                                       
    }
}

