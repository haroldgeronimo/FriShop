<!DOCTYPE html> 
<head>
<title>FRI.SHOP</title>
       
        <link href="admin/css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
        <link href="admin/css/bootstrap-responsive.css" rel="stylesheet" type="text/css" media="screen">
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="screen">
        <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
       <!-- <link rel="stylesheet" href="css/style.css" type="text/css"> -->
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
<?php include('topshelf.php'); 
include('header.php');?>
	
	<div id="con1">
	
	                    <div class="slider-wrapper theme-default">
	                <div id="slider" class="nivoSlider">
                    <img src="admin/images/banner1.jpg" data-thumb="images/toystory.jpg" alt="" />
                    <img src="admin/images/bag1.jpg" data-thumb="images/toystory.jpg" alt="" />
                    <img src="admin/images/bag2.jpg" data-thumb="images/wineries.jpg" alt="" />
                    <img src="admin/images/bag3.jpg"  alt="" data-transition="slideInLeft" />
                           
        </div>

                     
        </div>
		

							
							<?php include ('modal_latest.php');?>
                        
		<div class="holder"></div>
	</div>
	<div id="con2">
		<div class="holder"></div>
	</div>
	<div id="con3">
		<div class="holder"></div>
	</div>
	<div id="footer"></div>
</div>
</body>
</html>