<div id="panel">
<div class="holder3">
<div id="paneltext" style="float:right;"><?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('connect-db.php');
if(!isset($_SESSION['AccID'])){
echo " Already have an account? <a href='login.php'>Login</a> | New Here? <a href='register.php'>Sign-Up</a>"; 
	}
else{
	$AccID = $_SESSION['AccID'];
		if ($result = $mysqli->query("SELECT * FROM accounts WHERE AccID='$AccID'")){
			if ($result->num_rows > 0)
			{
				while ($row = $result->fetch_object()){
					$name = $row->FirstName;
		
				}
			}
		}

		echo " Hi <a href='profile.php'>$name</a> |  <a href='logoutmethod.php'>Logout</a>"; 
	}
?>
</div>
</div>
</div>