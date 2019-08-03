<?php
include('connect-db.php');
session_start();
if(!isset($_SESSION['AccID'])){
	header("Location:index.php");
exit();
	}
	$AccID  = $_SESSION['AccID'];
if ($result = $mysqli->query("SELECT * FROM accounts WHERE AccID ='$AccID'"))
				{
// display records if there are records to display
					if ($result->num_rows > 0)
						{
				while ($row = $result->fetch_object()){
					$name=$row->FirstName . " ". $row->LastName;
					
							}
						}else{
					
				}
				}

//echo $_SESSION['AccID'];
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
		<?php
		echo "<h1>Hi $name! </h1>";
		echo "Enjoy your shopping!";
		?>
		<div class="datacon">
		<h2>Profile</h2>
		<?php
		$AccID = $_SESSION['AccID'];
		if ($result = $mysqli->query("SELECT * FROM accounts WHERE AccID='$AccID'"))
{
// display records if there are records to display

			if ($result->num_rows > 0)
			{
				
				while ($row = $result->fetch_object()){
		$Name = $row->FirstName . " " . $row->LastName;
		$Address = $row->Address;
		$City = $row->City;
		$Contact = $row->Contact;
		
				}
			}
			echo "Name:$Name <br>";
			echo "Address:$Address <br>";
			echo "City:$City <br>";
			echo "Contact:$Contact <br>";
}
		?>
		</div>
		<div class="datacon">
		
		<h2>Pending Orders</h2>
		<?php
		$AccID = $_SESSION['AccID'];
		if ($result1 = $mysqli->query("SELECT * FROM transaction WHERE AccID='$AccID' AND Status = 'Pending'"))
{
// display records if there are records to display

			if ($result1->num_rows > 0)
			{
				echo "<table>";
				echo "<tr><td>Transaction No.</td><td>Item</td><td>Amount</td></tr>";
			while ($row2 = $result1->fetch_object()){
			$ProdNo = $row2->ProdNo;
				if ($result3 = $mysqli->query("SELECT * FROM productvar WHERE ProdID = '$ProdNo'")){
					
			if ($result3->num_rows > 0)
			{
				while ($row3 = $result3->fetch_object()){
				$ProdCode = $row3->ProdCode;
				$Size = $row3->Size; 
				$ProdName = $ProdCode."(".$Size.")";
				$Price = $row3->Price;
				}
				}
				}
			$transNo = $row2->transNo;
		
			
			echo "<tr><td>$transNo</td><td>$ProdName</td><td>$Price</td></tr>";
			
			}
			echo "</table>";
}else{
	echo "No Pending Orders";
}

}
		?>
		</div>
		
		<div class="datacon">
		
		<h2>Shipped/Confirmed Orders</h2>
		<?php
		$AccID = $_SESSION['AccID'];
		if ($result1 = $mysqli->query("SELECT * FROM transaction WHERE AccID='$AccID' AND Status = 'Shipped'"))
{
// display records if there are records to display

			if ($result1->num_rows > 0)
			{
				echo "<table>";
				echo "<tr><td>Transaction No.</td><td>Item</td><td>Amount</td></tr>";
			while ($row2 = $result1->fetch_object()){
			$ProdNo = $row2->ProdNo;
				if ($result3 = $mysqli->query("SELECT * FROM productvar WHERE ProdID = '$ProdNo'")){
					
			if ($result3->num_rows > 0)
			{
				while ($row3 = $result3->fetch_object()){
				$ProdCode = $row3->ProdCode;
				$Size = $row3->Size; 
				$ProdName = $ProdCode."(".$Size.")";
				$Price = $row3->Price;
				}
				}
				}
			$transNo = $row2->transNo;
		
			
			echo "<tr><td>$transNo</td><td>$ProdName</td><td>$Price</td></tr>";
			
			}
			echo "</table>";
}else{
	echo "No Confirmed Orders";
}

}
		?>
		</div>
		<div class="datacon">
		
		<h2>Delivered Orders</h2>
		<?php
		$AccID = $_SESSION['AccID'];
		if ($result1 = $mysqli->query("SELECT * FROM transaction WHERE AccID='$AccID' AND Status = 'Delivered'"))
{
// display records if there are records to display

			if ($result1->num_rows > 0)
			{
				echo "<table>";
				echo "<tr><td>Transaction No.</td><td>Item</td><td>Amount</td></tr>";
			while ($row2 = $result1->fetch_object()){
			$ProdNo = $row2->ProdNo;
				if ($result3 = $mysqli->query("SELECT * FROM productvar WHERE ProdID = '$ProdNo'")){
					
			if ($result3->num_rows > 0)
			{
				while ($row3 = $result3->fetch_object()){
				$ProdCode = $row3->ProdCode;
				$Size = $row3->Size; 
				$ProdName = $ProdCode."(".$Size.")";
				$Price = $row3->Price;
				}
				}
				}
			$transNo = $row2->transNo;
		
			
			echo "<tr><td>$transNo</td><td>$ProdName</td><td>$Price</td></tr>";
			
			}
			echo "</table>";
}else{
	echo "No Delivered Orders";
}

}
		?>
		</div>
		</div>
	</div>
	
	<div id="footer"></div>
</div>
</body>
</html>