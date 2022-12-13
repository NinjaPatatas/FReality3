<?php
	include 'function\config.php';
    $squery="DELETE * from dreamlist where userID ='".$_SESSION['userid']."' AND HouseID ='".$_GET['id']."')";
    mysqli_query($con,$squery);
    header("Location: index.php");
?>