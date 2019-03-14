<?php
namespace app\index\controller;
use think\Controller;
use app\admin\model\Article as MyArticle;
use app\admin\model\Cate as MyCate;
use app\admin\model\Datecate as MyDatecate;

class Index	extends Controller
{
    public function index()
    {
        $q = input('q');
        if($q)    
        {
            $articles = MyArticle::where('cate',$q)->paginate(10);  
        }
        else
            $articles = MyArticle::paginate(10);        //分页功能
        
        $cates = MyCate::all();
        $datecates = MyDatecate::all();
        $this->assign('cates',$cates);
        $this->assign('datecates',$datecates);
        $this->assign('articles',$articles);
        return $this->fetch();
    }
    
    public function datecate()
    {
        $id = input('dateid');

        $articles = MyArticle::get(['dateid'=>$id])->paginate(10);
        $cates = MyCate::all();
        $datecates = MyDatecate::all();
        $this->assign('cates',$cates);
        $this->assign('datecates',$datecates);
        $this->assign('articles',$articles);
        return $this->fetch('index');
//         echo $id;
    }
    
    public function hello($name='world')
    {
//         \think\Log::record('log信息测试，这是调试,分开测试','debug');  //单独生成调试文件的日志
        \think\Log::debug('Think.server.script_name');
        return 'hello,'.$name;
    }
    
}