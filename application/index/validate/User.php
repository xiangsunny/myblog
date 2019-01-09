<?php
namespace app\index\validate;

use think\Validate;

//验证器,除非用了require开头，否则其他验证都是可选的
class User extends Validate
{
    protected $rule = [
        'nickname'  =>  ['require','min'=>5,'token'],
        'email'     =>  ['require','email'],
        'birthday'  =>  ['dateFormat'=>'Y-m-d'],
    ];
    
}