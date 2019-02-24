<?php
header("content-type:text/html;charset=utf-8");
include('connet.php');
session_start();

if(!isset($_GET['productid'])){
	exit ('error');
}

$productid = $_GET['productid'];
$username = $_SESSION['username'];
$count = $_GET['count'];

if($count == 0){
	exit ('delete');
}

try{
	//写入购物车数据库
    $ret = $dbh->exec("UPDATE shoppingcart SET count='$count' WHERE product_id='$productid' and username = '$username'");
	if($ret>0){
	    echo "success";
    }else{
	    echo "fail";
    }

}catch(PDOException $e){
	echo $e->getMessage();
}

?>