<?php

//Add DB Connection
include ("dbconnect.php");

//Retrieve data from form
$pic = $_POST['LectID'];
$pname = $_POST['LectName'];
$prole = $_POST['Role'];
$ppassword = $_POST['password'];
//HASHING THE PASSWORD
//$hash = password_hash($ppassword, PASSWORD_DEFAULT);

//SQL insert & SQL INJECTION PREVENTION (create)
// $stmt = $con->prepare("INSERT INTO lecture(lectID, lectName, roleID ,lectPass) VALUES(?, ?, ?, ?)");
// $stmt->bind_Param("sssssss", $pic, $pname,$prole, $hash);

// $stmt->execute();

$sql = "INSERT INTO lecture (lectID, lectName, roleID ,lectPass) VALUES ('$pic','$pname','$prole','$ppassword')" ; 

//Check SQL Output
//var_dump($sql);

//Execute SQL
mysqli_query($con, $sql);

//Close connection
//$stmt->close();
mysqli_close($con);

//redirect page
header('Location:tables.php');

?>