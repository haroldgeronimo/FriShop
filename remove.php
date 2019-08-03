<?php
include('connect-db.php');
session_start();
$prodID = (isset($_GET['at']) ? $_GET['at'] : null);
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}



if(!isset($_SESSION['AccID'])){
if($prodID == 'all'){
	if ($result = $mysqli->query("DELETE FROM cart WHERE user_ip='$ip'"))
{
// display records if there are records to display
			if ($result->num_rows > 0)
			{
			
			while ($row = $result->fetch_object())
			{}
			}
}
	
	
}else{
		if ($result = $mysqli->query("DELETE FROM cart WHERE user_ip='$ip' AND ProdNo='$prodID'"))
{
// display records if there are records to display
			if ($result->num_rows > 0)
			{
			
			while ($row = $result->fetch_object())
			{}
			}
}
	
}
			}else{
				if($prodID == 'all'){
	if ($result = $mysqli->query("DELETE FROM cart WHERE AccID='".$_SESSION['AccID']."'"))
{
// display records if there are records to display
			if ($result->num_rows > 0)
			{
			
			while ($row = $result->fetch_object())
			{}
			}
}
	
	
}else{
		if ($result = $mysqli->query("DELETE FROM cart WHERE AccID='".$_SESSION['AccID']."' AND ProdNo='$prodID'"))
{
// display records if there are records to display
			if ($result->num_rows > 0)
			{
			
			while ($row = $result->fetch_object())
			{}
			}
}
	
}
				
				
			}
header("Location:cart.php");

?>