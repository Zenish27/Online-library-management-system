<?php
    include "db.php";

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $faculty=$_POST['faculty'];

    if(($name && $email && $pass && $faculty)==null){
        $addmsg="Insert Value";
        header ("Location:../html/addStudent.php?msg=$addmsg");
    }
  else{
        $sql="INSERT INTO userdata (name,email,password,faculty)  VALUES('$name', '$email', '$pass', '$faculty')";
        $res = mysqli_query($conn, $sql);
        if($res) {
           $addmsg="success";
           header ("Location:../html/addStudent.php?msg=$addmsg");
           }
    }
?>