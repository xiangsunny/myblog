<?php
namespace app\admin\validate;
use think\Validate;

class Admin extends Validate
{
    protected $rule = [
        'admin|用户名' => 'require|min:5|unique:admin,admin',  //unique的用法：“unique：表名，字段名”，这样设置就规定了哪个字段不能重复
        'password|密码' => 'require',
    ];
}