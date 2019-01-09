<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:63:"F:\tp5\tp5.0\public/../application/admin\view\admin\modify.html";i:1546335842;s:53:"F:\tp5\tp5.0\application\admin\view\admin\header.html";i:1546342697;s:51:"F:\tp5\tp5.0\application\admin\view\admin\left.html";i:1546335319;}*/ ?>
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
            <li><a href="<?php echo url('logout'); ?>">注销</a></li>
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
            <li class="active"><a href="<?php echo url('admin'); ?>">操作员列表 <span class="sr-only">(current)</span></a></li>
            <li><a href="<?php echo url('add'); ?>">添加管理员</a></li>
            <li><a href="#">暂留</a></li>
            <li><a href="#" >暂留</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
          </ul>
        </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <form class="form-signin" action="<?php echo url('modify'); ?>" method="post">
        <h2 class="form-signin-heading">请修改操作人员</h2>
        <label for="inputEmail" >管理员名称</label>
        <input type="text" id="inputEmail" name="admin"  class="form-control" value="<?php echo $myadmin['admin']; ?>" required autofocus>
        <label for="inputPassword" >管理员密码</label>
        <input type="password" id="inputPassword" name="password"  class="form-control" placeholder="" required>
        <input type="hidden" value="<?php echo $myadmin['id']; ?>" name="id">
        <button class="btn btn-lg btn-primary btn-block" type="submit">修改</button>
      </form>
    </div> <!-- /container -->
    </div>
    </div>
  </body>
</html>
