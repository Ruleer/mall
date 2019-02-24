<?php
header("content-type:text/html;charset=utf-8");
include('connet.php');
session_start();

//获取登录信息
$username = $_GET['username'];
if(!$username){
	exit ('unfind username');
}

$password = $_GET['password'];
if(!$password){
	exit ('unfind password');
}

//判断是否已登录
if(isset($_SESSION['islogin']) && isset($_SESSION['username'])){
    if($username == $_SESSION['username']){
        exit ($username);
    }
}

$password = md5($password);

try{
    //获取数据库信息
    $stmt = $dbh->prepare("SELECT username,password FROM register WHERE username='$username' and password='$password'");
    $stmt->execute();
    $stmt->bindColumn('username',$name);
    $stmt->bindColumn('password',$pwd);
    $stmt->fetch();

    //判断登录信息是否正确
    if($username == $name && $password == $pwd){
		$_SESSION['username'] = $username;
		$_SESSION['islogin'] = 1;
		
		//判断该用户是否为管理员
        $search = $dbh->query("SELECT adminname FROM admin WHERE adminname='$username'");
        $numcount = $search->rowCount();
        if($numcount>0){
			$_SESSION['islogin'] = 2;
		}
	
    	echo "success";
    }
    else{
    	echo "input error";
    }
}catch(PDOException $e){
	echo $e->getMessage();
}
?>