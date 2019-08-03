<?php
include('../connect-db.php');
session_start();
 $ProdCode = $_GET['id'];

//insert into product table
if ($mysqli->query("DELETE FROM products WHERE ProdCode='$ProdCode' ")) {
	
}
//DELETE oldproductvar
if ($mysqli->query("DELETE FROM productvar WHERE ProdCode = '$ProdCode'")) {
	
}
//insert into productvar table

	echo "Product Added to DB";
	header("Location:products.php");
?>