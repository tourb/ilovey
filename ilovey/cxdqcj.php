<?php
session_start();

include("function.php");

//设置自己的post的数据 

$post =  array(
 'USERNAME' =>$_SESSION['user'] , 
 'PASSWORD' =>$_SESSION['pwd'],
 
 );

//登录地址 
$url = "http://210.46.127.11/xsd/xk/LoginToXk";

//设置cookie保存路径 
$cookie = dirname(__FILE__) . '/cookie.txt';
//登录后要获取信息的
$url2 = "http://210.46.127.11/xsd/kscj/cjcx_list"; 
//模拟登录 
 login_post($url, $cookie, $post); 
//获取登录页的信息 
$Table = get_content2($url2, $cookie); 
//删除cookie文件
@ unlink($cookie);
/*过滤下多余的换行和空格*/
$Table = preg_replace('/\s{2,}/', '', $Table);  
$content = $Table ;
//echo $content;


$arr = get_td_array($content) ;
echo "<title>大学全部成绩</title>" ;

echo '<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable =no">' ;

$total = 0 ;   //总分
for($i = 2 ;$i<count($arr) ;$i++) {
  

	str_replace("&nbsp;","",$arr[$i][3]) ;
	str_replace("&nbsp;","",$arr[$i][4]) ;
	str_replace("&nbsp;","",$arr[$i][5]) ;
 str_replace("&nbsp;","",$arr[$i][6]) ;
	if($arr[$i][4]<60 && is_numeric($arr[$i][4]))
    $str ="<font color='RED'>科目: ".$arr[$i][3]."  总分: ".$arr[$i][4]."  学分: ".$arr[$i][5]."总学时：".$arr[$i][6]."</font>" ;
    else
    $str = "科目: ".$arr[$i][3]."  总分: ".$arr[$i][4]."  学分: ".$arr[$i][5] ."   总学时：".$arr[$i][6];
	
	echo '<table border="0">' . '<tr><td>'.$str. '</tr></td>'.'</table>';
 echo '<br>';
}
  echo '<a  href="http://www.bestyzh.cn/">我爱开源~</a>';





?>