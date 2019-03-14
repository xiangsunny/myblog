<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Admin;
use app\admin\model\Article as MyArticle;
use app\admin\model\Datecate as MyDatecate;
use app\admin\model\Comment as MyComment;
use think\Session;
use app\admin\controller\Base;
use think\Request;
use app\admin\model\Cate as MyCate;
class Article extends Base
{
    public function add(Request $request)
    {
        if(request()->isPost())
        {
            //             $article = model('Article');    //助手函数创建模型
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
            ]);
            //更新datecate这个表
            $timecate = date('Y-m',strtotime(MyArticle::get(['title'=>input('title')])->create_time));
            $temp = MyDatecate::get(['timecate'=>$timecate]);
            if($temp)        //如果存在就更新
            {
                $num = $temp->num + 1;
                $temp->where('id',$temp->id)->update(['num'=>$num]);
            }
            else {      //没有就写入
                $datecate = new MyDatecate([
                    'timecate'=>$timecate,
                    'num'   => 1
                ]);
                $datecate->save();
                $temp = MyDatecate::get(['timecate'=>$timecate]);
            }
            
            MyArticle::where('title',input('title'))->update(['dateid'=>$temp->id]);
            
            return redirect(url('articlelist'));
        }
        else
            
            $cates = MyCate::all();
            $this->assign('cates',$cates);
            return $this->fetch('add');
    }
    public function articlelist()
    {
        $articles = MyArticle:: paginate(10);
        $this->assign('articles',$articles);
        
        return $this->fetch('articlelist');
    }
    //     public function comment()   //文章评论
    //     {
    
    //         $comment = model('Comment');    //助手函数创建模型
    //         $article = MyArticle::get(1);
    //         $comment->content = '一对多测试';
    // //         $admin->comments()->save($comment);
    //         $article->comments()->save(['content'=>'test']);
    //         return '测试成功!';
    //     }
    public function delete()    //文章删除
    {
        $article_id = input('id');
        $article = MyArticle::get($article_id);
        $article->delete();
        MyComment::where('article_id','=',$article_id)->delete();       //删除相关文章的评论
        $datecate = MyDatecate::get([$article->dateid]);
        //         $datecate = MyDatecate::get();
        $num = $datecate->num - 1;
        $datecate->where('id',$datecate->id)->update(['num'=>$num]);  //更新月份的文章数量
        return redirect(url('articlelist'));
    }
    
    public function modify()    //文章修改
    {
        $article_id = input('id');
        if(request()->isPost())
        {
            $title = input('title');
            $content = input('content');
            MyArticle::where('id',$article_id)->update(['title'=>$title,'content'=>$content]);
            return redirect('articlelist');
        }
        else{
            $article = MyArticle::get($article_id);
            $cates = MyCate::all();
            $this->assign('article',$article);
            $this->assign('cates',$cates);
            return $this->fetch('modify');
        }
    }
}