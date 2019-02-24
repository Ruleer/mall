<?php
header("content-type:text/html;charset=utf-8"); 
session_start();

if(!isset($_SESSION['islogin']) || !isset($_SESSION['username'])){
	echo "还没登录";
}else{
	//用户名储存在$username里
	$username = $_SESSION['username'];

	//这两个if不用就删掉
	if($_SESSION['islogin'] == 1){
		echo "这是普通用户";
	}
	
	if($_SESSION['islogin'] == 2){
		echo "这是管理员";
	}
}
?>