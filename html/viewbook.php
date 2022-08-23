<?php
    include "../php/db.php";
    session_start();
    $msg="";
    if(!empty($_REQUEST['msg'])){
		$msg=$_REQUEST['msg'];
	}
    // echo $_SESSION['loginid'];
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/secondPage.css">
        <title>
            LMS||AddBook
        </title>
</head>
<body>
<div class="container">
     <div class="head">
            <h1>Library Management System</h1>
    </div>

    <div class="sidebar">
            <button class="btn"><?php 
                                   $email = $_SESSION['email'];
                                   $sql = mysqli_query($conn,"SELECT name FROM admindata WHERE email='$email'");
                                   while($row=mysqli_fetch_assoc($sql)){
                                       $name = $row['name'];
                                       echo $name;
                                   } 
                                ?>
            </button>
            <button class="btn"><a href="adminAddBook.php">Add book</a></button>
            <button class="btn"><a href="adminBookReport.php">Book report</a></button>
            <button class="btn"><a href="bookRequest.php">book request</a></button>
            <button class="btn"><a href="addStudent.php">Add Student</a></button>
            <button class="btn"><a href="studentReport.php">student report</a></button>
            <button class="btn"><a href="adminIssueBook.php">issue book</a></button>
            <button class="btn"><a href="adminIssueReport.php">issue report</a></button>
            <button class="btn"><a href="login.php">logout</a></button>
    </div>
    <div class="rightbar">
    <Button class="btn" >BOOK Detail</Button>
    <?php
            $id = $_GET['id'];
            
                $sql="SELECT * FROM book WHERE id='$id'";
                $res = mysqli_query($conn,$sql);
                if(mysqli_num_rows($res)>0){
                while($row = mysqli_fetch_assoc($res)){
                    $img=$row['bookpic'];
                    $name=$row['bookname'];
                    $detail=$row['bookdetail'];
                    $author=$row['bookauthor'];
                    $pub=$row['bookpublication'];
                    $branch=$row['faculty'];
                    $price=$row['bookprice'];
                    $quantity=$row['bookquantity'];
                    $avai=$row['bookava'];
                    $rent=$row['bookrent'];

                    ?>
                    <div class="img">
                    <img id="image" width='200px' height='250px' style='border:1px solid #333333; float:left;margin-left:20px' src="../php/<?php echo $img;?>"/>
                    </div>
                    <div class="detail">
                        
                        <span><b>Book Name:</b><?php echo $name;?></span><br>
                        <span><b>Book Detail:</b><?php echo $detail;?></span><br>
                        <span><b>Book Author:</b><?php echo $author;?></span><br>
                        <span><b>Book Publication:</b><?php echo $pub;?></span><br>
                        <span><b>Faculty:</b><?php echo $branch;?></span><br>
                        <span><b>Book Price:</b><?php echo $price;?></span><br>
                        <span><b>Book Quantity:</b><?php echo $quantity;?></span><br>
                        <span><b>Book Available:</b><?php echo $avai;?></span><br>
                        <span><b>Book Rented:</b><?php echo $rent;?></span>
                       

                      
                    </div>
               
               <?php
                }
            }
?>
        
               
        </div>




    </body>
</html>