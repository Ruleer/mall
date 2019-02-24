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

$page = isset($_GET['page']) ? $_GET['page']:1;

//获得查询到的商品总条数
$stmt2 = $dbh->query("SELECT * FROM product WHERE productname LIKE '%{$keywords}%' or introduction LIKE '%{$keywords}%'");
$searchcount = $stmt2->rowCount();

//如果关键词为空或查询到的商品数为零，返回none
if(empty($keywords) || $searchcount == 0){
   exit('none');
}

//得到总页数totalpage
$num = 4;
$totalpage = ceil($searchcount/$num);

if($page > $totalpage){
	$page = $totalpage;
}

if($page < 1){
	$page = 1;
}

$start = ($page-1)*$num;

//用变量绑定这些商品的所有信息
$stmt = $dbh->prepare("SELECT * FROM product WHERE productname LIKE '%{$keywords}%' or introduction LIKE '%{$keywords}%' limit $start,$num");
$stmt->execute();
$stmt->bindColumn('product_id',$productid);//商品id
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
$arr = array('productid'=>$productid,'productname'=>$productname,'introduction'=>$introduction,'price'=>$price,'imageway'=>$imageway,'page'=>$page);
$arr = urldecode(json_encode($arr));

echo $arr."</br>";

}
?>