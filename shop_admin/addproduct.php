<!DOCTYPE html> 
<head>
<title>ADMIN PANEL | FRISHOP</title>
       
       
<link rel="stylesheet" type="text/css" href="style/style2.css">

	<script language="JavaScript" type="text/javascript" src="cbrte/html2xhtml.min.js"></script>
	<script language="JavaScript" type="text/javascript" src="cbrte/richtext.min.js"></script>
</head>

<div id="wrapper">
	<?php include('header.php');?>
	<div id="con1">
	
	    <div class="holder">
		<h1>Add Product</h1>
		<form action="AddProductMethod.php" method="POST" enctype="multipart/form-data">
		<table>
		<tr><td><label for="productname" value="">Product Name</label></td>
			<td><input name="productname" type="text" required/></td></tr>
				<tr><td><label for="productcodename" value="" maxlength="12">Product CodeName</label></td>
			<td><input name="productcodename" type="text" required/></td></tr>
				<tr><td><label for="shortdes" value="">Short Description</label></td>
			<td><textarea rows="4" cols="50" name="shortdes"   ></textarea></td></tr>
			
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
  <option value="Nike">Nike</option>
  <option value="Under Armour">Under Armour</option>
  <option value="Adidas">Adidas</option>
</select>
			
			</td></tr>
			<tr><td><label for="type" value="">Type</label></td>
			<td><select name="type">
  <option value="T-shirt">T-shirt</option>
  <option value="Short">Short</option>
  <option value="Shoes">Shoes</option>
    <option value="Bags">Bags</option>
</select></td></tr>
			<tr><td><label for="primaryimage" value="">Primary Photo</label></td>
			<td>	 <input type="file" name="primaryimage"></td></tr>
				<tr><td><label for="price" value="" maxlength="12">Price</label></td>
			<td><input name="price" type="text" required/></td></tr>
				<tr><td><label for="discount" value="" maxlength="12">Discount</label></td>
			<td><input name="discount" type="text" required/></td></tr>
				<tr><td><label for="qty" value="">Quantity</label></td>
			<td>	 <input type="number" name="qty"></td></tr>
					<tr><td colspan="2"><h1>Sizes</h2></td></tr>
			
			<tr><td><label for="size1" value="">Size 1</label></td>
			<td>	 <input type="text" name="size1"></td></tr>
					<tr><td><label for="size2" value="">Size 2</label></td>
			<td>	 <input type="text" name="size2"></td></tr>
					<tr><td><label for="size3" value="">Size 3</label></td>
			<td>	 <input type="text" name="size3"></td></tr>
					<tr><td><label for="size4" value="">Size 4</label></td>
			<td>	 <input type="text" name="size4"></td></tr>
					<tr><td><label for="size5" value="">Size 5</label></td>
			<td>	 <input type="text" name="size5"></td></tr>
					<tr><td><label for="size6" value="">Size 6</label></td>
			<td>	 <input type="text" name="size6"></td></tr>
			
			
		<tr><td colspan="2"><h1>Gallery Pictures</h2></td></tr>
			<hr>
			<tr><td><label for="photo1" value="">Photo 1</label></td>
			<td>	 <input type="file" name="photo1"></td></tr>
					<tr><td><label for="photo2" value="">Photo 2</label></td>
			<td>	 <input type="file" name="photo2"></td></tr>
					<tr><td><label for="photo3" value="">Photo 3</label></td>
			<td>	 <input type="file" name="photo3"></td></tr>
					<tr><td><label for="photo4" value="">Photo 4</label></td>
			<td>	 <input type="file" name="photo4"></td></tr>
					<tr><td><label for="photo5" value="">Photo 5</label></td>
			<td>	 <input type="file" name="photo5"></td></tr>
<tr><th colspan="2"><input type="submit" value="Submit"></h2></th></tr>
			
				</table>
				</form>
		</div>

	<div id="footer"></div>
</div>
</body>
</html>
			 <input type="file" name="image">

