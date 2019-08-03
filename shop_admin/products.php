<!DOCTYPE html> 
<head>
<title>ADMIN PANEL | FRISHOP</title>
       
       
<link rel="stylesheet" type="text/css" href="style/style2.css">

</head>

<div id="wrapper">
<?php include('header.php');?>
	<div id="con1">
	
	    <div class="holder">
		<form action="products.php">
				<div id="searchtable">
					<table>
						<tr><td><input id="qtext" type="text" name="q" placeholder="Search for products, brands, etc."/></td><td><input id="searchq" type="submit" value="Search"/></td><td><a href="addproduct.php">Add Product</a></td></tr>
								</table>
					</div>
				</form>
				
					<?php
					$q = (isset($_GET['q']) ? $_GET['q'] : null);
					if(isset($q)){
						
						$q = "WHERE LongName LIKE '%$q%' or Brand LIKE '%$q%' or ProdCode LIKE '%$q%'or Type LIKE '%$q%'";
					}
				include("../connect-db.php");
				if ($result = $mysqli->query("SELECT * FROM products $q"))
{
// display records if there are records to display
			if ($result->num_rows > 0)
			{	echo "<table  >";

			// set table headers
			echo "<tr><th>Image</th><th>Product Code</th><th>Product Name</th><th>Brand</th><th>Type</th><th></th><th></th></tr>";

			while ($row = $result->fetch_object())
			{
			// set up a row for each record
		
			echo "<tr>";
			echo "<td><img style='width:100px;' src='../productimages/" . $row->Image . "'></td>";
			echo "<td>" . $row->ProdCode . "</td>";
			echo "<td>" . $row->LongName . "</td>";
			echo "<td>" . $row->Brand . "</td>";
			echo "<td>" . $row->Type . "</td>";
			echo "<td><a href='edit.php?id=" . $row->ProdCode . "'>Edit</a></td>";
			echo "<td><a href='delete.php?id=" . $row->ProdCode . "'>Delete</a></td>";
			echo "</tr>";
			
			}

			echo "</table>";
}else{
	echo "<h2>No Result(s) Found</h2>";
}

}
				
				?>
		</div>

	<div id="footer"></div>
</div>
</body>
</html>


