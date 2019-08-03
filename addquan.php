<?php
include('connect-db.php');
$prodID = (isset($_GET['No']) ? $_GET['No'] : null);
session_start();
$AccID = (isset($_SESSION['AccID']) ? $_SESSION['AccID'] : null);
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
$ip = $_SERVER['REMOTE_ADDR'];}

	
	if(isset($_SESSION['AccID'])){
		if ($result = $mysqli->query("SELECT * FROM cart WHERE  AccID='$AccID' AND ProdNo = '$prodID'")){
			if ($result->num_rows > 0){
				if ($res = $mysqli->query("SELECT * FROM productvar WHERE  ProdID = '$prodID'")){
					if ($res->num_rows > 0){
						while ($r = $res->fetch_object()){
						$OrQTY = $r->Qty;
						}
					}
				}			
				while ($row = $result->fetch_object()){
					if($OrQTY>$row->Qty){
						if ($result2 = $mysqli->query("UPDATE cart SET Qty = Qty + 1 WHERE  AccID='$AccID' AND ProdNo = '$prodID'")){
							
						}
					}
				}
			}
		}
	}
	
	
	
	else{
		if ($result = $mysqli->query("SELECT * FROM cart WHERE user_ip='$ip'  AND ProdNo = '$prodID' ")){
			if ($result->num_rows > 0){
				if ($res = $mysqli->query("SELECT * FROM productvar WHERE  ProdID = '$prodID'")){
					if ($res->num_rows > 0){
						while ($r = $res->fetch_object()){
							$OrQTY = $r->Qty;
						}
					}
				}
				while ($row = $result->fetch_object()){
					if($OrQTY>$row->Qty){
						if ($result2 = $mysqli->query("UPDATE cart SET Qty = Qty + 1 WHERE user_ip='$ip' AND ProdNo = '$prodID'")){
							
						}
					}
				}
			}

		}
		
	}

header("Location:cart.php");
?>