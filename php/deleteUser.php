<?php
    include "db.php";

    $id=$_GET['id'];
    // echo $id;

    $sql=mysqli_query($conn,"DELETE FROM userdata WHERE id='$id' ");
    header("location:../html/studentReport.php");

?>