<?php
	session_start();
?>

 <html>
<body bgcolor="#fff3e5">
<?php
	 $cid=$_POST["cid"];
	 $cod=$_POST["cod"];
	 $norm=$_POST["txtroom"];
     $hotel=$_POST["txthotel"];
	 $type=$_POST["txttype"];
	 $spreq=$_POST["txtspanyreq"];
	include "connection.php";

	$ddiff=floor(strtotime($cod)-strtotime($cid))/86400;
	$_SESSION['datediff']=$ddiff;


	if($ddiff<0)
	{
		$message = "CheckIn Date cant be greater than Checkout Date :()";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<script>window.location='reservation.php';</script>";
	}

	else
	{

	$con=mysqli_connect("localhost","root","",'hotelmanagement');
	$qq=mysqli_query($con,"select * from reservation");
	$row1=mysqli_fetch_array($qq);
	$id1=mysqli_num_rows($qq)+1;


 $b_rooms=0;
 // echo $b_rooms;

 // $query = "select sum(`r_rooms`) as booked_rooms from `reservation` where `r_chkoutdt`>'$cid' and `r_type`='$type'";
 $query = "select sum(`r_rooms`) as booked_rooms from `reservation` where (`r_chkoutdt`>'$cid' and `r_chkindt`<'$cod'  and `r_type`='$type')";
 $new=mysqli_query($con,$query);

 while ($row = mysqli_fetch_assoc($new)) {
  		$b_rooms= $row['booked_rooms'];
 }
    $hotel_query="select hotel_id from hotel where hotel_name='$hotel'";
    $hotel_query_q=mysqli_query($con,$hotel_query);
    $temp=mysqli_fetch_array($hotel_query_q);
	
    $totalrooms_query="SELECT totroom FROM `tariff` where `type`='$type' and hotel_id=$temp[0]";
	$totalrooms_query_q=mysqli_query($con,$totalrooms_query);
	$t_rooms=0;
	while ($row = mysqli_fetch_assoc($totalrooms_query_q)) {
  		$t_rooms= $row['totroom'];
    }

 	$a_rooms=$t_rooms-$b_rooms;

 	if($norm>$a_rooms)
 	{
 		$message = "Sorry only ".$a_rooms." remaning in ".$type." category on your chosen dates:()";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<script>window.location='reservation.php';</script>";
 	}
 	else
 	{
 	$qins=mysqli_query ($con,"INSERT INTO `reservation`
	(`r_id`,`r_chkindt`,`r_chkoutdt`,`r_rooms`,`r_type`,`r_spanyreq`,`hotel_id`)VALUES
	('$id1','$cid','$cod','$norm','$type','$spreq','$temp[0]');");

		if($qins)
		{
				 $app="update tariff set avroom=avroom-$norm where type='$type' and hotel_id=$temp[0]";
				 mysqli_query($con,$app);

		}

		$username = $_SESSION['username'];

		mysqli_query ($con,"INSERT INTO `maprt`
		(`r_id`,`type`,`hotel_id`)VALUES
		('$id1','$type','$temp[0]');");

		$_SESSION['rid']=$id1;

		mysqli_query ($con,"INSERT INTO `mapur`
		(`Userid`,`r_id`)VALUES
		('$username','$id1');");

		$qq=mysqli_query($con,"select max(room_number) as 'maxrn' from room where hotel_id=$temp[0] and type='$type'");

		while($res = mysqli_fetch_assoc($qq)){
			$roomno = $res['maxrn'];
		}

		for ($x = 1; $x <= $norm; $x++) {

			$roomno = $roomno +1;

			mysqli_query ($con,"INSERT INTO `maprr`
			(`r_id`,`room_number`,`hotel_id`)VALUES
			('$id1','$roomno','$temp[0]');");

			$r=mysqli_query ($con,"INSERT INTO `room`
			(`room_number`,`r_id`,`type`,`CheckIn Date`,`CheckOut Date`,`hotel_id`)VALUES
			('$roomno','$id1','$type','$cid','$cod','$temp[0]');");
            
            if (!$r) {
            printf("Error: %s\n", mysqli_error($con));
            exit();
            }

		}

	$message = "Booking Successful!";

	$_SESSION['norm']=$norm;
	$_SESSION['type']=$type;
    $_SESSION['hotel_name']=$hotel;
    $_SESSION['hotel_id']=$temp[0];

	echo "<script type='text/javascript'>alert('$message');</script>";

	echo "<script>window.location='bill.php';</script>";
 	}
  //$qins="insert into reservation (r_id,r_chkindt,r_chkoutdt,r_rooms,r_type,r_name,r_email,r_company,r_phone,r_address,r_spanyreq) values('$id1','$cid','$cod','$norm','$type','$name','$email','$comp','$tele','$addr','$spreq')";
	//$tarcon=mysqli_connect("localhost","root","root",'tariff');

	}

?>
</body>
</html>
