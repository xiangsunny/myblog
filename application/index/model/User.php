<?php
namespace app\index\model;

use think\Model;

class User extends Model
{
    //设置完整的数据表
    protected $table = 'tp_user';
    
    protected $connection = [
        'type'  =>  'mysql',
        'hostname'  =>  '127.0.0.1',
        'database'  =>  'tp_demo',
        'username'  =>  'root',
        'password'  =>  '',
        'hostport'  =>  '3308',
        'params'    =>  [],
        'charset'   =>  'utf8',
        'profix'    =>  'tp_',
        'debug'     =>  true,
    
    ];
    //读取器
    protected function getBirthdayAttr($birthday)
    {
        return date('Y-m-d',$birthday);
    }
    //修改器
    protected function setBirthdayAttr($value)
    {
        return strtotime($value);
    }
    //自动写入时间戳
    protected $autoWriteTimestamp = true;   
/*  这段代码可以替代以上的修改器和读取器
 *  protected $dateFormat = 'Y/m/d';
 *  protected $type =   [
 *          $birthday   =>  'timestamp',
 *          ];
 */
    public function profile()
    {
        return $this->hasOne('Profile');
    }
    
}
