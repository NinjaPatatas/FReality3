<?php
	include 'function\config.php';
	$housesql="SELECT * from houseinfo where ID='".$_GET['id']."'";
	$houseres=mysqli_query($con,$housesql);
	$houserow=mysqli_fetch_array($houseres);


	$adate=date("m/d/y");
	$ndate=date('m/d/y', strtotime("+1 months", strtotime(date("m/d/y") )));
	$deposit=$houserow['Price']*0.5;
	$payement=($houserow['Price']+$deposit)-$_SESSION['discount'];

     $squery="INSERT into transaction values ('','".$_SESSION['userid']."','".$_GET['id']."','".$_POST['fname']."','".$_POST['lname']."','".$_POST['email']."','".$_POST['mnum']."','".$_POST['rfname']."','".$_POST['rlname']."','".$_POST['remail']."','".$_POST['rcnum']."','".$_POST['relation']."','".$adate."','".$deposit."','".$payement."','".$ndate."','','".$_POST['payment']."')";
    mysqli_query($con,$squery);

    $tr2="INSERT into translist values ('','".$_SESSION['userid']."','".$_GET['id']."','".$payement."','".$adate."','".$ndate."')";
    mysqli_query($con,$tr2);





    $hquery="UPDATE houseinfo SET Status='Rented' where ID='".$_GET['id']."'";
    mysqli_query($con,$hquery);

     $dquery="DELETE from dreamlist where userID ='".$_SESSION['userid']."' AND HouseID ='".$_GET['id']."'";
     mysqli_query($con,$dquery);
    header("Location: index.php");
?>