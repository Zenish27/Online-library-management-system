<?php
    include "db.php";
    session_start();
 
    $email = $_GET['email'];
    $_SESSION['email'] = $email;
    $pass = $_GET['password'];

    if($email==null||$pass==null){
        $emailMsg="";
        $passMsg="";

        if($email==null){
            $emailMsg="*Please enter your email";
        }
        if($pass==null){
            $passMsg="*Please enter your password";
        }
        header ("Location:../html/login.php?emailMsg=$emailMsg&passMsg=$passMsg");
    }
    elseif($email!=null&&$pass!=null){
    $check="SELECT * FROM admindata where email='$email' and password='$pass'";
       $res=mysqli_query($conn,$check);
       $count = mysqli_num_rows($res);  
          
       if($count == 1){  
          header("Location:../html/adminDashboard.php");
       }  
       else{  
        $msg="Invalid Credentials";
        header ("Location:../html/login.php?msg=$msg");
       }
    }
?>