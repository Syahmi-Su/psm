<?php
    //Set DB Parameter
    $servername ="localhost";
    $username ="root";
    $password ="";
    $dbname ="psm";


    //Create connection
    $con = mysqli_connect( $servername, $username, $password, $dbname);

    //Connection checking (assignment)
    if(!$con)
    {
    	echo "Error! Could not connect." ;
    	
    }

?>