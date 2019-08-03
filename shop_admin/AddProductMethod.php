<?php
include('../connect-db.php');
session_start();
$ProdCode = $_POST['productcodename'];
$LongName = $_POST['productname'];
$ShortDes = $_POST['shortdes'];
$LongDes = $_POST['rte1'];
$Brand = $_POST['brand'];
$Type = $_POST['type'];
$price = $_POST['price'];
$discount = $_POST['discount'];
$qty = $_POST['qty'];
$na=0;
$i=0;
while($i<=5){
	$tmpi = $i+1;
$size[$i] = $_POST['size'.$tmpi];
if($size[$i]==""){
	$na++;
}	
	$i++;
}


$sizecount = 6 - $na;






//uploads photo
$location="";
if (!isset($_FILES['primaryimage']['tmp_name'])) {
	echo "mali";
	}else{
	$file=$_FILES['primaryimage']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['primaryimage']['tmp_name']));
	$image_name= addslashes($_FILES['primaryimage']['name']);
			
			move_uploaded_file($_FILES["primaryimage"]["tmp_name"],"../productimages/". $_FILES["primaryimage"]["name"]);
			
			$location= "".$_FILES["primaryimage"]["name"];
	}
	
	
	
//insert into product table
if ($mysqli->query("INSERT INTO products(ProdCode,LongName,ShortDes,LongDes,Brand,Type,Image) VALUES ('$ProdCode','$LongName','$ShortDes','$LongDes','$Brand','$Type','$location')")) {
	
}
//insert into productvar table
$i=0;
while($i<$sizecount){
	if ($mysqli->query("INSERT INTO productvar ( ProdCode,Size,Price,Discount,Qty) VALUES ('$ProdCode','".$size[$i]."','$price','$discount','$qty')")) {
	
}
	$i++;
}
//insert to gallery
$i=0;
$na = 0;

while($i<=4){
$tmpp = $i +1;
if($_FILES['photo'.$tmpp ]['size'] == 0 || $_FILES['photo'.$tmpp ]['name'] == ""){
	$na++;
}	
	$i++;
}
$piccount = 5 - $na;
$i=0;
echo "<br>piccount:".$piccount;
while($i<$piccount){
	$tmpp = $i +1;
	$photo = "photo" .$tmpp;
if (!isset($_FILES[$photo]['tmp_name'])) {
	echo "mali";
	}else{
	$file=$_FILES[$photo]['tmp_name'];
	$image= addslashes(file_get_contents($_FILES[$photo]['tmp_name']));
	$image_name= addslashes($_FILES[$photo]['name']);
			
			move_uploaded_file($_FILES[$photo]["tmp_name"],"../productimages/". $_FILES[$photo]["name"]);
			
			$location= "productimages/".$_FILES[$photo]["name"];
	}
if ($mysqli->query("INSERT INTO `gallery`(`ProdCode`, `Dir`) VALUES ('$ProdCode','$location')")) {
	
}
$i++;
}
	echo "Product Added to DB";
	//header("Location:addsuccess.php");
?>