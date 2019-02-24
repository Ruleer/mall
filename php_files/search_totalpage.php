<?php
header("content-type:text/html;charset=utf-8");
include('connet.php');
session_start();

//获取关键字
if(isset($_GET['keywords'])){
	$keywords = isset($_GET['keywords']) ? trim($_GET['keywords']) : '';
	$_SESSION['keywords'] = $keywords;
}else{
	$keywords = $_SESSION['keywords'];
}

//获得查询到的商品总条数
$stmt = $dbh->query("SELECT * FROM product WHERE productname LIKE '%{$keywords}%' or introduction LIKE '%{$keywords}%'");
$searchcount = $stmt->rowCount();

//如果关键词为空或查询到的商品数为零，返回none
if(empty($keywords) || $searchcount == 0){
   exit('none');
}

//得到总页数totalpage
$num = 4;
$totalpage = ceil($searchcount/$num);
 
echo $totalpage;
?>