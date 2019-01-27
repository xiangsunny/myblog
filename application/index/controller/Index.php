<?php
namespace app\index\controller;
use think\Controller;
use app\admin\model\Article as MyArticle;

class Index	extends Controller
{
    public function index()
    {
        $q = input('q');
        if($q)    
        {
            $articles = MyArticle::where('cate',$q)->paginate(10);  
//             return $articles->content;
        }
        else
            $articles = MyArticle::paginate(10);
        
        $this->assign('articles',$articles);
        return $this->fetch();
    }
    
}