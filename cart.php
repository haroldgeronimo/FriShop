<?php include('connect-db.php'); ?>

<!DOCTYPE html> 
<head>
<link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<div id="wrapper">
<?php include('topshelf.php');
include('header.php');
 ?>
	
	<div id="con1">
		<div class="holder">
		<h1>Item(s) in Cart</h1>
		
		<?php
		$newcount = 0;
		if(isset($_SESSION['AccID'])){
			$AccID = $_SESSION['AccID'];
		if ($result = $mysqli->query("SELECT * FROM cart WHERE AccID='".$AccID."' AND ShowonCart='1'"))
{
// display records if there are records to display
			if ($result->num_rows > 0)
			{
			
			while ($row = $result->fetch_object())
			{
				$ProdNo[$newcount] = $row->ProdNo;
				$Qty[$newcount] = $row->Qty;
						if ($result2 = $mysqli->query("SELECT * FROM productvar WHERE ProdID='".$ProdNo[$newcount]."'")){
							if ($result2->num_rows > 0)
								{
								while ($row2 = $result2->fetch_object()){  
								$P[$newcount] = $row2->Price-($row2->Price*($row2->Discount/100));
											$S[$newcount] = $row2->Size;
											$ProdCode[$newcount] = $row2->ProdCode;
									
									if ($result3 = $mysqli->query("SELECT * FROM products WHERE ProdCode='".$ProdCode[$newcount]."'")){
										if ($result3->num_rows > 0)
										{
										while ($row3 = $result3->fetch_object())
											{ 
											$N[$newcount]=$row3->LongName; 

											}
										}
									}
								}
							}
						}
				
				$newcount++;
			}
				
			}
			
}
			
			
		}else{
			
			if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
			
		if ($result = $mysqli->query("SELECT * FROM cart WHERE user_ip='$ip' AND ShowonCart='1'"))
{
// display records if there are records to display
			if ($result->num_rows > 0)
			{
			
			while ($row = $result->fetch_object())
			{
				$ProdNo[$newcount] = $row->ProdNo;
				$Qty[$newcount] = $row->Qty;
				$prod =$ProdNo[$newcount];
						if ($result2 = $mysqli->query("SELECT * FROM productvar WHERE ProdID='$prod'")){
							if ($result2->num_rows > 0)
								{
			
								while ($row2 = $result2->fetch_object()){ 
$ProdCode[$newcount] = $row2->ProdCode;								
									
										$P[$newcount] = $row2->Price-($row2->Price*($row2->Discount/100));
											$S[$newcount] = $row2->Size;
									if ($result3 = $mysqli->query("SELECT * FROM products WHERE ProdCode='".$ProdCode[$newcount]."'")){
										if ($result3->num_rows > 0)
										{
										while ($row3 = $result3->fetch_object())
											{ 
$N[$newcount] =$row3->LongName;
											}
										}
									}
								}
							}
						}
				
				$newcount++;
			}
				
			}
			
}
			
			
		}
		$i=0;
		
		if($newcount>0){
				echo "<div class='even'><div id='cartitem'><div class='name'>Product Name</div><div class='size'>Size</div><div class='qty' id='qty".$i."'>Quantity</div><div class='price'  id='price_".$i."'>Price</div><div class='subtotal' id='sub_".$i."'>Subtotal</div><div class='remove' ><a href='remove.php?at=all'>Empty Cart</a></div></div></div>";
	while($i<=$newcount-1){
							
//echo "please";
		$mod = $i%2;
		$Sub[$i] = $Qty[$i] * $P[$i];
						if($mod == 0)
						{
						echo "<div class='odd'><div id='cartitem'><div class='name'>".strtoupper($N[$i])."</div><div class='size'>".strtoupper($S[$i])."</div><div class='qty' id='qty".$i."'><a href='subquan.php?No=".$ProdNo[$i]."'>-</a> ".$Qty[$i]." <a href='addquan.php?No=".$ProdNo[$i]."'>+</a></div><div class='price'  id='price_".$i."'>".number_format($P[$i],2)."</div><div class='subtotal' id='sub_".$i."'>".number_format($Sub[$i],2)."</div><div class='remove'><a href='remove.php?at=".$ProdNo[$i]."'>Remove</a></div></div></div>";
						}
						else{
		echo "<div class='even'><div id='cartitem'><div class='name'>".strtoupper($N[$i])."</div><div class='size'>".strtoupper($S[$i])."</div><div class='qty' id='qty".$i."'><a href='subquan.php?No=".$ProdNo[$i]."'>-</a> ".$Qty[$i]." <a href='addquan.php?No=".$ProdNo[$i]."'>+</a></div><div class='price' id='price_".$i."'>".number_format($P[$i],2)."</div><div class='subtotal' id='sub_".$i."'>".number_format($Sub[$i],2)."</div><div class='remove'><a href='remove.php?at=".$ProdNo[$i]."'>Remove</a></div></div></div>";
		
						}
				//name//size//qty//price//subtotal//remove		
				
	//				echo "| i:" . $i ."<br>";
					$i++;
	}
	echo "<br><h2 style='margin:0px;text-align:right;'>Total: PHP <span id='total'>".number_format(array_sum($Sub),2)."</span></h2><br>";
 
$total = array_sum($Sub);
 echo "<form action='checkout.php' method='post'><input type='hidden' name='total' value='$total'><input type='submit' style='margin:10px;float:right;
	 background-color: #33FF00;
  -moz-border-radius: 15px;
  -webkit-border-radius: 15px;
  border: 5px solid #009900;
  padding: 5px;
	' value='Checkout'></form>";


	//	print_r ($_SESSION['cart']); echo "<br>";
	//print_r ($PID); echo "<br>";
		end:}
		else{
			
			echo "<h2 style='text-align:center;'>No Items in Cart</h2>";
		}
		?>
		</div>
	</div>
	
	<div id="footer"></div>
</div>
</body>
</html>