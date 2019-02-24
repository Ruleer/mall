<?php
header("content-type:text/html;charset=utf-8");
include('connet.php');
session_start();

$productid = $_GET['productid'];

$updatename = $_GET["updatename"];
if(!$updatename){
	exit('不能为空');
}

$updateintroduction = $_GET["updateintroduction"];
if(!$updateintroduction){
	exit('不能为空');
}

$updateprice = $_GET["updateprice"];
if(!$updateprice){
	exit('不能为空');
}


try{
	$ret1 = $dbh->exec("UPDATE product SET productname='$updatename' WHERE product_id='$productid'");
	$ret2 = $dbh->exec("UPDATE product SET introduction='$updateintroduction' WHERE product_id='$productid'");
	$ret3 = $dbh->exec("UPDATE product SET price='$updateprice' WHERE product_id='$productid'");

	if($ret1>0 || $ret2>0 || $ret3>0){
		echo "修改成功";

    }else{
		echo "修改数据失败";
	}
}catch(PDOException $e){
	echo $e->getMessage();
}

?>