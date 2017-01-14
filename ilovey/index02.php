<?php 

session_start();error_reporting(0);

  $_GET['form-username']=$_SESSION['user'];
 $_GET['form-password']=$_SESSION['pwd'] ;
include("function.php");
echo "<script type='text/javascript'>location:reload();</script>";
//设置自己的post的数据
$post =  array(
 'USERNAME' => $_GET['form-username'], 
 'PASSWORD' =>$_GET['form-password'] ,
 
 ); 
//登录地址 
$url = "http://210.46.127.11/xsd/xk/LoginToXk";

//设置cookie保存路径 
$cookie = dirname(__FILE__) . '/cookie.txt';
//登录后要获取信息的
$url2 = "http://210.46.127.11/xsd/framework/main.jsp"; 
//模拟登录 
 login_post($url, $cookie, $post); 
//获取登录页的信息 
$Table = get_content($url2, $cookie); 
//删除cookie文件
@ unlink($cookie);
//匹配页面信息 
$preg ="/\<div class\=\"block1text\"\>(.*?)\<\/div\>/s";
preg_match_all($preg, $Table, $arr); 
$str = $arr[1][0]; 
if($str == null){
echo"<meta charst='utf8'><script language='javascript'>
          alert('用户名或密码错误，请重新输入！');
        location.href='index01.php';
          </script>";

}
//输出内容 
echo '当前登录的用户：<br>';
echo  $str ;



 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>哈商大一键查询成绩，课表</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">
	
	<!-- Bootstrap itself -->
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" type="text/css">

	<!-- Custom styles -->
	<link rel="stylesheet" href="assets/css/magister.css">

	<!-- Fonts -->
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Wire+One' rel='stylesheet' type='text/css'>
</head>

<!-- use "theme-invert" class on bright backgrounds, also try "text-shadows" class -->
<body class="theme-invert">
<!-- Main (Home) section -->
<section class="section" id="head">
	<div class="container">

		<div class="row">
			<div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 text-center">	
				<p><a href="cxlicj.php" class="btn btn-default btn-lg">查询历史成绩</a></p>
				<p><a href="cxdqcj.php" class="btn btn-default btn-lg">查询当前学期成绩</a></p>
				<p><a href="cxkb.php" class="btn btn-default btn-lg">查询当前学期课表</a></p>
				<a href="index01.php" class="btn btn-default btn-lg">返回首页</a>
				<p><?php  echo'</br></br><a  href="http://www.bestyzh.cn/">我爱开源~</a></br>我的微信：312323885<br>欢迎来访~'  ?>
				</p>
			</div> <!-- /col -->
		</div> <!-- /row -->
	
	</div>
</section>

<!-- Second (About) section -->


<!-- Third (Works) section -->


<!-- Fourth (Contact) section -->



<!-- Load js libs only when the page is loaded. -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="assets/js/modernizr.custom.72241.js"></script>
<!-- Custom template scripts -->
<script src="assets/js/magister.js"></script>
</body>
</html>