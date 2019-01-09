<?php
namespace app\admin\model;
use think\Model;

class Admin extends Model
{   
    protected $autoWriteTimestamp = 'datetime';
    
    public function article()
    {
         return $this->hasMany('Article');
    }
    public static function indentify($name,$password)    //验证登录信息，正确返回1，密码不对返回2，没有用户返回0
    {
        $admin = Admin::get(['admin'=>$name]);
        if($admin)
        {
            if($admin->password == md5($password))
                return $admin;
            else 
                return 2;
        }
        else 
            return 0;
    }
    
}