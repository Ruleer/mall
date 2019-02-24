<?php
header("content-type:text/html;charset=utf-8");
try{
	$dbh = new PDO('mysql:host=localhost;dbname=mall','root','root');
	//设置错误模式
	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	die('数据库连接失败'.$e->getMessage());
}

?>