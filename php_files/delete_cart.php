<?php
header("content-type:text/html;charset=utf-8");
include('connet.php');
session_start();

if(!isset($_GET['productid'])){
	exit ('no id');
}

$productid = $_GET['productid'];
$username = $_SESSION['username'];

try{
    $sql = "DELETE FROM shoppingcart WHERE product_id='$productid' and username = '$username'";
    $ret = $dbh->exec($sql);
	if($ret>0){
		echo "delete success";
    }else{
		echo "delete error";
  	}
}catch(PDOException $e){
	echo $e->getMessage();
}

?>