<?php 
session_start();error_reporting(0);

if($_SERVER["REQUEST_METHOD"] == "GET"){
if(empty($_GET["form-username"])){
	echo"<meta charst='utf8'><script language='javascript'>
          alert('用户名或密码错误，请重新输入！');
        location.href='index01.php';
          </script>";
}
if(empty($_GET["form-password"])){
	echo"<meta charst='utf8'><script language='javascript'>
          alert('用户名或密码错误，请重新输入！');
        location.href='index01.php';
          </script>";
}else{
	 echo "<meta charst='utf8'><script>alert('登录成功!');window.location='index02.php';</script>";
	 $_SESSION['user'] = $_GET['form-username'];
$_SESSION['pwd'] = $_GET['form-password'];
}


}





 ?>