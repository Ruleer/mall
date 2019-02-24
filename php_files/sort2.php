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

$page = isset($_GET['page']) ? $_GET['page']:1;

//得到该分类名称sortname
$sql2 = "SELECT sortname FROM sort WHERE sort_id='$sortid'";
$stmt2 = $dbh->prepare($sql2);
$stmt2->execute();
$stmt2->bindColumn('sortname',$sortname);
$stmt2->fetch();

//得到商品总数numcount
$stmt3 = $dbh->query("SELECT * FROM product");
$numcount = $stmt3->rowCount();

//得到该分类下的商品数sortnum
$stmt4 = $dbh->query("SELECT * FROM product WHERE sort_id='$sortid'");
$sortnum = $stmt4->rowCount();
if($sortnum == 0){
	exit;
}

//得到总页数totalpage
$num = 4;
$totalpage = ceil($sortnum/$num);

if($page > $totalpage){
	$page = $totalpage;
}

if($page < 1){
	$page = 1;
}

$start = ($page-1)*$num;

$sql = "SELECT * FROM product where sort_id = '$sortid' limit $start,$num";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$stmt->bindColumn('productname',$productname);//商品名称
$stmt->bindColumn('introduction',$introduction);//商品简介
$stmt->bindColumn('price',$price);//单价
$stmt->bindColumn('image',$imagename);//图片名字
$stmt->bindColumn('product_id',$productid);//商品id

while($stmt->fetch()){
	$imageway = 'product_image/'.$imagename;//图片路径

    //将php对象转换为JSON格式数据
    $productid = urlencode($productid);
    $productname = urlencode($productname);
    $introduction = urlencode($introduction);
    $price = urlencode($price);
    $imageway = urlencode($imageway);
    $arr = array('productname'=>$productname,'introduction'=>$introduction,'price'=>$price,'imageway'=>$imageway,'productid'=>$productid,'page'=>$page);
    $arr = urldecode(json_encode($arr));

    echo $arr.'</br>';

}

//echo $totalpage;
?>
