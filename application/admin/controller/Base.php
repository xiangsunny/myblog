<?php
namespace app\admin\controller;
use think\Controller;

class Base extends Controller
{
    public function _initialize()
    {
        if(!session('name'))
        {
            return $this->error('请先登录','login/login');
        }
        
    }
    
}