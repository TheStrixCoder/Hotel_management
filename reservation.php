<?php
session_start();
?><html>
<head>
	<script language=javascript src="function.js">
	</script>
	<script language=javascript>

		function checkout()
		{
			var i=0;
			for(x=0;x<document.f1.elements.length;x++)
			{
				if(document.f1.elements[x].value=="")
				{
					f1.txtname.focus();
					alert("Pls Enter All Value");
					i=1;
					break;
				}
			}

			if(i==0)
			{
				f1.method="POST";
				f1.action="addres.php";
				f1.submit();
			}
		}
	</script>
</head>
<body bgcolor="#fff">
<?php
	include "connection.php";
	include "index6.php";
?>
<br><br>
<form action="addres.php" method="POST" name="f1">
<br><br>
<table  border=0 align=center>
<tr>
	<th align=left>Check-in Date   :</th>
	<td>
		 <input type="date" name="cid" max="2979-12-31" ><br>
	</td>
</tr>
<tr></tr>
<tr>
	<th align=left>Check-out Date   :</th>
	<td>
		 <input type="date" name="cod" max="2979-12-31"><br>
	</td>
</tr>
<tr>
	<th align=left>No Of Rooms   :</th>
	<td><select name=txtroom>
	<?php
	for($i=1;$i<=20;$i++)
	{
		echo "<option value=$i>$i</option>";
	}
	?>
	</select></td>
	<th align=left>Type   :</th>
	<td>
	<?php
		echo "<select name=txttype>";
		$qup="select * from tariff group by type";
        $query2="select * from hotel";
		$con=mysqli_connect("localhost","root","",'hotelmanagement');
		$rs=mysqli_query($con,$qup);
        $hn=mysqli_query($con,$query2);
		while($res=mysqli_fetch_row($rs))
		{
			echo "<option value='".$res[0]."'>".$res[0]."</option>";
		}
		echo "<select>";
		echo "</td>";
	?>
	<td><a href=tariff.php>Tariff</a></td>
</tr>
<tr>
    <th align=left>Hotel Name:</th>
    <td>
	<?php
		echo "<select name=txthotel>";
        $query2="select * from hotel";
		$con=mysqli_connect("localhost","root","",'hotelmanagement');
        $hn=mysqli_query($con,$query2);
		while($res=mysqli_fetch_row($hn))
		{
			echo "<option value='".$res[1]."'>".$res[1]."</option>";
		}
		echo "<select>";
		echo "</td>";
	?>
    </td>
</tr>

<tr>
	<th align=left>Full Name   :</th>
	<td colspan=4><input type=text name=txtname size=50 disabled
        value="<?php
        $user=$_SESSION['username'];
        $query="select `User Name` from `user` where Userid='$user'";
        $con=mysqli_connect("localhost","root","",'hotelmanagement');
        $hn=mysqli_query($con,$query);
        $res=mysqli_fetch_row($hn);
        echo htmlentities($res[0]);
        ?>"></td>
</tr>
<tr>
	<th align=left>Email   :</th>
	<td colspan=4><input type="text" name="txtemail" size=50 disabled
                value="<?php
        $user=$_SESSION['username'];
        $query="select `User Email` from `user` where Userid='$user'";
        $con=mysqli_connect("localhost","root","",'hotelmanagement');
        $hn=mysqli_query($con,$query);
        $res=mysqli_fetch_row($hn);
        echo htmlentities($res[0]);
        ?>"></td>
</tr>
<tr>
	<th align=left>Company   :</th>
	<td colspan=4><input type=text name=txtcompany size=50 disabled
            value="<?php
        $user=$_SESSION['username'];
        $query="select `User Company` from `user` where Userid='$user'";
        $con=mysqli_connect("localhost","root","",'hotelmanagement');
        $hn=mysqli_query($con,$query);
        $res=mysqli_fetch_row($hn);
        echo htmlentities($res[0]);
        ?>"></td>
</tr>
<tr>
	<th align=left>Telephone   :</th>
	<td colspan=4><input type="text" name="txtnumber" size=50 disabled
            value="<?php
        $user=$_SESSION['username'];
        $query="select `User Phone` from `user` where Userid='$user'";
        $con=mysqli_connect("localhost","root","",'hotelmanagement');
        $hn=mysqli_query($con,$query);
        $res=mysqli_fetch_row($hn);
        echo htmlentities($res[0]);
        ?>" ></td>
</tr>
<tr>
	<th align=left valign=top>Address   :</th>
	<td colspan=4><textarea name=txtaddress rows=5 cols=45 disabled><?php
        $user=$_SESSION['username'];
        $query="select `User Address` from `user` where Userid='$user'";
        $con=mysqli_connect("localhost","root","",'hotelmanagement');
        $hn=mysqli_query($con,$query);
        $res=mysqli_fetch_row($hn);
        echo htmlentities($res[0]);
        ?>
        </textarea></td>
</tr>
<tr>
	<th align=left>Special Requirements, if any  :</th>
	<td colspan=4><textarea name=txtspanyreq rows=5 cols=45></textarea>
</tr>
<br />
<br />
<tr>
	<td colspan=2 align=center><input type=button name=s1 value="submit" onClick="checkout()">
	<input type=reset name=s2 value="clear"><a href=reservation.php></a></td>
</tr>
</table>
</form>
</body>
</html>
