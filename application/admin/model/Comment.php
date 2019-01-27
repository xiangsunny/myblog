<?php
namespace app\admin\model;
use think\Model;

class Comment extends Model
{
    protected $autoWriteTimestamp = 'timestamp';
    
//     public function admin()
//     {
//         return $this->belongsTo('admin');
//     }
//     public function user()
//     {
//         return $this->belongsTo('User');
//     }
}