<?php
include('connect-db.php');
?>
<!DOCTYPE html> 
<head>
<title>CHECKOUT | FRISHOP</title>
       
<link rel="stylesheet" type="text/css" href="styles/style.css">

</head>
<div id="wrapper">
	<?php
include('topshelf.php'); 	
include('header.php'); ?>
	<div id="con1">
	
	    <div class="holder"><?php
		$total = $_POST['total'];
			if(!isset($_SESSION['AccID'])){
			
			echo "<center><h1>Can't Checkout Yet!</h1></center><br>"; 
echo "<center><h2> Already have an account? <a href='login.php?c=1'>Login</a><br><br><br><br><br><br><br><br><br><br><br><br><br><br> New Here? <a href='register.php?c=1'>Sign-Up</a></h2></center>"; 
	}else{
	echo"<h1>Payment Method(s)</h1><hr>";	
echo "<form action='https://www.sandbox.paypal.com/cgi-bin/webscr' method='post' target='_top'>
<input type='hidden' name='cmd' value='_xclick'>
<input type='hidden' name='business' value='frishop@webdev.com'>
<input type='hidden' name='lc' value='US'>
<input type='hidden' name='item_name' value='FRISHOP CHECKOUT'>
<input type='hidden' name='item_number' value='Multi-Product'>
<input type='hidden' name='amount' value='$total'>
<input type='hidden' name='currency_code' value='PHP'>
<input type='hidden' name='button_subtype' value='services'>
<input type='hidden' name='no_note' value='1'>
<input type='hidden' name='no_shipping' value='2'>
<input type='hidden' name='rm' value='1'>
<input type='hidden' name='return' value='http://localhost/shop/success.php'>
<input type='hidden' name='cancel_return' value='http://localhost/shop/cancel.php'>
<input type='hidden' name='bn' value='PP-BuyNowBF:btn_buynow_LG.gif:NonHosted'>
<input type='image' src='image/checkout-logo-large.png' border='0' name='submit' alt='PayPal - The safer, easier way to pay online!'>
<img alt='' border='0' src='https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif' width='1' height='1'>
</form>
";
		
	

	?>

	<button style="width:229px;height:50px;font-size:16pt;" onclick="location.href = 'success.php'">Cash On Delivery</button>
		</div>
	<?php } ?>
	<div id="footer"></div>
</div>
</body>
</html>


