<html>
<body>
<?php
include('../connect-db.php');
$username = $_POST['username'];
$password = $_POST['password'];

session_start();



if ($result = $mysqli->query("SELECT * FROM admin WHERE username='".$username."' AND password='".$password."'"))
{
// display records if there are records to display
			if ($result->num_rows > 0)
			{
			
			while ($row = $result->fetch_object())
			{
		
			$_SESSION['empid']=$row->EMP_ID; 
$pos = $row->position;
if($pos=='admin'){
				header("Location:admin.php");
exit;}
if ($pos=='courier'){
	header("Location:courier.php");
	exit;
}
		
		
		
			}

	
			}
			// if there are no records in the database, display an alert message
			else
			{
			echo "No accounts found";
			
			session_destroy();
			
			header("Location:index.php?loginattemp=failed");
			}
}



exit;


?>


</body>
</html>