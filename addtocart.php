<?php
include('connect-db.php');
session_start();
$prodID = (isset($_GET['prodid']) ? $_GET['prodid'] : null); 
$prodcode = (isset($_GET['prodcode']) ? $_GET['prodcode'] : null); 
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

if(isset($_SESSION['AccID'])){
	$AccID = $_SESSION['AccID'];
	if ($result = $mysqli->query("SELECT * FROM cart WHERE AccID='$AccID' AND ProdNo = '$prodID'"))
{
			if ($result->num_rows > 0)
			{
	while ($row = $result->fetch_object()){
		if ($result2 = $mysqli->query("UPDATE cart SET Qty = Qty + 1 WHERE AccID='$AccID' AND ProdNo = '$prodID'")){}
	}
			}
			else{
				if ($result2 = $mysqli->query("INSERT INTO cart (ProdNo,AccID,Qty) VALUES ('$prodID','$AccID','1')")){}
			}
}}
else{

	if ($result = $mysqli->query("SELECT * FROM cart WHERE user_ip='$ip' AND ProdNo = '$prodID'"))
{
			if ($result->num_rows > 0)
			{
	while ($row = $result->fetch_object()){
		if ($result2 = $mysqli->query("UPDATE cart SET Qty = Qty + 1 WHERE user_ip='$ip' AND ProdNo = '$prodID'")){}
	}
			}
			else{
				if ($result2 = $mysqli->query("INSERT INTO cart (ProdNo,user_ip,Qty) VALUES ('$prodID','$ip','1')")){}
			}
}


	
}
header("Location:product.php?prodID=".$prodcode);
?>