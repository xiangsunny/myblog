<?php
namespace app\index\validate;
use think\Validate;

class Comment extends Validate
{
    protected $rule=[
        'content'   =>  'require',
    ];
}