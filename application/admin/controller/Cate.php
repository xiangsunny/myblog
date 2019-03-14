<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Cate as MyCate;

class Cate extends Controller
{
    //显示标签
    public function Cate()
    {
        $cates = MyCate::all();
        $this->assign('cates',$cates);
        return $this->fetch();        

    }
    //添加标签
    public function add()
    {
        $cate = new MyCate;
        $cate->cate = input('cate');
        if($cate->save())
        {
            return '标签添加成功';
        }
        else 
            return '标签添加失败';
    }
}