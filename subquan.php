<?php

include('connect-db.php');
$prodID = (isset($_GET['No']) ? $_GET['No'] : null);
session_start();
$AccID = $_SESSION['AccID'];
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
if(isset($_SESSION['AccID'])){
	if ($result = $mysqli->query("SELECT * FROM cart WHERE  AccID='$AccID' AND ProdNo = '$prodID'"))
{
			if ($result->num_rows > 0)
			{
	while ($row = $result->fetch_object()){
		if($row->Qty>1){
		if ($result2 = $mysqli->query("UPDATE cart SET Qty = Qty - 1 WHERE AccID='$AccID' AND ProdNo = '$prodID'")){}
	}
			}
			}
}}
else{
	if ($result = $mysqli->query("SELECT * FROM cart WHERE user_ip='$ip'  AND ProdNo = '$prodID'"))
{
			if ($result->num_rows > 0)
			{
	while ($row = $result->fetch_object()){
		if($row->Qty>1){
		if ($result2 = $mysqli->query("UPDATE cart SET Qty = Qty - 1 WHERE user_ip='$ip'  AND ProdNo = '$prodID' ")){}
	}
			}
			}
}
	
}

header("Location:cart.php");
?>
