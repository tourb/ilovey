<?php error_reporting(0);
header('Content-Type:text/html; charset=UTF-8');
//ģ���¼ 
function login_post($url, $cookie, $post) { 
    $curl = curl_init();//��ʼ��curlģ�� 
    curl_setopt($curl, CURLOPT_URL, $url);//��¼�ύ�ĵ�ַ 
    curl_setopt($curl, CURLOPT_HEADER, 0);//�Ƿ���ʾͷ��Ϣ 
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 0);//�Ƿ��Զ���ʾ���ص���Ϣ 
    curl_setopt($curl, CURLOPT_COOKIEJAR, $cookie); //����Cookie��Ϣ������ָ�����ļ��� 
    curl_setopt($curl, CURLOPT_POST, 1);//post��ʽ�ύ 
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));//Ҫ�ύ����Ϣ 
    curl_exec($curl);//ִ��cURL 
    curl_close($curl);//�ر�cURL��Դ�������ͷ�ϵͳ��Դ 
} 

//��¼�ɹ����ȡ���� 
function get_content($url, $cookie) { 
    $ch = curl_init(); 
	//$post['kksj'] = "2016-2017-1" ;
	//$post['xsfs'] = 'all' ;
  

	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));//Ҫ�ύ����Ϣ 
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_HEADER, 0); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,200);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie); //��ȡcookie 
    $rs = curl_exec($ch); //ִ��cURLץȡҳ������ 
    curl_close($ch); 
    return $rs; 
} 
function get_content3($url, $cookie) { 
    $ch = curl_init(); 
    //$post['kksj'] = "2016-2017-1" ;
    //$post['xsfs'] = 'all' ;
 // $post['zc'] = '';
 //$post['xnxq01id'] = '2016-2017-1 ';
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));//Ҫ�ύ����Ϣ 
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_HEADER, 0); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,200);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie); //��ȡcookie 
    $rs = curl_exec($ch); //ִ��cURLץȡҳ������ 
    curl_close($ch); 
    return $rs; 
} 
function get_content1($url, $cookie) { 
    $ch = curl_init(); 
    //$post['kksj'] = "2016-2017-1" ;
    $post['xsfs'] = 'all' ;
  

    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));//Ҫ�ύ����Ϣ 
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_HEADER, 0); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,200);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie); //��ȡcookie 
    $rs = curl_exec($ch); //ִ��cURLץȡҳ������ 
    curl_close($ch); 
    return $rs; 
} 
function get_content2($url, $cookie) { 
    $ch = curl_init(); 
    $post['kksj'] = "2016-2017-1" ;
    //$post['xsfs'] = 'all' ;
  

    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));//Ҫ�ύ����Ϣ 
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_HEADER, 0); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,200);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie); //��ȡcookie 
    $rs = curl_exec($ch); //ִ��cURLץȡҳ������ 
    curl_close($ch); 
    return $rs; 
} 

function get_td_array($table) {
    // ȥ�� HTML �������
    $table = preg_replace("'<table[^>]*?>'si", "", $table);
    $table = preg_replace("'<tr[^>]*?>'si", "", $table);
    $table = preg_replace("'<td[^>]*?>'si", "", $table);
    $table = str_replace("</tr>", "{tr}", $table);
    $table = str_replace("</td>", "{td}", $table);
    // ȥ�� HTML ���
    $table = preg_replace("'<[\/\!]*?[^<>]*?>'si", "", $table);
    // ȥ���հ��ַ�
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
//����û��Ƿ��¼ 
function checklogin(){  
     if(empty($_SESSION['user'])){    //���һ��session�ǲ���Ϊ��  
     if(empty($_COOKIE['USERNAME']) || empty($_COOKIE['PASSWORD'])){  //���sessionΪ�գ������û�û��ѡ���¼��¼״  
     header("location:index01.php?req_url=".$_SERVER['REQUEST_URI']);  //ת����¼ҳ�棬��¼�����url����¼����ת��ȥ���û�����á�  
}else{   //�û�ѡ���˼�ס��¼״̬  
     $user = getUserInfo($_COOKIE['USERNAME'],$_COOKIE['PASSWORD']);   //ȥȡ�û��ĸ�������  
     if(empty($user)){    //�û������벻��û��ȡ����Ϣ��ת����¼ҳ��  
     header("location:index01.php?req_url=".$_SERVER['REQUEST_URI']);  
     }else{  
     $_SESSION['user'] = $user;   //�û�����������ˣ����û��ĸ������Ϸŵ�session����  
     }  
     }  
     }  
}



 ?>