<html>
<body>
<?php
include('connect-db.php');
$c = (isset($_POST['c']) ? $_POST['c'] : null);
$username = $_POST['username'];
$password = $_POST['password'];

session_start();
$_SESSION ['username'] = $username;
$_SESSION ['password'] = $password;

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
if ($result = $mysqli->query("SELECT * FROM accounts WHERE Username='".$username."' AND Password='".$password."'"))
{
// display records if there are records to display
			if ($result->num_rows > 0)
			{
			
			while ($row = $result->fetch_object())
			{
		
			$_SESSION['AccID']=$row->AccID; 
				$id = $row->AccID;
				echo "mayron";
				if($c==1){
							
		if ($result2 = $mysqli->query("UPDATE cart
SET AccID='$id', user_ip=''
WHERE user_ip='$ip' "))
{
// display records if there are records to display
	
		header("Location:cart.php");
	
	
}
					
				}
		
header("Location:profile.php");		
			}

	
			}
			// if there are no records in the database, display an alert message
			else
			{
			echo "No accounts found";
			
			session_destroy();
			
			header("Location:login.php?loginattemp=failed");
			}
}



exit;


?>


</body>
</html>