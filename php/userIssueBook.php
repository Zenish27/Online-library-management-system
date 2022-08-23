<?php
    include "db.php";
    session_start();

    $email = $_SESSION['email'];

    $bookid=$_POST['bookid'];
    $bookname=$_POST['bookname'];
    $date=$_POST['date'];
    $days=$_POST['days'];
    $returnDate=date('Y-m-d', strtotime($date.'+'.$days.'days'));
    
    $q="SELECT * FROM userdata WHERE email='$email'";
    $res=mysqli_query($conn,$q);
    while($row1=mysqli_fetch_assoc($res)){
        $id=$row1['id'];
        $name=$row1['name'];
        $fac=$row1['faculty'];
    }

    if(($bookid && $bookname && $date && $days)==null){
        $addmsg="Insert Value";
        header ("Location:../html/userIssue.php?msg=$addmsg");
    }
    else{
        $sql="INSERT INTO requestbook (id,bookid,studentemail,studentname, faculty, bookname, issuedate, returndate, issuedays, status)VALUES('','$bookid', '$email','$name', '$fac', '$bookname', '$date', '$returnDate', '$days',0)";
        $res = mysqli_query($conn, $sql);
        if($res) {
           $addmsg="success";
           header ("Location:../html/userIssue.php?msg=$addmsg");
           }
        
    }



?>