<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:66:"F:\tp5\tp5.0\public/../application/admin\view\admin\dashboard.html";i:1546351093;s:54:"F:\tp5\tp5.0\application\admin\view\common\header.html";i:1546507171;s:52:"F:\tp5\tp5.0\application\admin\view\common\left.html";i:1546951727;}*/ ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>后台页面</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/static/admin/css/dashboard.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo \think\Request::instance()->session('name'); ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="<?php echo url('admin/logout'); ?>">注销</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        		<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="<?php echo url('admin/adminlist'); ?>">操作员列表 <span class="sr-only">(current)</span></a></li>
            <li><a href="<?php echo url('admin/add'); ?>">添加管理员</a></li>
            <li><a href="<?php echo url('article/add'); ?>">添加文章</a></li>
            <li><a href="<?php echo url('article/articlelist'); ?>" >文章列表</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">暂留</a></li>
            <li><a href="">暂留</a></li>
            <li><a href="">暂留</a></li>
            <li><a href="">暂留</a></li>
            <li><a href="">暂留</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">暂留</a></li>
            <li><a href="">暂留</a></li>
            <li><a href="">暂留</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>id</th>
                  <th>操作员名称</th>
                  <th>header</th>
                  <th>header</th>
                  <th>header</th>
                </tr>
              </thead>
              <tbody>              
              <?php if(is_array($myadmins) || $myadmins instanceof \think\Collection || $myadmins instanceof \think\Paginator): $i = 0; $__LIST__ = $myadmins;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$myadmin): $mod = ($i % 2 );++$i;?>
                <tr>
                  <td><?php echo $myadmin['id']; ?></td>
                  <td><?php echo $myadmin['admin']; ?></td>
                  <td>暂留</td>
                  <td>
                  <form action="<?php echo url('admin/modify'); ?>">
                  		<input name='id' value=<?php echo $myadmin['id']; ?> class='hidden'>
                  		<button>修改</button>
                  	</form>
				  </td>                  
                  <td>
  					<?php if($myadmin['id'] != 1): ?>    					          
                  	<form action="<?php echo url('admin/delete'); ?>">
                  		<input name='id' value=<?php echo $myadmin['id']; ?> class='hidden'>
                  		<button>删除</button>
                  	</form>
					<?php endif; ?>
                  </td>
                  
                </tr>
              <?php endforeach; endif; else: echo "" ;endif; ?>
              <?php echo $myadmins->render(); ?>
              </tbody>           
            </table>          
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
