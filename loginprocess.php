<?php
    session_start();   //start session
    


//Get DB Connection
    include("dbconnect.php");
    $pic =$_POST['pic'];
    $ppassword =$_POST['ppassword'];

    //Get User Info (Retrieve)
    $sql = "SELECT * FROM tb_customer WHERE c_ic='$pic' ";

    //Execute SQL
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result);


    if(password_verify($ppassword, $row['c_password']))
    {

   //Check data exist
    $count=mysqli_num_rows($result);


    //check login
    if($count==1)
    {
        //Set session
        $_SESSION['c_ic']= session_id();
        $_SESSION['c_ic']= $pic; //to store user ID

        if($row['c_ic'] == 'ADMIN')
        {
            
            header('Location: admin/admin.php');
        }
        else
        {
            header('Location: booking/booking.php');
               
        }
    }
    }
    else
    {
        $message = "Username and/or Password incorrect.\\nTry again.";
        echo "<script type='text/javascript'>alert('$message'); window.location.href='login.php';</script>";

    }



    //close db connection
    mysqli_close($con);
?>

