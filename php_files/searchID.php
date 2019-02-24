<?php
header("content-type:text/html;charset=utf-8");
include('connet.php');
session_start();

//获取关键字
$keywords = isset($_GET['keywords']) ? trim($_GET['keywords']) : '';

//获得查询到的商品总条数
$stmt2 = $dbh->query("SELECT * FROM product WHERE productname LIKE '%{$keywords}%' or introduction LIKE '%{$keywords}%'");
$searchcount = $stmt2->rowCount();

//如果关键词为空或查询到的商品数为零，跳转空白页
if(empty($keywords) || $searchcount == 0){
    echo "none";
	exit;
}
//用变量绑定这些商品的所有信息
$stmt = $dbh->prepare("SELECT * FROM product WHERE productname LIKE '%{$keywords}%' or introduction LIKE '%{$keywords}%'");
$stmt->execute();
$stmt->bindColumn('productid',$productid);//商品id
$stmt->bindColumn('productname',$productname);//商品名称
$stmt->bindColumn('introduction',$introduction);//商品简介
$stmt->bindColumn('price',$price);//单价
$stmt->bindColumn('image',$image);//图片名字

echo $productid;

?>