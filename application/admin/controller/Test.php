<?php
namespace app\admin\controller;
use app\admin\model\Article as MyArticle;
use think\Db;
use app\admin\model\Datecate as MyDatecate;

class Test extends \think\Controller
{
    public function test()
    {
        //         $cts = Db::table('blog_article')->column('create_time');
        $timecate = date('Y-m',strtotime(MyArticle::get(['title'=>'爬虫'])->create_time));
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
        }
        //         dump($timecate);
        echo $timecate;
        //         echo $timecate;
    }
}