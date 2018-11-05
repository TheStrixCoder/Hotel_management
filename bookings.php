<?php
session_start();
?>
<html>
<head>
	<title>Bookings</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
</head>

<body>
<?php
	include "connection.php";
    include "index8.php";

    if(isset($_POST['delete']))    
    {    
        $delete_id=(int)$_POST['delete'];
       // echo "<h1>Deleteid:".gettype($delete_id)."</h1>";
        $query="delete from reservation where r_id=$delete_id";
        $query1="delete from room where r_id=$delete_id";
        $query2="delete from maprr where r_id=$delete_id";
        $query3="delete from maprt where r_id=$delete_id";
        $query4="delete from mapur where r_id=$delete_id";
        $res=mysqli_query($con,$query);
        if(! $res ) {
            die('Could not delete data: ' . mysql_error());
        }
        $res1=mysqli_query($con,$query1);
        $res2=mysqli_query($con,$query2);
        $res3=mysqli_query($con,$query3);
        $res4=mysqli_query($con,$query4);
    }
    
?>
    
    </br>
<div id = "heading">
	<h1>Your Hotel Bookings</h1>
</div>
<!--
<form action="tariff.php" method="post" class="container"> 
Search: <input type="text" name="term" placeholder="Enter hotel name.." size=50/> 
<input type="submit" value="Submit" class="btn btn-success"/> 
</form>
-->

<?php
	include "connection.php";
	$term="";
    $username=$_SESSION['username'];
    $query="select r_id from mapur where Userid='$username'";
	if(isset($_POST['term'])){
        $term = $_POST['term'];
    }
//    if($term=="")
//        $qrysel="select * from tariff";
//    else
//        $qrysel="select * from tariff where hotel_id like (select hotel_id from hotel where hotel_name like '%".$term."%')";
    $rs=mysqli_query($con,$query);
	if(!$rs)
	{
		echo "<font color=purple size=4>In correct mysql select Query.</font>";
		die($query);
	}
	echo "<center>";
	echo "<table class=table>";
	echo "<caption><font color='rgba(0,0,0,0.7)' size=4><b><i>Bookings</i></b></font></caption>";
	echo "<tr><th>ROOM</th><th>HOTEL</th><th colspan=2>DATE</th><th>NUMBER</th><th>CANCEL</th></tr>";
	echo "<tr><th>TYPE</th><th>NAME</th><th>CHECK-IN</th><th>CHECK-OUT</th><th>ROOMS</th><th>Reservation</th></tr>";

	while($v=mysqli_fetch_array($rs))
	{
		$querysel="select * from reservation where r_id=$v[0]";
        $res=mysqli_query($con,$querysel);
        $resf=mysqli_fetch_array($res);
        echo "<tr>";
		echo "<td>".$resf[4]."</td>";
        $qry="select hotel_name from hotel where hotel_id=$resf[6]";
        
        $r=mysqli_query($con,$qry);
        if (!$r) {
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }
        $temp=mysqli_fetch_array($r);
        echo "<td>".$temp[0]."</td>";
		echo "<td>".$resf[1]."</td>";
		echo "<td>".$resf[2]."</td>";
		echo "<td>".$resf[3]."</td>";
		echo "<form action='bookings.php' method='post' onsubmit='return confirm(\"Are you sure you want to delete?\");'>";
        echo "<input type='hidden' name='delete' value='$v[0]'>";
        echo "<td><input type='submit' class='btn btn-danger' value='cancel'></td>";
        echo "</form>";
		echo "</tr>";
	}
	echo "</table>";
?>
<br><br>
<center><table>
<tr>
	<td>
	<ul type=square>
		<li>Policies: </li>
		<ul>
			<li>Check in 12 hours.
				<li>Check out 12 hours.
				<li>Early arrival is subject to availability,For guaranted early check in,reservation needs to be made starlings form previous night.
				<li>Goverment taxes & levies extra as applicable
				<li>Inr Rs.700 (usd*60) for extra person/bed.
		</ul>
		<br>
		<li>Reservation Guarantee: </li>
			<ul>
				<li>All booking must be guaranteed at time of reservation bye money order or travel agency.
			</ul>
		<br>
		<li>Reservation Cancellation: </li>
		<ul>
			<li>Reservation must be cancelled 24 hours prior to the <br>planned arrivaltime.
			<li>One night room charge will be levied in case of non arrival.
		</ul>
	</ul>
</table>
<br />
</body>
</html>
