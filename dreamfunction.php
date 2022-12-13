<?php
	include 'function\config.php';
    $squery="INSERT into dreamlist values ('','".$_SESSION['userid']."','".$_GET['id']."')";
    mysqli_query($con,$squery);
    header("Location: dream.php");
?>