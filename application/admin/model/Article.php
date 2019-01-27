<?php
namespace app\admin\model;

use think\Model;

class Article extends Model
{
//     protected $autoWriteTimestamp = 'datetime'; //规定保存的时间格式，建议以时间戳来保存时间，优点是灵活
//     protected $table = "blog_article";
    public function comments()
    {
       return $this->hasMany('Comment');
//         return $this->morphMany('Comment');
    }
    
    
}