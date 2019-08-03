<!DOCTYPE html> 
<head>
<link rel="stylesheet" type="text/css" href="styles/style.css">
<title>REGISTER | FRISHOP</title>

<script type="text/javascript" src="script/jquery.js"></script>
<script type="text/javascript" src="script/validate.js"></script>
<script type="text/javascript" src="rules.js"></script>
</head>
<div id="wrapper">
<?php include('topshelf.php');
include('header.php'); ?>
	
	<div id="con1">
		<div class="holder">
		<?php
$error = (isset($_GET['error']) ? $_GET['error'] : null);
if($error=='Fill'){
	echo "Please fill up all information";
	
}
else if($error=='email'){
	echo "Invalid Email address";
	
}
else if($error=='user'){
	echo "Username already exists please choose another";
	
}
else{
	
}
$c = (isset($_GET['c']) ? $_GET['c'] : null);
?>

<form id="reguser" action="write.php" method="post">
<table>
<tr><td>First Name</td><td><input type="text" name="fname" value=""></td></tr>
<tr><td>Last Name</td><td><input type="text" name="lname"value=""></td></tr>
<tr><td>Gender</td><td>
<select class="gender" id="gender" name="gender"> 
			<option value="" selected="selected"></option>
<option value="Male" >Male</option>
<option value="Female" >Female</option>

		</select>
</td></tr>
<tr><td>Birthday</td><td><input type="text" name="bdy" placeholder="YYYY" value=""><input type="text" name="bdm" placeholder="MM" value=""><input type="text" name="bdd" placeholder="DD" value=""></td></tr>
<tr><td>E-mail</td><td><input type="text" name="email" value=""></td></tr>
<tr><td>Username</td><td><input type="text" name="username" value=""></td></tr>
<tr><td>Password</td><td><input type="password" name="password" id="password"value=""></td></tr>
<tr><td>Confirm Password</td><td><input type="password" name="confirmpassword" value=""></td></tr>
<tr><td>Contact</td><td><input type="text" name="contact" value=""></td></tr>
<tr><td>Address</td><td><input type="text" name="address" value=""></td></tr>
<tr><td>City</td><td><input type="text" name="city" value=""></td></tr>
<tr><th colspan="2"><input type="submit" value="Submit"></th></tr>
</table>
<input type="hidden" name="c" value="<?php echo $c; ?>">
</form>
		</div>
	</div>

	<div id="footer"></div>
</div>
</body>
</html>