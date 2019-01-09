<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"F:\tp5\tp5.0\public/../application/admin\view\test\test.html";i:1546936647;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>

</head>
<body>
	<h2>这是一个标题</h2>
	<p>这是一个段落。</p>
	<p>这是另一个段落。</p>
	<button>点我</button>

    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
$(document).ready(function(){
  $("button").click(function(){
    $("p").hide();
  });
});
</script>
</body>
</html>