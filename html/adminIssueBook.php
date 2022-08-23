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
            <a href="adminAddBook.php"><button class="btn">Add book</button></a>
            <a href="adminBookReport.php"><button class="btn">Book report</button></a>
            <a href="bookRequest.php"><button class="btn">book request</button></a>
            <a href="addStudent.php"><button class="btn">Add Student</button></a>
            <a href="studentReport.php"> <button class="btn">student report</button></a>
           
            <a href="adminIssueReport.php"><button class="btn">issue report</button></a>
            <a href="login.php"><button class="btn">logout</button></a>
    </div>
    <div class="rightbar">
    <Button class="btn" >ISSUE BOOK</Button>
            <form action="../php/issueBook.php" method="post" enctype="multipart/form-data">
                    <label class="input">
                        <span>Book ID</span>
                         <input type="text" name="bookid">    
                    </label>
                    <label class="input">
                        <span>Book Name</span>
                         <input type="text" name="bookname">    
                    </label>
                    <label class="input">
                        <span>Issue Date</span>
                         <input type="date" name="date">    
                    </label>
                    <label class="input">
                        <span>Issue Days</span>
                         <input type="text" name="days">    
                    </label>
                    <label class="input">
                        <span>Student Name</span>
                         <input type="text" name="studentname">    
                    </label>
                    <label class="input">
                        <span>Student Email</span>
                         <input type="text" name="studentemail">    
                    </label>
                  
                    <label style="color:green"><?php echo $msg; ?></label>
                    <button class="submit" type="submit">submit</button>
            </form>
        
               
        </div>




    </body>
</html>