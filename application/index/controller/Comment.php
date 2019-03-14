<?php
namespace app\index\controller;
use think\Controller;
use app\index\controller\Base;
use app\admin\model\Article as MyArticle;
use think\Session;
use app\admin\model\Comment as MyComment;
use app\admin\model\Datecate as MyDatecate;

class Comment extends Controller
{
    public function index()
    {
        $article_id = input('articleid');
        $article = MyArticle::get($article_id);
        $comments = $article->comments;     //得到article对应的全部评论，格式是Comment实例
        $this->assign('comments',$comments);
        $datecates = MyDatecate::all();
        $this->assign('article',$article);
        $this->assign('datecates',$datecates);
        return $this->fetch('comment');
    }
    //评论列表
    public function commentlist()
    {
        $article_id = input('articleid');
        $article = MyArticle::get($article_id);
        $this->assign('article',$article);
        $click = $article->click + 1;
        MyArticle::update(['id'=>$article_id,'click'=>$click]);
//         $comments = Db::table('blog_comment')->where('article_id',$article_id)->order('create_time')->select(); //通过这种方式得到数组
        $comments = $article->comments;     //得到article对应的全部评论，格式是Comment实例
        $this->assign('comments',$comments);
        $datecates = MyDatecate::all();
        $this->assign('datecates',$datecates);
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
            ]);
            //数据写入成功
            if($res)
            {
                $article_id = input('articleid');
                $article = MyArticle::get($article_id);
                $this->assign('article',$article);
//                 $comments = Db::table('blog_comment')->where('article_id',$article_id)->order('create_time')->select();  //这个方法查询得到的是数组
                $comments = $article->comments;     //得到article下所有的comments
                $this->assign('comments',$comments);
                return redirect('index',array('articleid'=>$article_id));
            }
            else 
                return "数据写入失败";
        }
        //用户未登录则返回登录页面
        else 
            return $this->error('请先登录','user/login');
    }
    //删除评论操作(还可以在服务器验证是否是正确用户传过来的删除命令，防止恶意攻击)
    public function delete()    
    {
        $comment_id = input('comment_id');
        $article_id = input('article_id');
        MyComment::destroy($comment_id);
        return $this->redirect('commentlist',array('articleid'=>$article_id));  //redirect重定向:redirect('方法名',array(参数1，...))
    }
}
