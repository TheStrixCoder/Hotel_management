<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<title>index page</title>
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
	    </div>
	  </div>
	</nav>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>
