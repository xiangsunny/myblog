<?php
namespace app\index\controller;
use think\Controller;
use app\admin\model\Article as MyArticle;
use app\admin\model\Comment as MyComment;
use think\Db;
class Article extends Controller
{
    public function article()
    {
        //取出所有评论，并分页，每页10条
//         $comments = MyComment:: paginate(10);
        //取出所有评论，不分页
        $comments = Db::table('blog_comment')->where('article_id',input('parm'))->select();
        $this->assign('comments',$comments); 
        
        if(!request()->ispost())
        {    
            $article_id = input('parm');
            $article = MyArticle::get($article_id);
            $this->assign('article',$article);
                      
            return $this->fetch();
        }
        else 
        {
            $article_id = input('articleid');
            $comment = input('comment');
            $article = MyArticle::get($article_id);
            $article->comments()->save([
                'content'   =>  $comment,
                'admin'     =>  $article->admin
                ]
            );
//             $comment = new MyComment(
//                 [
//                     'content'   =>  input('comment'),
//                     'admin'     =>  $article->admin,
//                     'article_id'=>  $article->id
//                 ]); 
// //             $comment->content = input('comment');
// //             $comment->admin = $article->admin;
// //             $comment->article_id = $article->id;
//             $comment->save();
//             return 'hello';
            $this->assign('article',$article);
            return $this->fetch('article');
        }
    }
    
}