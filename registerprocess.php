<?php

//Add DB Connection
include ("dbconnect.php");

//Retrieve data from form
$pic = $_POST['pic'];
$pname = $_POST['pname'];
$pemail = $_POST['pemail'];
$paddress = $_POST['paddress'];
$pcontact = $_POST['pcontact'];
$ppassword = $_POST['ppassword'];
$gender = $_POST['gender'];

//HASHING THE PASSWORD
$hash = password_hash($ppassword, PASSWORD_DEFAULT);

//SQL insert & SQL INJECTION PREVENTION (create)
$stmt = $con->prepare("INSERT INTO tb_customer(c_ic, c_name, c_mail ,c_contact, c_address, c_password, c_gender) VALUES(?, ?, ?, ?, ?, ? , ?)");
$stmt->bind_Param("sssssss", $pic, $pname,$pemail, $pcontact, $paddress, $hash, $gender);

$stmt->execute();



//Check SQL Output
//var_dump($sql);

//Execute SQL
mysqli_query($con, $sql);

//Close connection
$stmt->close();
mysqli_close($con);

//redirect page
header('Location:loginconfirmation.php');

?>