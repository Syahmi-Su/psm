<?php


    include('dbconnect.php');

    $fbid = $_POST['fbid'];
    $fcstatus = $_POST['fcstatus'];


     //UPDATE STATUS
    $sql = "UPDATE lecture
            SET domainID = '$fcstatus'
            WHERE lectID = '$fbid' ";

 //var_dump($sql);     

    $result = mysqli_query($con,$sql);
    mysqli_close($con);     

   header('Location:lecture.php');

?>