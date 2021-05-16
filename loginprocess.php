<?php
    session_start();   //start session
    


//Get DB Connection
    include("dbconnect.php");
    $pic =$_POST['pic'];
    $pass =$_POST['ppassword'];

    //Get User Info (Retrieve)
    $sql1 = "SELECT * FROM admin WHERE adminID = '$pic' AND adminPass = '$pass'  ";
    $sql2 = "SELECT * FROM lecture WHERE lectID = '$pic' AND lectPass = '$pass' AND roleID = '2' ";
    $sql3 = "SELECT * FROM student  WHERE studMatric = '$pic' AND studPass = '$pass'";
    $sql4 = "SELECT * FROM lecture WHERE lectID = '$pic' AND lectPass = '$pass' AND roleID = '1' ";


    //Execute SQL
    $result1=mysqli_query($con,$sql1);
    $result2=mysqli_query($con,$sql2);
    $result3=mysqli_query($con,$sql3);
    $result4=mysqli_query($con,$sql4);
    $row1=mysqli_fetch_array($result1);
    $row2=mysqli_fetch_array($result2);
    $row3=mysqli_fetch_array($result3);
    $row4=mysqli_fetch_array($result4);


   //Check data exist
    $count1 = mysqli_num_rows($result1);
    $count2 = mysqli_num_rows($result2);
    $count3 = mysqli_num_rows($result3);
    $count4 = mysqli_num_rows($result4);



    //check login
    //check login
    if($count1 == 1)
    {
         $_SESSION['adminID'] = session_id();
         $_SESSION['adminID'] = $pic;

         header ('Location: admin/tables.php');

    }

    else if($count2 == 1  )
    {
        $_SESSION['lectID'] = session_id();
        $_SESSION['lectID'] = $pic;

        header ('Location: lect/lecture.php');
    }


    else if($count4 == 1  )
    {
        $_SESSION['lectID'] = session_id();
        $_SESSION['lectID'] = $pic;

        header ('Location: com/committee.php');
    }

    else if($count3 == 1 )
    {
        $_SESSION['studMatric'] = session_id();
        $_SESSION['studMatric'] = $pic;

        header ('Location: student/student.php');
    }

                else
            {
                $message = "Username and/or Password incorrect.\\nTry again.";
                echo "<script type='text/javascript'>alert('$message'); window.location.href='index.php';</script>";

            }


    //close db connection
    mysqli_close($con);
?>

