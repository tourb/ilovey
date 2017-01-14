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
$url2 = "http://210.46.127.11/xsd/xskb/xskb_list.do"; 
//模拟登录 
 login_post($url, $cookie, $post); 
//获取登录页的信息 
$Table = get_content3($url2, $cookie); 
//删除cookie文件
@ unlink($cookie);
/*过滤下多余的换行和空格*/
$Table = preg_replace('/\s{2,}/', '', $Table);  
$content = $Table ;
//echo $content;
//匹配页面信息 
//$preg ='/\<td.+?\>(.+?)\<\/td\>/';
$preg ='/<table id="kbtable"[\w\W]*?>([\w\W]*?)<\/table>/';

/*$preg ='/<td [\w\W]*?>([\w\W]*?)<\/td>/';*/
preg_match_all($preg, $Table, $arr); 
$str = $arr[0][0]; 
//输出内容 
echo  $str ;
//var_dump($arr[1]);



$arr = get_td_array($content) ;
echo "<title>大学全部成绩</title>" ;

