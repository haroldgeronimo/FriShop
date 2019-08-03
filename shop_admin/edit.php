<!DOCTYPE html> 
<head>
<title>ADMIN PANEL | FRISHOP</title>
       
     <?php
	 include('../connect-db.php');
	 $ProdCode = $_GET['id'];
	 if ($result = $mysqli->query("SELECT * FROM products WHERE ProdCode = '$ProdCode'"))
{
			if ($result->num_rows > 0)
			{
			while ($row = $result->fetch_object())
{
$_POST['rte1'] = $row->LongDes;
$name = $row->LongName;
$ShortDes = $row->ShortDes;
$Brand = $row->Brand;
$Type = $row->Type;
	 if ($result2 = $mysqli->query("SELECT * FROM productvar WHERE ProdCode = '$ProdCode'"))
{
			if ($result2->num_rows > 0)
			{
				$i=0;
			while ($r = $result2->fetch_object())
			{
				
			$ProdID[$i] = $r->ProdID;
			$Size[$i] = $r->Size;
			$Price[$i] = $r->Price;
			$Discount[$i] = $r->Discount;
			$Qty[$i] = $r->Qty;
			$i++;
			}
			$count = $i;
			}
			}
}
}
}
	 ?>  
<link rel="stylesheet" type="text/css" href="style/style2.css">

	<script language="JavaScript" type="text/javascript" src="cbrte/html2xhtml.min.js"></script>
	<script language="JavaScript" type="text/javascript" src="cbrte/richtext.min.js"></script>
</head>

<div id="wrapper">
	<?php include('header.php');?>
	<div id="con1">
	
	    <div class="holder">
		<h1>Add Product</h1>
		<form action="update.php" method="POST" enctype="multipart/form-data">
		<table>
		<tr><td><label for="productname" value="">Product Name</label></td>
			<td><input name="productname" type="text" value="<?php echo $name;?>" required/></td></tr>
				<tr><td></td>
			<td><input name="productcodename" type="hidden"  value="<?php echo $ProdCode;?>"/></td></tr>
				<tr><td><label for="shortdes" value="">Short Description</label></td>
			<td><textarea rows="4" cols="50" name="shortdes"  > <?php echo $ShortDes;?></textarea></td></tr>
			
							<tr><td><label for="productcodename" value="" maxlength="12">Long Description</label></td>
			<td><script language="JavaScript" type="text/javascript">
<!--
function submitForm() {
	//make sure hidden and iframe values are in sync for all rtes before submitting form
	updateRTEs();
	
	return true;
}

//Usage: initRTE(imagesPath, includesPath, cssFile, genXHTML, encHTML)
initRTE("cbrte/images/", "cbrte/", "", true);
//-->
</script>
<noscript><p><b>Javascript must be enabled to use this form.</b></p></noscript>

<script language="JavaScript" type="text/javascript">
<!--
//build new richTextEditor
var rte1 = new richTextEditor('rte1');
<?php
//format content for preloading
if (!(isset($_POST["rte1"]))) {
	$content = "";
	$content = rteSafe($content);
} else {
	//retrieve posted value
	$content = rteSafe($_POST["rte1"]);
}
?>
rte1.html = '<?=$content;?>';
//rte1.toggleSrc = false;
rte1.build();
//-->
</script>

<?php


function rteSafe($strText) {
	//returns safe code for preloading in the RTE
	$tmpString = $strText;
	
	//convert all types of single quotes
	$tmpString = str_replace(chr(145), chr(39), $tmpString);
	$tmpString = str_replace(chr(146), chr(39), $tmpString);
	$tmpString = str_replace("'", "&#39;", $tmpString);
	
	//convert all types of double quotes
	$tmpString = str_replace(chr(147), chr(34), $tmpString);
	$tmpString = str_replace(chr(148), chr(34), $tmpString);
//	$tmpString = str_replace("\"", "\"", $tmpString);
	
	//replace carriage returns & line feeds
	$tmpString = str_replace(chr(10), " ", $tmpString);
	$tmpString = str_replace(chr(13), " ", $tmpString);
	
	return $tmpString;
}
?>
<!-- END Demo Code -->
</td></tr>
<tr><td><label for="brand" value="">Brand</label></td>
			<td>
			<select name="brand">
  <option value="Nike" <?php if($Brand=='Nike')echo 'selected';?>>Nike</option>
  <option value="Under Armour" <?php if($Brand=='Under Armour')echo 'selected';?>>Under Armour</option>
  <option value="Adidas" <?php if($Brand=='Adidas')echo 'selected';?>>Adidas</option>
</select>
			
			</td></tr>
			<tr><td><label for="type" value="">Type</label></td>
			<td><select name="type">
  <option value="T-shirt"  <?php if($Type=='T-shirt')echo 'selected';?>>T-shirt</option>
  <option value="Short"  <?php if($Type=='Shorts')echo 'selected';?>>Short</option>
  <option value="Shoes"  <?php if($Type=='Shoes')echo 'selected';?>>Shoes</option>
    <option value="Bags"  <?php if($Type=='Bags')echo 'selected';?>>Bags</option>
</select></td></tr>
		
				<tr><td><label for="price"  maxlength="12">Price</label></td>
			<td><input name="price" type="text" value="<?php echo $Price[0];?>" required/></td></tr>
				<tr><td><label for="discount" value="" maxlength="12" >Discount</label></td>
			<td><input name="discount" type="text" value="<?php echo $Discount[0];?>" required/></td></tr>
				<tr><td><label for="qty" value="">Quantity</label></td>
			<td>	 <input type="number" value="<?php echo $Qty[0];?>" name="qty"></td></tr>
					<tr><td colspan="2"><h1>Sizes</h2></td></tr>
			
			<tr><td><label for="size1" value="">Size 1</label></td>
			<td>	 <input type="text" name="size1" value="<?php if(isset($Size[0]))echo $Size[0];?>"></td></tr>
					<tr><td><label for="size2" value="">Size 2</label></td>
			<td>	 <input type="text" name="size2" value="<?php if(isset($Size[1]))echo $Size[1];?>"></td></tr>
					<tr><td><label for="size3" value="">Size 3</label></td>
			<td>	 <input type="text" name="size3" value="<?php if(isset($Size[2]))echo $Size[2];?>"></td></tr>
					<tr><td><label for="size4" value="">Size 4</label></td>
			<td>	 <input type="text" name="size4" value="<?php if(isset($Size[3]))echo $Size[3];?>"></td></tr>
					<tr><td><label for="size5" value="">Size 5</label></td>
			<td>	 <input type="text" name="size5" value="<?php if(isset($Size[4]))echo $Size[4];?>"></td></tr>
					<tr><td><label for="size6" value="">Size 6</label></td>
			<td>	 <input type="text" name="size6" value="<?php if(isset($Size[5]))echo $Size[5];?>"></td></tr>
			
	<th colspan="2"><input type="submit" value="Submit"></h2></th></tr>
			<input type="hidden" name="prodID1" value="<?php if(isset($ProdID[0])){echo $ProdID[0];} ?>"/>
			<input type="hidden" name="prodID2" value="<?php if(isset($ProdID[1])){echo $ProdID[1];} ?>"/>
			<input type="hidden" name="prodID3" value="<?php if(isset($ProdID[2])){echo $ProdID[2];} ?>"/>
			<input type="hidden" name="prodID4" value="<?php if(isset($ProdID[3])){echo $ProdID[3];} ?>"/>
			<input type="hidden" name="prodID5" value="<?php if(isset($ProdID[4])){echo $ProdID[4];} ?>"/>
			<input type="hidden" name="prodID6" value="<?php if(isset($ProdID[5])){echo $ProdID[5];} ?>"/>
			
			
			
			<input type="hidden" name="count" value="<?php echo $count; ?>"/>
			
			
				</table>
				</form>
		</div>

	<div id="footer"></div>
</div>
</body>
</html>
			 <input type="file" name="image">

