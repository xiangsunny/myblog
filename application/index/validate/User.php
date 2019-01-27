<?php
namespace app\index\validate;
use think\Validate;

class User extends Validate
{
    protected $rule = [
        'username|用户名' => 'require|min:5|unique:user,username',  //unique的用法：“unique：表名，字段名”，这样设置就规定了哪个字段不能重复
        'password|密码' => 'require',
    ];
}