<?php
header("content-type:text/html;charset=utf-8");
include('connet.php');
session_start();

$sortid = $_POST['sortid'];//分类id

$productname = $_POST["productname"];//商品名称
if(!$productname){
	exit('商品名称不能为空！');
}

$introduction = $_POST['introduction'];//商品简介
if(!$introduction){
	exit('商品简介不能为空！');
}

$price = $_POST['price'];//商品价格
if(!$price){
	exit('商品价格不能为空！');
}


if (($_FILES['image']['type'] == 'image/png') || ($_FILES['image']['type'] == 'image/jpeg')){//指定图片类型
    $originalname = $_FILES['image']['name'];//获取文件名
	$imagename = iconv('utf-8','gb2312',$originalname);//重新编码
    $originalway = $_FILES['image']['tmp_name'];//获取存放文件的临时路径
	
    if (file_exists("../product_image/".$imagename)){//检查指定文件夹中是否有同名文件
		exit('请更改文件名后重新上传！');
		
	}else{
		move_uploaded_file($originalway,'../product_image/'.$imagename);//把图片从临时文件夹移动到指定文件夹		
	}
	
}else{
	exit('请上传jpg/png格式的图片！');
}


try{
	//写入数据库
    $sql = "INSERT INTO product (productname,introduction,price,sort_id,image) VALUES ('$productname','$introduction','$price','$sortid','$originalname')";
    $ret = $dbh->exec($sql);
    if($ret > 0){
    	echo "添加商品成功！";	
    }
    else{
    	echo "写入数据库失败！";	
    }
}catch(PDOException $e){
	echo $e->getMessage();
}
?>