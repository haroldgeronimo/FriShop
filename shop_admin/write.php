
<?php

$_POST['bday'] = $_POST['bdy']."-".$_POST['bdm']."-".$_POST['bdd'];

 $fname =$_POST['fname'];
$lname =$_POST['lname'];
$bday =$_POST['bday'];
$username =$_POST['username'];
$password =$_POST['password'];
$gender = $_POST['gender'];
$contact = $_POST['contact'];
include('../connect-db.php');
if($fname == null || $lname == null || $bday == null ||  $username == null ||$password == null || $fname == "" || $lname == "" || $bday == ""  ||$username == "" ||$password == "" || $gender == "" || $contact == "" 
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


if ($mysqli->query("INSERT INTO admin  (FName,LName,Birthday,Gender,Contact,username,password,position)
	VALUES('$fname','$lname','$bday','$gender','$contact','$username','$password','courier')")) {
    echo "You've Succesfully Registered";
	echo '<br>';
	echo '<a href="index.php">Go back to Home</a>';
} else {
    echo "Error Registering: " ;
}

			
	

$mysqli->close();
header("Location:orders.php");
?>

