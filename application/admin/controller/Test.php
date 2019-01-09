<?php
namespace app\admin\controller;
use app\admin\model\Article as MyArticle;

class Test extends \think\Controller
{
    public function test()
    {
        //排序取出所有元素
        $article =  \app\admin\model\Article::all(function($query){
            $query->order('id','desc');
        });
//         $article = MyArticle::get(1);
        $addr = $article[0]->attachment;
        $this->assign('addr',$addr);
        return $this->fetch();
    }
}