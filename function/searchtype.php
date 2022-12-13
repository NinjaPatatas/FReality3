<?php 
        if($_GET['search']=="categories"){
        $query = "select * from houseinfo where Category = '".$_GET['id']."'";
        $res = mysqli_query($con,$query);
        $row = mysqli_fetch_array($res);
        }elseif($_GET['search']=="style"){
        $query = "select * from houseinfo where Style = '".$_GET['id']."'";
        $res = mysqli_query($con,$query);
        $row = mysqli_fetch_array($res);
        }else{
         $query = "select * from houseinfo where ID = '".$_GET['id']."'";
        $res = mysqli_query($con,$query);
        $row = mysqli_fetch_array($res);   
        }
    ?>