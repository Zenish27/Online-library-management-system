<?php
include "db.php";
session_start();
$date=Date("Y-m-d");

$id=$_GET['id'];
$email=$_SESSION['email'];
$s="SELECT * FROM book WHERE id='$id'";
$res=mysqli_query($conn,$s);
while($row=mysqli_fetch_assoc($res)){
    $bookid=$row['bookid'];
    $bookname=$row['bookname'];

    $bookava=$row['bookava'];

}
$r="SELECT * FROM userdata WHERE email='$email'";
$res1=mysqli_query($conn,$r);
while($row1=mysqli_fetch_assoc($res1)){
    $name=$row1['name'];
    $faculty=$row1['faculty'];
 
}
if($bookava>0){
    $sql="INSERT INTO requestbook (id,bookid,bookname,studentname, studentemail, faculty)VALUES('','$bookid', '$bookname','$name', '$email', '$faculty')";
    $result = mysqli_query($conn, $sql);
    if($result) {
       $addmsg="success";
       header ("Location:../html/userSearch.php?msg=$addmsg");
       }
}
else{
    $addmsg="Out of Stock";
    header ("Location:../html/userSearch.php?msg=$addmsg");
}

?>