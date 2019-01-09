<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
/*    '__pattern__' => [
        'name' => '\w+',
    ],
*/
    '__pattern__' => [
        'id'=>'\d+',
    ],  
    'user/index' => 'index/user/index',
    'user/create' => 'index/user/create',
    'user/add' => 'index/user/add',
    'user/add_list' => 'index/user/addlist',
    'user/update/:id' => 'index/user/update',
    'user/delete/:id' => 'index/user/delete',
    'user/:id' => 'index/user/read',
    'user/test' => 'index/user/test',
//为Test.php控制器注册路由    
    
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
    
//	'hello/[:name]' => 'index/hello',

];
