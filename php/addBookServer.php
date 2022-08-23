<?php
    include "db.php";
    
    $bookname = $_POST['bookname'];
    $bookid=$_POST['bookid'];
    $bookdetail = $_POST['bookdetail'];
    $bookauthor = $_POST['bookauthor'];
    $bookpublication=$_POST['bookpublication'];
    $tag=$_POST['booktag'];
    $branch=$_POST['faculty'];
    $bookprice=$_POST['bookprice'];
    $bookquantity=$_POST['bookquantity'];
    

    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];    
    $folder = "upload/".$filename;
    move_uploaded_file($tempname, $folder);

    if(($bookname && $bookdetail && $bookauthor && $bookpublication && $branch && $bookprice && $bookquantity &&  $filename)==null){
        $addmsg="Insert Value";
        header ("Location:../html/adminAddBook.php?msg=$addmsg");
    }
    else{
        $sql="INSERT INTO book (id,bookpic,bookname,bookid, bookdetail, bookauthor, bookpublication,booktag, faculty, bookprice,bookquantity,bookava,bookrent)VALUES('','$folder', '$bookname','$bookid', '$bookdetail', '$bookauthor', '$bookpublication','$tag', '$branch', '$bookprice', '$bookquantity','$bookquantity',0)";
        $res = mysqli_query($conn, $sql);
        if($res) {
           $addmsg="success";
           header ("Location:../html/adminAddBook.php?msg=$addmsg");
           }
        
    }
   
    


  
?>