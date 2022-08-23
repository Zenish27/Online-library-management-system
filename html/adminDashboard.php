<?php
    include "../php/db.php";
    session_start();
    $msginsert="";
    // echo $_SESSION['loginid'];
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/secondPage.css">
        <title>
            LMS||AdminDashboard
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
  





    </body>
</html>