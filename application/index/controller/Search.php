<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\console\output\Descriptor;
class Search extends Controller
{
    public function Search()
    {
        $kw = input('keyword');
//         return "搜索页面!".$kw;
        $map['title'] = ['like','%'.$kw.'%'];
        $articles = Db::table('blog_article')->where($map)->order('id')->select();
        $this->assign('articles',$articles);
//         dump($articles);
        return $this->fetch();
    }
}