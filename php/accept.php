<?php
    include "db.php";
    $id=$_GET['id'];
    // echo $id;

    $s="SELECT * FROM requestbook WHERE id='$id'";
    $res=mysqli_query($conn,$s);
    while($row=mysqli_fetch_assoc($res)){
        $bookid = $row['bookid'];
        $bookname=$row['bookname'];
        $studentname=$row['studentname'];
        $studentemail=$row['studentemail'];
        $faculty=$row['faculty'];   
        
    }
    // echo $bookid;
    $q="SELECT * FROM book WHERE bookid='$bookid'";
    $res=mysqli_query($conn,$q);
    while($row1=mysqli_fetch_assoc($res)){
        $bookava=$row1['bookava'];
        $bookrent=$row1['bookrent'];
    }
    
    $date=Date("Y-m-d");
    $days=30;
    $returnDate=date('Y-m-d', strtotime($date.'+'.$days.'days'));
   
    $sql="INSERT INTO issuebook (id,bookid,bookname,studentname, studentemail, issuedate, issuedays, issuereturn, fine)VALUES('','$bookid', '$bookname','$studentname', '$studentemail', '$date', '$days', '$returnDate', 0)";
    $res = mysqli_query($conn, $sql);
    if($res) {
        $update="UPDATE book SET bookava='$bookava'-1, bookrent='$bookrent'+1 where bookid='$bookid'";
        $res1=mysqli_query($conn,$update);
        $update1="DELETE FROM requestbook WHERE id='$id'";
        $res2=mysqli_query($conn,$update1);
       $addmsg="success";
       header ("Location:../html/bookRequest.php?msg=done");
       }

?>