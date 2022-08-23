<?php
    include "db.php";

    $id=$_GET['id'];
   
    // echo $id;
    $q="SELECT * FROM issuebook WHERE id='$id'";
    $res=mysqli_query($conn,$q);
    while($row=mysqli_fetch_assoc($res)){
        $bookid=$row['bookid'];
  
        
    }
    $l="SELECT * FROM book WHERE bookid='$bookid'";
    $res1=mysqli_query($conn,$l);
    while($row1=mysqli_fetch_assoc($res1)){
        $bookava = $row1['bookava'];
        $bookrent = $row1['bookrent'];
   
    }
    
    $sql=mysqli_query($conn,"DELETE FROM issuebook WHERE id='$id' ");
    if($sql) {
            
        $update="UPDATE book SET bookava='$bookava'+1, bookrent='$bookrent'-1 where bookid='$bookid'";
        $res1=mysqli_query($conn,$update);
          $addmsg="success";
          header ("Location:../html/adminIssueBook.php?msg=$addmsg");
          }
    header("location:../html/adminIssueReport.php");

?>