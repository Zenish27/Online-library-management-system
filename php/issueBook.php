<?php
    include "db.php";

    $bookid=$_POST['bookid'];
    $bookname=$_POST['bookname'];
    $studentname=$_POST['studentname'];
    $studentemail=$_POST['studentemail'];

    $getdate=$_POST['date'];
    $days=$_POST['days'];
    $returnDate=date('d/m/Y', strtotime($getdate.'+'.$days.'days'));

    $r="SELECT * FROM userdata WHERE email='$studentemail'";
    $res1=mysqli_query($conn,$r);
    while($row=mysqli_fetch_assoc($res1)){
        $studentfaculty=$row['faculty'];
    }

    $q="SELECT * FROM book WHERE bookid='$bookid'";
    $res=mysqli_query($conn,$q);
    while($row1=mysqli_fetch_assoc($res)){
        $bookava=$row1['bookava'];
        $bookrent=$row1['bookrent'];
    }

    if(($bookid && $bookname && $studentname && $studentemail && $getdate && $days && $studentfaculty)==null){
        $addmsg="Insert Value";
        header ("Location:../html/adminIssueBook.php?msg=$addmsg");
    }
    else{
        $sql="INSERT INTO issuebook (id,bookid,bookname,studentname, studentemail,faculty, issuedate, issuedays, issuereturn, fine)VALUES('','$bookid', '$bookname','$studentname', '$studentemail','$studentfaculty', '$getdate', '$days', '$returnDate', 0)";
        $res = mysqli_query($conn, $sql);
       
        if($res) {
            
         $update="UPDATE book SET bookava='$bookava'-1, bookrent='$bookrent'+1 where bookid='$bookid'";
         $res1=mysqli_query($conn,$update);
           $addmsg="success";
           header ("Location:../html/adminIssueBook.php?msg=$addmsg");
           }
        
        
    }

    
?>