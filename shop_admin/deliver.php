<?php 
$transno = $_GET['transno'];
include('../connect-db.php');
if ($result = $mysqli->query("UPDATE transaction SET Status='Shipped'  WHERE transNo = '$transno'"))
{
		
}
header('Location:orders.php');
?>