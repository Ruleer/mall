<?php
header("content-type:text/html;charset=utf-8");
include('connet.php');
session_start();

//获取商品id
if(isset($_GET['productid'])){
	$productid = $_GET['productid'];
}else{
	exit('非法访问');
}

//检测是否登录并获得用户名
if(!isset($_SESSION['islogin']) || !isset($_SESSION['username'])){
	exit('您还没有登录哦~请先登录！');
}else{
	$username = $_SESSION['username'];
}


try{
	//得到商品价格
	$stmt = $dbh->prepare("SELECT * FROM product WHERE product_id='$productid'");
    $stmt->execute();
    $stmt->bindColumn('price',$price);
    $stmt->fetch();
	
    //查询该用户的购物车中是否有该商品
    $stmt2 = $dbh->query("SELECT * FROM shoppingcart WHERE product_id='$productid' and username='$username'");
    if(!($stmt2->rowCount())){
		//将新商品写入数据库
        $ret1 = $dbh->exec("INSERT INTO shoppingcart (product_id,unitprice,count,username) VALUES ('$productid','$price','1','$username')");
	    if($ret1 > 0){
	      	echo "加入购物车成功！";
		}else{
			echo "添加到数据库失败！";
		}	
    }else{
		//该商品数量+1
		$stmt2->execute();
		$stmt2->bindColumn('count',$count);
        $stmt2->fetch();
		$count ++;
        $ret2 = $dbh->exec("UPDATE shoppingcart SET count='$count' WHERE product_id='$productid' and username='$username'");
        if($ret2 > 0){
	      	echo "加入购物车成功！";
		}else{
			echo "添加到数据库失败！";
		}
	}

}catch(PDOException $e){
	echo $e->getMessage();
}


?>

