<?php 
$transno = $_GET['transno'];
include('../connect-db.php');
if ($result = $mysqli->query("UPDATE transaction SET Status='Delivered'  WHERE transNo = '$transno'"))
{
		
}
header('Location:courier.php');
?>