<!DOCTYPE html> 
<head>
<link rel="stylesheet" type="text/css" href="styles/style.css">
<title>REGISTER | FRISHOP</title>
</head>
<div id="wrapper">
<?php include('topshelf.php'); ?>
	<div id="header">
		<div id="headcon">
			<a href="index.php"><div id="logo"></div></a>
			<div id="search">
				<form action="store.php">
				<div id="searchtable">
					<table>
						<tr><td><input id="qtext" type="text" name="q" placeholder="Search for products, brands, etc."/></td><td><input id="searchq" type="submit" value="Search"/></td></tr>
					</table>
					</div>
				</form>
			</div>
			<a href="cart.php">	<div id="cart"></div></a>
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
	<div id="con1">
		<div class="holder">
<?php
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
$c = (isset($_GET['c']) ? $_GET['c'] : null);
$_POST['bday'] = $_POST['bdy']."-".$_POST['bdm']."-".$_POST['bdd'];

 $fname =$_POST['fname'];
$lname =$_POST['lname'];
$bday =$_POST['bday'];
$email =$_POST['email'];
 $address =$_POST['address'];
$username =$_POST['username'];
$password =$_POST['password'];
$gender = $_POST['gender'];
$contact = $_POST['contact'];
$address = $_POST['address'];
$city = $_POST['city'];
include('connect-db.php');
if($fname == null || $lname == null || $bday == null || $email == null || $address == null ||$username == null ||$password == null || $fname == "" || $lname == "" || $bday == "" || $email == "" || $address == "" ||$username == "" ||$password == "" || $gender == "" || $contact == "" || $address == "" | $city == ""
){
	header("Location:register.php?error=Fill");
	exit();
}/*
elseif (strpos($email, '@') !== true && strpos($email, '') !== true) {
   header("Location:register.php?error=email");
   
}*/



else if ($result = $mysqli->query("SELECT *  FROM accounts WHERE Username='$username'")) {
   if ($result->num_rows > 0)
			{
				header("Location:register.php?error=user");
	exit();
				
				
			}
			
			else {
   
}

}


if ($mysqli->query("INSERT INTO accounts  (FirstName,LastName,Birthdate,Gender,Address,City,Contact,Username,Password,Email)
	VALUES('$fname','$lname','$bday','$gender','$address','$city','$contact','$username','$password','$email')")) {
    echo "You've Succesfully Registered";
	echo '<br>';
	echo '<a href="index.php">Go back to Home</a>';
} else {
    echo "Error Registering: " ;
}

			
		if ($result = $mysqli->query("SELECT * FROM accounts WHERE Username='$username' AND Password='$password'"))
{
// display records if there are records to display
			if ($result->num_rows > 0)
			{
		
			while ($row = $result->fetch_object())
			{
				
					$_SESSION['AccID'] = $row->AccID;
						$id = $row->AccID;
				if($c==1){
						
		if ($result2 = $mysqli->query("UPDATE cart
SET AccID='$id', user_ip=''
WHERE user_ip='$ip' "))
{
// display records if there are records to display
			if ($result2->num_rows > 0)
			{
			
			while ($row2 = $result2->fetch_object())
{		header("Location:cart.php");
	
	
}}}
					
				}
			
				header("Location:profile.php");
				
			}
			}
}


$mysqli->close();
header("Location:index.php");
?>

</div>
	</div>

	<div id="footer"></div>
</div>
</body>
</html>