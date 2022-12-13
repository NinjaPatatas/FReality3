<?php 
$datenow=date('m/d/y');
if(isset($_POST['submit1'])){
    $_SESSION['houseid']=$_GET['id'];
    $squery="INSERT into reviews values ('','".$_GET['id']."','".$_POST['review']."','".$_POST['name1']."','".$_POST['rating']."','".$datenow."','".$_POST['email']."','')";
    mysqli_query($con,$squery);


}

?>