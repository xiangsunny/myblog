<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Admin;
use app\admin\model\Article as MyArticle;
use think\Session;
use app\admin\controller\Base;
use think\Request;
class Article extends Base
{
    public function add(Request $request)
    {
        if(request()->isPost())
        {
            $article = model('Article');    //助手函数创建模型
            $admin = Admin::get(Session::get('id'));
//             $article->title = input('title');
//             $article->content = input('content');
            $file = $request->file('file');
            if($file)
            {
                $info = $file->move(ROOT_PATH.'public'.DS.'uploads');
                $savename = $info->getSaveName();
            }
            else
            {
                $savename = '';
            }
            $admin->article()->save([
                'title'     => input('title'),
                'content'   => input('content'),
                'admin'     => $admin->admin,
                'attachment' => $savename,
                'cate'      => input('cate')
            ]);  //
            return redirect(url('articlelist'));
        }
        else             
            return $this->fetch('add');
    }
    public function articlelist()
    {
        $articles = MyArticle:: paginate(10);
        $this->assign('articles',$articles);
        return $this->fetch('articlelist');
    }
    public function comment()   //文章评论
    {
        
        $comment = model('Comment');    //助手函数创建模型
        $article = MyArticle::get(1);
        $comment->content = '一对多测试';
//         $admin->comments()->save($comment);
        $article->comments()->save(['content'=>'test']);
        return '测试成功!';
    }
    public function delete()    //文章删除
    {
        $article_id = input('id');
        $article = MyArticle::get($article_id);
        $article->delete();
        return redirect(url('articlelist'));
    }
}