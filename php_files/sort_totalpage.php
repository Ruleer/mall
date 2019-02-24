<?php
header("content-type:text/html;charset=utf-8");
include('connet.php');
session_start();

if(isset($_GET['sortid'])){
	$sortid = $_GET['sortid'];
	$_SESSION['sortid'] = $sortid;
}else{
	$sortid = $_SESSION['sortid'];
}

//得到该分类下的商品数sortnum
$stmt = $dbh->query("SELECT * FROM product WHERE sort_id='$sortid'");
$sortnum = $stmt->rowCount();
if($sortnum == 0){
	exit;
}

//得到总页数totalpage
$num = 4;
$totalpage = ceil($sortnum/$num);

echo $totalpage;
?>