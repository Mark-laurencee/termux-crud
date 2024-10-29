<?php

    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "crud";
    $conn = "";
    
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name,);
    
    if ($conn->connet_error){
        die("Connection failed: ". $conn->connect_error);
    }
    
?>