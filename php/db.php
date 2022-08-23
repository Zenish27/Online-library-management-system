<?php
    $server="localhost";
    $user="root";
    $db="lms";
    $pwd="";
    $conn=mysqli_connect($server,$user,$pwd,$db);
    if(!$conn){
        die("Failed to connect".mysqli_connect_error());
    }
    
?>