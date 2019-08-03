<?php
include('connect-db.php');

session_start();

$AccID = $_SESSION['AccID'];

if ($result = $mysqli->query("SELECT * FROM transaction ORDER BY transNo DESC LIMIT 1"))
{

			if ($result->num_rows > 0)
			{	
			while ($row = $result->fetch_object())
			{
				$transNo = $row->transNo;
				$transNo++;
			}
		
			}else{
					$transNo = 1;
			}
}
	
	
	if ($result = $mysqli->query("SELECT * FROM cart WHERE AccID = '$AccID'"))
{

			if ($result->num_rows > 0)
			{	
			while ($row = $result->fetch_object())
			{
				$ProdNo = $row->ProdNo;
				$Qty = $row->Qty;
				
	if ($mysqli->query("INSERT INTO transaction (transNo,AccID,ProdNo,Qty) VALUES('$transNo','$AccID','$ProdNo','$Qty')")){
		
		
		
	}
			}
			}else{
			}
}
				
	if ($result = $mysqli->query("DELETE FROM cart WHERE AccID = '$AccID'")){
		
	}
	
	

?>
<!DOCTYPE html> 
<head>
<link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<div id="wrapper">
<?php include('topshelf.php');
include('header.php'); ?>
	
	<div id="con1">
		<div class="holder">
		<h1>Order Successful</h1>
		
		</div>
		
	</div>
	
	<div id="footer"></div>
</div>
</body>
</html>