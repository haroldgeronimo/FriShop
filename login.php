<!DOCTYPE html> 
<?php include('connect-db.php');?>
<head>
<title>LOGIN | FRISHOP</title>
       
        <link href="admin/css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
        <link href="admin/css/bootstrap-responsive.css" rel="stylesheet" type="text/css" media="screen">
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="screen">
        <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
        <link rel="stylesheet" href="css/style.css" type="text/css">
		<link href="jquery-ui.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="styles/style.css">

</head>

<script src="admin/js/jquery.js" type="text/javascript"></script>
    <script src="admin/js/bootstrap.js" type="text/javascript"></script>



    <link rel="stylesheet" href="admin/themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="admin/themes/light/light.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="admin/themes/dark/dark.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="admin/themes/bar/bar.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="admin/css/nivo-slider.css" type="text/css" media="screen" /> 

    <script type="text/javascript" src="admin/js/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            $(window).load(function() {
                $('#slider').nivoSlider();
            });
        });
    </script>

    <script language="javascript" type="text/javascript">
        /* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
        <!-- Begin
        var timerID = null;
        var timerRunning = false;
        function stopclock (){
            if(timerRunning)
                clearTimeout(timerID);
            timerRunning = false;
        }
        function showtime () {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds()
            var timeValue = "" + ((hours >12) ? hours -12 :hours)
            if (timeValue == "0") timeValue = 12;
            timeValue += ((minutes < 10) ? ":0" : ":") + minutes
            timeValue += ((seconds < 10) ? ":0" : ":") + seconds
            timeValue += (hours >= 12) ? " P.M." : " A.M."
            document.clock.face.value = timeValue;
            timerID = setTimeout("showtime()",1000);
            timerRunning = true;
        }
        function startclock() {
            stopclock();
            showtime();
        }
        window.onload=startclock;
        // End -->
    </SCRIPT>	
<div id="wrapper">
	<?php 
include('header.php');
?>
	<div id="con1">
	
	    <div class="holder"><?php
include('connect-db.php');

session_start();
$fr = (isset($_GET['fr']) ? $_GET['fr'] : null);
$loginattemp = (isset($_GET['loginattemp']) ? $_GET['loginattemp'] : null);

if(empty($_SESSION['AccID'])){

	if($loginattemp == 'failed'){
		echo "<center>";
		echo "Invalid username or password";
		echo "<center>";
		
	}
$c = (isset($_GET['c']) ? $_GET['c'] : null);	
echo "<form action='loginmethod.php' method='POST'>";
echo "<table style='margin:auto;'>";
echo "<tr><td>Username:</td><td><input type='text' name='username'/></td></tr>";
echo "<tr><td>Password:</td><td><input type='password' name='password'/></td></tr>";
echo "<tr><td colspan='2'><center><input type='submit' value='Log In'/></center></td></tr>";
echo "<tr><td colspan='2'><center><a href='register.php'><input type='button' value='Register'/></a></center></td></tr>";
echo "</table>";
echo "<input type='hidden' name='c' value='$c'>";
echo "</form>";


}
else{
header("Location:index.php");
}
$mysqli->close();
?></div>

	<div id="footer"></div>
</div>
</body>
</html>


