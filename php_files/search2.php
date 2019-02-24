<?php
header("content-type:text/html;charset=utf-8");
include('connet.php');
session_start();

//获取商品id
if(!isset($_GET['productid'])){
	exit('非法访问');
}

$productid = $_GET['productid'];

$stmt = $dbh->query("SELECT * FROM product WHERE product_id = '$productid'");
$searchcount = $stmt->rowCount();//查到的商品条数
if($searchcount == 0){
	exit('none');
}
$stmt->execute();
$stmt->bindColumn('productname',$productname);//商品名称
$stmt->bindColumn('introduction',$introduction);//商品简介
$stmt->bindColumn('price',$price);//单价
$stmt->bindColumn('image',$imagename);//图片名字

while($stmt->fetch()){

$imageway = 'product_image/'.$imagename;//图片路径

//将php对象转换为JSON格式数据
$productid = urlencode($productid);
$productname = urlencode($productname);
$introduction = urlencode($introduction);
$price = urlencode($price);
$imageway = urlencode($imageway);
$arr = array('productid'=>$productid,'productname'=>$productname,'introduction'=>$introduction,'price'=>$price,'imageway'=>$imageway);
$arr = urldecode(json_encode($arr));

echo $arr;

}
?>