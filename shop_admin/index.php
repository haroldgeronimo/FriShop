<html>
<head>
<title>FRISHOP Admin | Log-in</title>
<link rel="stylesheet" href="style/style.css"/>
</head>
<script>
window.onload = function() {
    if(!window.location.hash) {
        window.location = window.location + '#loaded';
        window.location.reload();
    }
}
</script>
<body>
<?php
$loginattemp = (isset($_GET['loginattemp']) ? $_GET['loginattemp'] : null);
session_start();
if(isset($_SESSION['empid'])){

}
?>
<div id="wrapper">
<div id="contain">
<form action="loginrequest.php" method="POST">
<div class="error">
<?php
	if($loginattemp == 'failed'){
		
		echo "Invalid username or password";
		
	}
	else if($loginattemp == 'no_access'){
		
		echo "Access Forbidden! please Log In";
		
	}
?>
</div>
<table id="login">
<tr><td><h3>Username</h3></td><td><input class="text" type="text" name="username"></td></tr>
<tr><td><h3>Password</h3></td><td><input class="text" type="password" name="password"></td></tr>
<tr><th colspan="2"><input class="button" type="submit" value="Log-in"></th></tr>
</table>
</form>
</div>
</div>
</body>
</html>