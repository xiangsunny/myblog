<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:69:"F:\tp5\tp50\public/../application/admin\view\article\articlelist.html";i:1546783161;s:53:"F:\tp5\tp50\application\admin\view\common\header.html";i:1546507171;s:51:"F:\tp5\tp50\application\admin\view\common\left.html";i:1546951727;}*/ ?>
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
                  <th>文章名称</th>
                  <th>作者</th>
                  <th>创作时间</th>
                  <th>更新时间</th>
                  <th>类型</th>
                  <th>header</th>
                  <th>header</th>
                </tr>
              </thead>
              <tbody>              
              <?php if(is_array($articles) || $articles instanceof \think\Collection || $articles instanceof \think\Paginator): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?>
                <tr>
                  <td><?php echo $article['id']; ?></td>
                  <td><?php echo $article['title']; ?></td>
                  <td><?php echo $article['admin']; ?></td>
                  <td><?php echo $article['create_time']; ?></td>
                  <td><?php echo $article['update_time']; ?></td>
                  <td>类型</td>
                  <td>
                  <form action="<?php echo url('article/modify'); ?>">
                  		<input name='id' value=<?php echo $article['id']; ?> class='hidden'>
                  		<button>修改</button>
                  	</form>
				  </td>                  
                  <td>    					          
                  	<form action="<?php echo url('article/delete'); ?>">
                  		<input name='id' value=<?php echo $article['id']; ?> class='hidden'>
                  		<button>删除</button>
                  	</form>
					
                  </td>
                  
                </tr>
              <?php endforeach; endif; else: echo "" ;endif; ?>
              <?php echo $articles->render(); ?>
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
