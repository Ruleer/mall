<?php
header("content-type:text/html;charset=utf-8");
include('connet.php');
session_start();

//获取注册信息&判断是否为空
$username = $_GET['username'];
if(!$username){
	echo "用户名不能为空";
	exit;
}

$gender = $_GET['gender'];
if(!$gender){
	echo "性别不能为空";
	exit;
}

$email = $_GET['email'];
if(!$email){
	echo "电子邮箱不能为空";
	exit;
}

$password = $_GET['password'];
if(!$password){
	echo "密码不能为空";
	exit;
}

$password2 = $_GET['password2'];
if(!$password2){
	echo "请再次输入密码";
	exit;
}


//判断两次密码异同
if($password != $password2){
	echo "两次密码输入不一致";
	exit;
}

//判断用户名是否存在
$search = $dbh->query("SELECT username FROM register WHERE username='$username'");
$numcount = $search->rowCount();
if($numcount>0){
	echo "用户名已经存在";
	exit;
}

//写入数据库
try{
	$password = md5($password);
    $password2 = md5($password2);
    $sql = "INSERT INTO register (username,gender,email,password,password2) VALUES ('$username','$gender','$email','$password','$password2')";
    $ret = $dbh->exec($sql);
    if($ret > 0){
		$_SESSION['username'] = $username;
		$_SESSION['islogin'] = 1;
    	echo "注册成功";
    }
    else{
    	echo "写入数据库失败";			
    }
}catch(PDOException $e){
	echo $e->getMessage();
}

?>