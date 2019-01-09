<?php
namespace app\admin\controller;    //这个空间命名规则如下：app+模块名+controller
use think\Controller;
use app\admin\model\Admin as MyAdmin;
use app\admin\controller\Base;
class Admin extends Base
{
    public function adminlist()
    {
        
        $myadmins = MyAdmin::paginate(3);
        $this->assign('myadmins',$myadmins);
        return $this->fetch('dashboard');
    }
    
    public function add()
    {
        if(request()->isPost())     //添加管理员操作
        {
            $admin = model('Admin');
            $admin->data([
                'admin'=>input('admin'),
                'password'=>md5(input('password'))
            ]);
//             $validate = Loader::validate('Admin');   //验证方法一
            $validate = validate('Admin');      //验证方法二，使用助手函数验证
            if(!$validate->check($admin))       //如果验证未通过,返回相关的错误
                return $this->error($validate->getError(),'add');   
            else
            {
                $admin->save();
                return $this->success('添加成功','adminlist');
            }
        }
        else
            return $this->fetch('add');     //跳转到添加页面
     }
     public function delete()
     {
         $id =  input('id');
         $admin  = MyAdmin::get($id);
         $admin->delete();
         return redirect(url('adminlist'));
     }
     public function modify()
     {
         if(request()->isGet())     //添加管理员操作
         {
             $id =  input('id');
             $admin = MyAdmin::get($id);
             $this->assign('myadmin',$admin);
             return $this->fetch('modify');
         }
         else
             $id = input('id');
             $admin = new Myadmin();
             $result = $admin->save([
                         'admin'=> input('admin'),
                         'password'=>md5(input('password'))
                         ],['id'=>$id]);    //直接更新方式，不需要查询
             if($result)
                 return $this->success('更新成功','adminlist');
             else 
                 return $this->error('更新失败','adminlist');
     }  
     public function logout()   //注销操作
     {
        session(null);      //清除session
        return $this->success('退出成功','login/login');
     }
}
