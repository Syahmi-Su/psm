<?php
    // include ('dbsession.php');




  // if($_SESSION['c_ic']!='ADMIN')
  // {
  // header('location:../index.php');
  // }

    include('dbconnect.php');

    $lect = $_POST['lectid'];
    // $student = $_SESSION[]; STUDENT SESSION
    $student = 'A18CS0161';

     //UPDATE STATUS
    $sql = "UPDATE tb_proposal
            SET supName = '$lect'
            WHERE studMatric = '$student' ";

    //var_dump($sql);     

    $result = mysqli_query($con,$sql);
    mysqli_close($con);     

   header('Location:superv.php');

?>