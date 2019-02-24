<?php
header("content-type:text/html;charset=utf-8");
session_start();

//将$_SESSION数据清空
$_SESSION = [];

//删除会话Cookie
if(ini_get('session.use_cookies')){
	$params=session_get_cookie_params();
	setcookie(session_name(),'',time()-1,$params['path'],$params['domain'],$params['secure'],$params['httponly']);
}

//销毁会话
session_destroy();
echo "quit success";
?>