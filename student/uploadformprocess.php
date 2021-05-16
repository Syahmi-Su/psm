<?php
// Include the database configuration file
include ('dbconnect.php');

// if(!session_id())
// {
//    session_start();

// }

 //$pic = $_SESSION['pic'];
 //$rid = $_POST['rid'];

$sql = "SELECT * 
        FROM tb_proposal
        WHERE proposalID = '1'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);

$statusMsg = '';
$request = 1;

if(isset($_POST['fileName']))
{ 
  $request = $_POST['fileName'];
}
$name = basename($_FILES["fileName"]["name"]);


$target_dir = "../form/";
$target_file = $target_dir.basename($_FILES["fileName"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileName"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// // Check if file already exists
// if (file_exists($target_file)) 
// {
//     echo '<script language="javascript">';
//         echo 'alert("Sorry, file already exists.");';
//         echo 'window.location= "student.php"';
//        echo '</script>';
    

//     $uploadOk = 0;
// }
// Check file size
if ($_FILES["fileName"]["size"] > 500000) {
    echo '<script language="javascript">';
        echo 'alert("Sorry, your file is too large.");';
        echo 'window.location= "student.php"';
       echo '</script>';
    
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "pdf" ) {
    echo '<script language="javascript">';
        echo 'alert("Sorry, only PDF files are allowed.");';
        echo 'window.location= "student.php"';
       echo '</script>';

    
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo '<script language="javascript">';
    echo 'alert("Sorry, your file was not uploaded.")';
    echo 'window.location= "student.php"';
   echo '</script>';

// if everything is ok, try to upload file
} else {

    if (file_exists($target_file)) unlink($target_file);

    if (move_uploaded_file($_FILES["fileName"]["tmp_name"], $target_file)) {
       
         echo '<script language="javascript">';
        echo 'alert("The file '. basename( $_FILES["fileName"]["name"]).' has been uploaded.");';
        echo 'window.location= student.php"';
       echo '</script>';
        $insert ="UPDATE tb_proposal
                 SET propform = '$name' 
                 WHERE proposalID = '1' ";
       $res = mysqli_query($con, $insert);
        mysqli_close($con);
        header('Location:student.php');
        
    } else {
       
         echo '<script language="javascript">';
        echo 'alert("Sorry, there was an error uploading your file.");';
        echo 'window.location= "student.php"';
       echo '</script>';
    }
}
?>