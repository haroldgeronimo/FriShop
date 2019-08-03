<?php
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

if(isset($_SESSION['AccID'])){
	$AccID = $_SESSION['AccID'];
	if ($result = $mysqli->query("SELECT * FROM cart WHERE AccID='$AccID'"))
{
			if ($result->num_rows > 0)
			{
	while ($row = $result->fetch_object()){

}

}

}$nocart = $result->num_rows;}
else{

	if ($result = $mysqli->query("SELECT * FROM cart WHERE user_ip='$ip' "))
{
			if ($result->num_rows > 0)
			{
	while ($row = $result->fetch_object()){

}


	
}

}$nocart = $result->num_rows;}
?>
<div id="header">
		<div id="headcon">
			<div id="logo"></div>
			<div id="search">
				<form>
				<div id="searchtable">
					<table>
						<tr><td><input id="qtext" name="q" type="text" placeholder="Search for products, brands, etc."/></td><td><input id="searchq" type="submit" value="Search"/></td></tr>
					</table>
					</div>
				</form>
			</div>
				<a href="cart.php"><div id="cart"><div style="text-align:center;color:white;font-weight:bold;border-radius: 50%;width:20px;height:20px;background-color:red;"><?php echo $nocart?></div></div></a>
			<div id="acc"></div>
		</div>
	</div>
	<div id="category">
		<div class="holder2">
					<ul id="links">
  <li><a class="active" href="store.php?Type=Shoes">Shoes</a></li>
  <li><a href="store.php?Type=Bags">Bags</a></li>
  <li><a href="store.php?Type=Shorts">Apparel</a></li>
  <li><a href="store.php?Type=HL">Highlights</a></li>
</ul>
		</div>
	</div>