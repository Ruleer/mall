<?php
header("content-type:text/html;charset=utf-8");
include('connet.php');
session_start();

if(!isset($_SESSION['islogin']) || !isset($_SESSION['username'])){
	exit('unloged');
}else{
	$username = $_SESSION['username'];
}


//得到购物车商品总数cartcount
$stmt = $dbh->query("SELECT * FROM shoppingcart WHERE username='$username'");
if(!($stmt->rowCount())){
	exit('none');
}else{
	$cartcount = $stmt->rowCount();
	//echo "total:".$cartcount;
}


$stmt2 = $dbh->prepare("SELECT * FROM shoppingcart WHERE username='$username'");
$stmt2->execute();
$stmt2->bindColumn('cart_id',$cartid);
$stmt2->bindColumn('product_id',$productid);//商品id
$stmt2->bindColumn('unitprice',$price);//单价
$stmt2->bindColumn('count',$count);//数量

while($stmt2->fetch()){
	
	$stmt3 = $dbh->prepare("SELECT * FROM product WHERE product_id='$productid'");
	$stmt3->execute();
	$stmt3->bindColumn('productname',$productname);//商品名称
	$stmt3->bindColumn('introduction',$introduction);//商品简介
	$stmt3->bindColumn('image',$imagename);//图片名字
	$stmt3->fetch();
	$imageway = 'product_image/'.$imagename;//图片路径
	
	//将php对象转换为JSON格式数据
	$productid = urlencode($productid);
    $productname = urlencode($productname);
    $introduction = urlencode($introduction);
    $price = urlencode($price);
    $imageway = urlencode($imageway);
	$count = urlencode($count);
    $arr = array('productid'=>$productid,'productname'=>$productname,'introduction'=>$introduction,'price'=>$price,'imageway'=>$imageway,'count'=>$count);
    $arr = urldecode(json_encode($arr));

    echo $arr."</br>";
}
?>
