
<?php 
include('function/config.php');
if(isset($_POST['delcart'])){
	$query = "delete from dreamlist where ID = '".$_POST['id']."'";
	echo $query;
	$res = mysqli_query($con,$query);
	mysqli_query($con,$query);
	echo "<script language='javascript' type='text/javascript'> location.href='dream.php' </script>";
}
?>