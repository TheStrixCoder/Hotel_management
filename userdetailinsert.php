<?php
session_start();
?>
<?php

        
    if ($_POST['token'] == $_SESSION['token'])
    {
        $server="localhost";
        $unm="root";
        $pwd="";
        $db="hotelmanagement";
        $l=mysqli_connect($server,$unm,$pwd,$db);
        //$l=mysqli_connect("localhost","root","root","hotel");
        $userid=mysqli_real_escape_string($l,$_POST["username"]);
        $password=mysqli_real_escape_string($l,$_POST['password']);
        $username=mysqli_real_escape_string($l,$_POST['txtname']);
        $useremail=mysqli_real_escape_string($l,$_POST['txtemail']);
        $usercompany=mysqli_real_escape_string($l,$_POST['txtcompany']);
        $userphone=mysqli_real_escape_string($l,$_POST['txtnumber']);
        $useraddress=mysqli_real_escape_string($l,$_POST['txtaddress']);


        $qiu=mysqli_query ($l,"INSERT INTO `user`
        (`Userid`,`password`,`User Name`,`User Email`,`User Company`,`User Phone`,`User Address`)VALUES
        ('$userid',
        '$password','$username','$useremail','$usercompany','$userphone','$useraddress');");

        if(!$qiu)
        {
            $message = "Sorry! Username already taken :()";
            echo "<script type='text/javascript'>alert('$message');</script>";
            echo "<script>window.location='userinfo.php';</script>";
        }
        header("location:login.php?flag=1");
    }
    else
    {
            $message = "Sorry! Session Expired :()";
            echo "<script type='text/javascript'>alert('$message');</script>";
            echo "<script>window.location='userinfo.php';</script>";
    }
    

?>
