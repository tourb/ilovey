<?php error_reporting(0);
header('Content-Type:text/html; charset=UTF-8');
//模拟登录 
function login_post($url, $cookie, $post) { 
    $curl = curl_init();//初始化curl模块 
    curl_setopt($curl, CURLOPT_URL, $url);//登录提交的地址 
    curl_setopt($curl, CURLOPT_HEADER, 0);//是否显示头信息 
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 0);//是否自动显示返回的信息 
    curl_setopt($curl, CURLOPT_COOKIEJAR, $cookie); //设置Cookie信息保存在指定的文件中 
    curl_setopt($curl, CURLOPT_POST, 1);//post方式提交 
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));//要提交的信息 
    curl_exec($curl);//执行cURL 
    curl_close($curl);//关闭cURL资源，并且释放系统资源 
} 

//登录成功后获取数据 
function get_content($url, $cookie) { 
    $ch = curl_init(); 
	//$post['kksj'] = "2016-2017-1" ;
	//$post['xsfs'] = 'all' ;
  

	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));//要提交的信息 
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_HEADER, 0); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,200);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie); //读取cookie 
    $rs = curl_exec($ch); //执行cURL抓取页面内容 
    curl_close($ch); 
    return $rs; 
} 
function get_content3($url, $cookie) { 
    $ch = curl_init(); 
    //$post['kksj'] = "2016-2017-1" ;
    //$post['xsfs'] = 'all' ;
 // $post['zc'] = '';
 //$post['xnxq01id'] = '2016-2017-1 ';
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));//要提交的信息 
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_HEADER, 0); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,200);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie); //读取cookie 
    $rs = curl_exec($ch); //执行cURL抓取页面内容 
    curl_close($ch); 
    return $rs; 
} 
function get_content1($url, $cookie) { 
    $ch = curl_init(); 
    //$post['kksj'] = "2016-2017-1" ;
    $post['xsfs'] = 'all' ;
  

    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));//要提交的信息 
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_HEADER, 0); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,200);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie); //读取cookie 
    $rs = curl_exec($ch); //执行cURL抓取页面内容 
    curl_close($ch); 
    return $rs; 
} 
function get_content2($url, $cookie) { 
    $ch = curl_init(); 
    $post['kksj'] = "2016-2017-1" ;
    //$post['xsfs'] = 'all' ;
  

    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));//要提交的信息 
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_HEADER, 0); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,200);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie); //读取cookie 
    $rs = curl_exec($ch); //执行cURL抓取页面内容 
    curl_close($ch); 
    return $rs; 
} 

function get_td_array($table) {
    // 去掉 HTML 标记属性
    $table = preg_replace("'<table[^>]*?>'si", "", $table);
    $table = preg_replace("'<tr[^>]*?>'si", "", $table);
    $table = preg_replace("'<td[^>]*?>'si", "", $table);
    $table = str_replace("</tr>", "{tr}", $table);
    $table = str_replace("</td>", "{td}", $table);
    // 去掉 HTML 标记
    $table = preg_replace("'<[\/\!]*?[^<>]*?>'si", "", $table);
    // 去掉空白字符
    $table = preg_replace("'([\r\n])[\s]+'", "", $table);
    $table = str_replace(" ", "", $table);
    $table = str_replace(" ", "", $table);
    $table = explode('{tr}', $table);
    array_pop($table);
    foreach ($table as $key => $tr) {
        $td = explode('{td}', $tr);
        array_pop($td);
        $td_array[] = $td;
    }
 return $td_array;

}
//检查用户是否登录 
function checklogin(){  
     if(empty($_SESSION['user'])){    //检查一下session是不是为空  
     if(empty($_COOKIE['USERNAME']) || empty($_COOKIE['PASSWORD'])){  //如果session为空，并且用户没有选择记录登录状  
     header("location:index01.php?req_url=".$_SERVER['REQUEST_URI']);  //转到登录页面，记录请求的url，登录后跳转过去，用户体验好。  
}else{   //用户选择了记住登录状态  
     $user = getUserInfo($_COOKIE['USERNAME'],$_COOKIE['PASSWORD']);   //去取用户的个人资料  
     if(empty($user)){    //用户名密码不对没到取到信息，转到登录页面  
     header("location:index01.php?req_url=".$_SERVER['REQUEST_URI']);  
     }else{  
     $_SESSION['user'] = $user;   //用户名和密码对了，把用户的个人资料放到session里面  
     }  
     }  
     }  
}



 ?>