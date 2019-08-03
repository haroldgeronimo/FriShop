<!DOCTYPE html> 
<head>
<title>ADMIN PANEL | FRISHOP</title>
       
       
<link rel="stylesheet" type="text/css" href="style/style2.css">

</head>

<div id="wrapper">

<?php 
include('header.php');
?>
	
	<div id="con1">
	
	    <div class="holder">
		<button onclick="location.href='register.php'"> Register a Courier </button>
	<h2>Pending Orders</h2>
<?php
include('../connect-db.php');
		
		if ($result = $mysqli->query("SELECT * FROM transaction WHERE Status='Pending' LIMIT 10"))
{$transNo2 = 0;
			if ($result->num_rows > 0)
			while ($row = $result->fetch_object())
			{$count=0;
				$transno = $row->transNo;
				
				if($transNo2 == $transno || $count!=0){}else{
				echo "<h3>$transno</h3>";
				echo "<table>";

			// set table headers
			echo "<tr><th>Buyer Name</th><th>Product Code</th><th>Size</th><th>Quantity</th></tr>";

				
						if ($res = $mysqli->query("SELECT trans.transNo,prodvar.ProdCode,prodvar.Size,trans.Qty, acc.FirstName, acc.LastName FROM transaction as trans INNER JOIN productvar as prodvar ON trans.ProdNo = prodvar.ProdID AND trans.transNo = '$transno' INNER JOIN accounts as acc ON acc.AccID = trans.AccID"))
{
			if ($res->num_rows > 0)
			{
			while ($r = $res->fetch_object())
{	



echo "<tr>";
echo "<td>".$r->FirstName." ".$r->LastName."</td>";
echo "<td>".$r->ProdCode."</td>";
echo "<td>".$r->Size."</td>";
echo "<td>".$r->Qty."</td>";


	echo "<tr>";
	
	
	
}
			echo "</table>";
			echo "<a href='deliver.php?transno=$transno'>Confirm</a> | ";
			echo "<a href='cancel.php?transno=$transno'>Cancel Order</a>";
			
			}
				}}
				$transNo2 = $transno;
				$count++;
			}else
				echo "No Pending Orders";
			}else{}
				
			
			//shipped
		
		echo	"<h2>Shipped Orders</h2>";
		if ($result = $mysqli->query("SELECT * FROM transaction WHERE Status='Shipped' LIMIT 10"))
{$transNo2 = 0;
			if ($result->num_rows > 0)
			while ($row = $result->fetch_object())
			{$count=0;
				$transno = $row->transNo;
				
				if($transNo2 == $transno || $count!=0){}else{
				echo "<h3>$transno</h3>";
				echo "<table>";

			// set table headers
			echo "<tr><th>Buyer Name</th><th>Product Code</th><th>Size</th><th>Quantity</th></tr>";

				
						if ($res = $mysqli->query("SELECT trans.transNo,prodvar.ProdCode,prodvar.Size,trans.Qty, acc.FirstName, acc.LastName FROM transaction as trans INNER JOIN productvar as prodvar ON trans.ProdNo = prodvar.ProdID AND trans.transNo = '$transno' INNER JOIN accounts as acc ON acc.AccID = trans.AccID"))
{
			if ($res->num_rows > 0)
			{
			while ($r = $res->fetch_object())
{	



echo "<tr>";
echo "<td>".$r->FirstName." ".$r->LastName."</td>";
echo "<td>".$r->ProdCode."</td>";
echo "<td>".$r->Size."</td>";
echo "<td>".$r->Qty."</td>";


	echo "<tr>";
	
	
	
}
			echo "</table>";
			
			}
				}}
				$transNo2 = $transno;
				$count++;
			}else
				echo "No Confrimed Orders";
			}else{}
				
			//delivered
				
		echo	"<h2>Delivered Orders</h2>";
			if ($result = $mysqli->query("SELECT * FROM transaction WHERE Status='Delivered' LIMIT 10"))
{$transNo2 = 0;
			if ($result->num_rows > 0)
			while ($row = $result->fetch_object())
			{$count=0;
				$transno = $row->transNo;
				
				if($transNo2 == $transno || $count!=0){}else{
				echo "<h3>$transno</h3>";
				echo "<table>";

			// set table headers
			echo "<tr><th>Buyer Name</th><th>Product Code</th><th>Size</th><th>Quantity</th></tr>";

				
						if ($res = $mysqli->query("SELECT trans.transNo,prodvar.ProdCode,prodvar.Size,trans.Qty, acc.FirstName, acc.LastName FROM transaction as trans INNER JOIN productvar as prodvar ON trans.ProdNo = prodvar.ProdID AND trans.transNo = '$transno' INNER JOIN accounts as acc ON acc.AccID = trans.AccID"))
{
			if ($res->num_rows > 0)
			{
			while ($r = $res->fetch_object())
{	



echo "<tr>";
echo "<td>".$r->FirstName." ".$r->LastName."</td>";
echo "<td>".$r->ProdCode."</td>";
echo "<td>".$r->Size."</td>";
echo "<td>".$r->Qty."</td>";


	echo "<tr>";
	
	
	
}
			echo "</table>";
			
			}
				}}
				$transNo2 = $transno;
				$count++;
			}else
				echo "No Delivered Orders";
			}else{}
		
		?>
		
		</div>

	<div id="footer"></div>
</div>
</body>
</html>


