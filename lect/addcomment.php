<?php
    // include ('dbsession.php');




  // if($_SESSION['c_ic']!='ADMIN')
  // {
  // header('location:../index.php');
  // }

    include('dbconnect.php');

    $wid =$_POST['wid'];
    $comment = $_POST['comment'];


     //UPDATE STATUS
    $sql = "UPDATE tb_proposal
            SET evalComment = '$comment'
            WHERE proposalID = '$wid' ";

 var_dump($sql);     

    $result = mysqli_query($con,$sql);
    mysqli_close($con);     

   header('Location:viewcomment.php?id= '.$wid.'');

?>