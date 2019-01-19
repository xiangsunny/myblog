<?php
namespace app\index\model;
use think\Model;

class Profile extends Model
{
    protected $type = [
        'birthday'  =>  'timestamp:Y-m-d',
    ];
    
}