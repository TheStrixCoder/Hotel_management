<?php
session_start();
?>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
	<title>index page</title>
    <script type="text/javascript">
            function cycleBackgrounds() {
            var index = 0;

            $imageEls = $('.container1 .slide'); // Get the images to be cycled.

            setInterval(function () {
                // Get the next index.  If at end, restart to the beginning.
                index = index + 1 < $imageEls.length ? index + 1 : 0;

                // Show the next
                $imageEls.eq(index).addClass('show');

                // Hide the previous
                $imageEls.eq(index - 1).removeClass('show');
                }, 2000);
            };

        // Document Ready.
            $(function () {
                cycleBackgrounds();
            });
    </script>
</head>
<body>

	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="index.php">Four Seasons</a>
	    </div>
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li><a href=home.php>Home</a></li>
	        <li><a href=accommodation.php>Accomodation</a></li>
					<li><a href=tariff.php>Tariff and Policies</a></li>
                    <?php
                    if (isset($_SESSION['isUser']))
                        echo "<li><a href='Reservation.php'>Reservation</a></b>"; 
                    ?>
					<li><a href=aboutus.php>About Us</a></li>
	      </ul>
            <ul class="nav navbar-nav navbar-right">
            <?php
                    if (isset($_SESSION['isUser']))
                    {
                        echo "<li><a href='logout.php'>Hello ".$_SESSION['username']."</a></b>";
                        echo "<li><a href='bookings.php'>Your Bookings</a></b>";
                    }
                    else
                    {
                        echo '<li><a href="Login.php">Login</a></b>';
                        //echo '<b><a href="login.php">SignIn</a></b>';
                    }
            ?>
            </ul>
            
            <!--
				<ul class="nav navbar-nav navbar-right">
                    <li><a href="login.php">Login</a></li>
                </ul>
-->
	    </div>
	  </div>
	</nav>
<!--
	<div class="container-fluid" >
		<img src="image/suite.jpeg" width=100% height=100%>
	</div>
-->
    <div class="container1">
        <div class="slide show" style="background: url(image/myroom.jpg) no-repeat;"></div>
        <div class="slide" style="background: url(image/image2.jpg) no-repeat;"></div>
        <div class="slide" style="background: url(image/image3.jpg) no-repeat;"></div>
        <div class="slide" style="background: url(image/image4.jpg) no-repeat;"></div>
    </div>
	<br />
	<script src="js/bootstrap.min.js"></script>
</body>

</html>
