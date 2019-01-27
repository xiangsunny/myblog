<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use app\admin\model\Article as MyArticle;
use think\Session;

class Comment extends Controller
{
    
    public function commentlist()
    {
        $article_id = input('articleid');
        $article = MyArticle::get($article_id);
        $this->assign('article',$article);

        $comments = Db::table('blog_comment')->where('article_id',$article_id)->order('create_time')->select();
        $this->assign('comments',$comments);

        return $this->fetch('comment');
    }
    public function addcomment()
    {
        //用户登录判断,已登录则可以发表评论
        if(Session::get('id'))
        {
            $article_id = input('articleid');
            $comment = input('comment');
            $user_id = Session::get('id');
            $article = MyArticle::get($article_id);
            
            $validate = validate('Comment');    //使用助手函数来验证输入内容是否为空
            if(!$validate->check(['content'=>$comment]))
                return $this->error('评论内容不能为空','index\index');
            
            $res = $article->comments()->save([
                'content'   =>  $comment,
                'user_id'   =>  $user_id,
                'user_name' =>  Session::get('name'),
            ]);
            //数据写入成功
            if($res)
            {
                $article_id = input('articleid');
                $article = MyArticle::get($article_id);
                $this->assign('article',$article);
                
                $comments = Db::table('blog_comment')->where('article_id',$article_id)->order('create_time')->select();
                $this->assign('comments',$comments);
                return $this->fetch('comment/comment');

            }
            else 
                return "数据写入失败";
        }
        //用户未登录则返回登录页面
        else 
            return $this->error('请先登录','user/login');
    }
}
