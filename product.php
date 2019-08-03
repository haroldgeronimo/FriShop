<?php
include('connect-db.php');
$error = false;
$prodCode = (isset($_GET['prodID']) ? $_GET['prodID'] : null);

if ($result = $mysqli->query("SELECT * FROM products WHERE ProdCode='".$prodCode."'"))
{
// display records if there are records to display
			if ($result->num_rows > 0)
			{
	while ($row = $result->fetch_object()){
$ProdCode=$row->ProdCode;
$LongName=$row->LongName;
$ShortDes=$row->ShortDes;
$LongDes=$row->LongDes;
$Brand=$row->Brand;
$Image=$row->Image;
$Hits=$row->Hits;
if ($result = $mysqli->query("SELECT * FROM productvar WHERE ProdCode='".$prodCode."'"))
{
	if ($result->num_rows > 0)
			{
				$count = 0;
			while ($row = $result->fetch_object()){
				$ProdID[$count] = $row->ProdID;
				$Size[$count] = $row->Size;
				$Color[$count] = $row->Color;
				$Hex[$count] = $row->Hex;
				$Price[$count] = $row->Price;
					$Discount[$count] = $row->Discount;
				$Qty[$count] = $row->Qty;
				$count++;
				
				
			}
			
			}
	
	
}

		
			}
			

			}
			// if there are no records in the database, display an alert message
			else
			{
			$error=true;
			}


}


$mysqli->close();







?>
<!DOCTYPE html> 
<head>
<link rel="stylesheet" type="text/css" href="styles/style.css">
<script>
var prodkey = [<?php
$count = count($ProdID) - 1;
$i=0;
while($i<=$count){
	if($i==$count)
		echo $ProdID[$i];
		else
	echo $ProdID[$i].',';
$i++;
	}
	

?>];

var selected = 0;
var key = prodkey[0];


	function getselect(x)
	{
		 selected = x;	
console.log("selected:" + selected);	
key = prodkey[selected+0];
document.getElementById("hidden").value = key;	 
	}
	
</script> 
<script type="text/javascript" src="prodscript/prodscript.js"></script> 
<title><?php echo strtoupper($LongName); ?> | FRISHOP</title>
</head>
<div id="wrapper">
<?php include('topshelf.php');
include('header.php'); ?>
	
	<div id="con1">
		<div class="holder">

		<div id="productleft">
		<h1><?php echo $LongName; ?></h1>
		<?php		include('slide.php');
	// echo	"<img id='uniImg' src='productimages/".$Image."'/>"; ?>
		
		
		</div>
		<div id="productright">
				<p><?php echo $ShortDes;?></p>
					<p><?php echo $LongDes;?></p>
					<?php
					if($Discount[0]>0){
						
	$net = $Price[0]-($Price[0]*($Discount[0]*0.01));
	echo "<br><strike>PHP ".number_format($Price[0],2)."</strike> ".number_format($Discount[0],2)."% OFF";
	echo "<h1 style='color:RED;'>PHP ".number_format($net,2)."</h1>";}
	
	else {echo "<h1>PHP ".number_format($Price[0],2)."</h1>";}
					?>
		<hr>
		<h2>Sizes</h2>
		<form action="addtocart.php">
	
		<?php
		
		$i=0;
				$nostock = 0;
		while($i<=$count){
			$w = "";
			$s = "size_" . $i;
			if($i==0){
			$c="checked='checked'";
			}
		else
			$c='';

			if($Qty[$i] == 0){
				$nostock++;
			}
			else{
			echo "	<div class='container'>
	<section>";
			
		echo "<input type='radio'  name='group1' id='".$s."' value='".$i."'".$c." onclick='getselect(".$i.")'>";
		echo "<label for='$s'><span class='radio'>".strtoupper($Size[$i])."</span></label>";
echo "	</section id='first' class='section'>
			</div>";}
			
			$i++;
		}
		$d ='';
	
	if($nostock-1==$count){
		echo "<p>Not Available</p>";
		$d ="disabled='disabled'";
		
	}
	
		echo  "<input type='hidden' name='prodid' id='hidden' value='$ProdID[0]'>
		<input type='hidden' name='prodcode' id='hidden' value='$ProdCode'>
		<input id='addtocartbtn' type='submit' value='Add to Cart' $d>
		</form>
		</div>";

		?>


		</div>
	</div>
	
	<div id="footer"></div>
</div>
</body>
</html>