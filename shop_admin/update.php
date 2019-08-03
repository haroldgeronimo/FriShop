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





	
	
	
//insert into product table
if ($mysqli->query("UPDATE products SET LongName = '$LongName', ShortDes = '$ShortDes', LongDes = '$LongDes', Brand = '$Brand',Type = '$Type' WHERE ProdCode='$ProdCode' ")) {
	
}
//DELETE oldproductvar
if ($mysqli->query("DELETE FROM productvar WHERE ProdCode = '$ProdCode'")) {
	
}
//insert into productvar table
$i=0;
while($i<$sizecount){
	if ($mysqli->query("INSERT INTO productvar ( ProdCode,Size,Price,Discount,Qty) VALUES ('$ProdCode','".$size[$i]."','$price','$discount','$qty')")) {
	
}
	$i++;
}
	echo "Product Added to DB";
	header("Location:products.php");
?>