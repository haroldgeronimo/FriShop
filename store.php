<?php 
$Type = (isset($_GET['Type']) ? $_GET['Type'] : null); 
$q = (isset($_GET['q']) ? $_GET['q'] : null); 
?>
<!DOCTYPE html> 
<head>
<link rel="stylesheet" type="text/css" href="styles/style.css">
<title><?php 
if($Type == 'Shorts')
	echo 'APPAREL';
else if($Type == 'HL')
	echo 'HIGHLIGHTS';
else
echo strtoupper($Type);

?> | FRISHOP</title>
</head>
<div id="wrapper">
<?php include('topshelf.php');
include('header.php');
 ?>
	
	<div id="con1">
	
		<div class="holder">
		<?php
include('connect-db.php');

if(isset($Type)){
if($Type=='Shorts'){
	if ($result = $mysqli->query("SELECT * FROM products WHERE Type='Shorts' OR Type='T-shirt'"))
{
// display records if there are records to display
			if ($result->num_rows > 0)
			{
	while ($row = $result->fetch_object()){

$ProdCode=$row->ProdCode;
	echo "<a class='prodlink' href='product.php?prodID=$ProdCode'>";					// set up a row for each record
echo "<div id='items'>";	
$ImgName=$row->Image;
echo "<div class='imghold'>";
echo "<img id='itempics' src='productimages/$ImgName'/>";
echo "</div>";
echo "<div>";	
echo "<h3>";
echo $Name = ucwords($row->LongName);
echo "</h3></div>";

if ($result2 = $mysqli->query("SELECT * FROM productvar WHERE Prodcode = '$ProdCode'"))
{
// display records if there are records to display
	if ($result2->num_rows > 0)
	{
		while ($row2 = $result2->fetch_object()){
			$Price = $row2->Price;
			$Discount = $row2->Discount;
		}
	}

}
if($Discount>0){
	$net = $Price-($Price*($Discount*0.01));
	echo "<h3 style='color:RED;'>PHP ".number_format($net,2)."</h3>";
	echo "<br><sub><strike>PHP ".number_format($Price,2)."</strike> $Discount% OFF</sub>";
}else{
echo "<h3>PHP ".number_format($Price,2)."</h3>";}
	echo "</div>";	
	echo "</a>";
	
		
			}

			}
			// if there are no records in the database, display an alert message
			else
			{
			echo "No results to display!";
			}


}

	
}else
if ($result = $mysqli->query("SELECT * FROM products WHERE Type='$Type'"))
{
// display records if there are records to display
			if ($result->num_rows > 0)
			{
	while ($row = $result->fetch_object()){

						// set up a row for each record
						$ProdCode=$row->ProdCode;
	echo "<a class='prodlink' href='product.php?prodID=$ProdCode'>";							
echo "<div id='items'>";	
$ImgName=$row->Image;
echo "<img id='itempics' src='productimages/$ImgName'/>";
echo "<h3>";
echo $Name = ucwords($row->LongName);
echo "</h3>";


if ($result2 = $mysqli->query("SELECT * FROM productvar WHERE Prodcode = '$ProdCode'"))
{
// display records if there are records to display
	if ($result2->num_rows > 0)
	{
		while ($row2 = $result2->fetch_object()){
			$Price = $row2->Price;
			$Discount = $row2->Discount;
		}
	}

}
if($Discount>0){
	$net = $Price-($Price*($Discount*0.01));
	echo "<h3 style='color:RED;'>PHP ".number_format($net,2)."</h3>";
	echo "<br><sub><strike>PHP ".number_format($Price,2)."</strike> $Discount% OFF</sub>";
}else{
echo "<h3>PHP ".number_format($Price,2)."</h3>";}
	echo "</div>";	
	
		echo "</a>";
	
	
		
			}

			}
			// if there are no records in the database, display an alert message
			else
			{
			echo "No results to display!";
			}


}
}
else if(isset($q)){
	if ($result = $mysqli->query("SELECT * FROM products WHERE LongName LIKE '%$q%' OR BRAND LIKE '%$q%' OR TYPE LIKE '%$q%'"))
{
// display records if there are records to display
echo "<h1>Search Results for '$q'</h1>";
			if ($result->num_rows > 0)
			{
	while ($row = $result->fetch_object()){

					$ProdCode=$row->ProdCode;
	echo "<a class='prodlink' href='product.php?prodID=$ProdCode'>";		// set up a row for each record
echo "<div id='items'>";	
$ImgName=$row->Image;
echo "<div class='imghold'>";
echo "<img id='itempics' src='productimages/$ImgName'/>";
echo "</div>";
echo "<div>";	
echo "<h3>";
echo $Name = $row->LongName;
echo "</h3></div>";

if ($result2 = $mysqli->query("SELECT * FROM productvar WHERE Prodcode = '$ProdCode'"))
{
// display records if there are records to display
	if ($result2->num_rows > 0)
	{
		while ($row2 = $result2->fetch_object()){
			$Price = $row2->Price;
			$Discount= $row2->Discount;
		}
	}

}
if($Discount>0){
	$net = $Price-($Price*($Discount*0.01));
	echo "<h3 style='color:RED;'>PHP ".number_format($net,2)."</h3>";
	echo "<br><sub><strike>PHP $Price</strike> $Discount% OFF</sub>";
}else{
echo "<h3>PHP ".number_format($Price,2)."</h3>";}
	echo "</div>";	
	
		echo "</a>";
	
		
			}

			}
			// if there are no records in the database, display an alert message
			else
			{
			echo "No results to display!";
			}


}
	
	
	
}

$mysqli->close();




?>
		</div>
	</div>

	<div id="footer"></div>
</div>
</body>
</html>