<?php
namespace app\index\controller;
use think\Controller;
use app\admin\model\Article as MyArticle;

class Index	extends Controller
{
    public function index()
    {
//         return '主页';
        $articles = MyArticle::paginate(10);
        $this->assign('articles',$articles);
		return $this->fetch();
    }
}