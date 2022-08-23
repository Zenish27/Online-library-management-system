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
           <button class="btn" style="background: #D4F1F4; color: #0080bf;">Add Student</button>
            <a href="studentReport.php"> <button class="btn">student report</button></a>
           
            <a href="adminIssueReport.php"><button class="btn">issue report</button></a>
            <a href="login.php"><button class="btn">logout</button></a>
    </div>
    <div class="rightbar">
  
                <form action="../php/addStudentDb.php" method="post">
                    <label class="input">
                        <span>name</span>
                         <input type="text" name="name">    
                    </label>
                    <label class="input">
                        <span>email</span>
                         <input type="email" name="email">    
                    </label>
                    <label class="input">
                        <span>password</span>
                         <input type="password" name="pass">    
                    </label>
                    <label class="input">
                    <span>Faculty</span>
                            <select name="faculty" id="faculty">
                                <option value="bca">BCA</option>
                                <option value="csit">CSIT</option>
                                <option value="bba">BBA</option>
                                <option value="bim">BIM</option>
                                </select>
                    </label>
                    <label style="color:green"><?php echo $msg; ?></label>
                    <button class="submit" type="submit">submit</button>
                </form>

    </div>





    </body>
</html>