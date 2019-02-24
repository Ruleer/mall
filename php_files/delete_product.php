<?php
header("content-type:text/html;charset=utf-8");
include('connet.php');
session_start();

if(isset($_GET['productid'])){
	$productid = $_GET['productid'];
}else{
	echo '非法访问';
}

try{
    $sql = "DELETE FROM product WHERE product_id='$productid'";
    $ret = $dbh->exec($sql);
	if($ret>0){
		echo '删除成功！';
    }else{
		echo "删除失败！";
  	}
}catch(PDOException $e){
	echo $e->getMessage();
}


?>