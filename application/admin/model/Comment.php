<?php
namespace app\admin\model;
use think\Model;

class Comment extends Model
{
    protected $autoWriteTimestamp = 'datetime';
    
//     public function admin()
//     {
//         return $this->belongsTo('admin');
//     }
}