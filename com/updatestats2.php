<?php
    // include ('dbsession.php');




  // if($_SESSION['c_ic']!='ADMIN')
  // {
  // header('location:../index.php');
  // }

    include('dbconnect.php');

    $fbid = $_POST['fbid'];
    $fcstatus = $_POST['fcstatus'];


     //UPDATE STATUS
    $sql = "UPDATE tb_proposal
            SET evalName2 = '$fcstatus'
            WHERE proposalID = '$fbid' ";

 //var_dump($sql);     

    $result = mysqli_query($con,$sql);
    mysqli_close($con);     

   header('Location:proposal.php?id='.$fbid.'');

?>