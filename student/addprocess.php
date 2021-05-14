<?php

//Add DB Connection
include ("dbconnect.php");

//Retrieve data from form
$pic = $_POST['propName'];
$prole = $_POST['Role'];
//HASHING THE PASSWORD
//$hash = password_hash($ppassword, PASSWORD_DEFAULT);

//SQL insert & SQL INJECTION PREVENTION (create)
// $stmt = $con->prepare("INSERT INTO lecture(lectID, lectName, roleID ,lectPass) VALUES(?, ?, ?, ?)");
// $stmt->bind_Param("sssssss", $pic, $pname,$prole, $hash);

// $stmt->execute();

$sql = "INSERT INTO tb_proposal (propName, proptype) VALUES ('$pic','$prole')" ; 

//Check SQL Output
//var_dump($sql);

//Execute SQL
mysqli_query($con, $sql);

//Close connection
//$stmt->close();
mysqli_close($con);

//redirect page
header('Location:student.php');

?>