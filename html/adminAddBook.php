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
           <button class="btn" style="background: #D4F1F4; color: #0080bf;">Add book</button>
            <a href="adminBookReport.php"><button class="btn">Book report</button></a>
            <a href="bookRequest.php"><button class="btn">book request</button></a>
            <a href="addStudent.php"><button class="btn">Add Student</button></a>
            <a href="studentReport.php"> <button class="btn">student report</button></a>
           
            <a href="adminIssueReport.php"><button class="btn">issue report</button></a>
            <a href="login.php"><button class="btn">logout</button></a>
    </div>
    <div class="rightbar">
    
             
                <form action="../php/addBookServer.php" method="post" enctype="multipart/form-data">
                    <label class="input">
                        <span>Book Name</span>
                         <input type="text" name="bookname">    
                    </label>
                    <label class="input">
                        <span>Book Code</span>
                         <input type="text" name="bookid">    
                    </label>
                    <label class="input">
                        <span>Detail</span>
                         <input type="text" name="bookdetail">    
                    </label>
                    <label class="input">
                        <span>Autor</span>
                         <input type="text" name="bookauthor">    
                    </label>
                    <label class="input">
                        <span>Publication</span>
                         <input type="text" name="bookpublication">    
                    </label>
                    <label class="input">
                        <span>Tag</span>
                         <input type="text" name="booktag">    
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

                     
                     
                    <label class="input">
                        <span>Quantity</span>
                         <input type="text" name="bookquantity">    
                    </label>
                    <label class="input">
                        <span>Book Price</span>
                         <input type="text" name="bookprice">    
                    </label>
                    <label class="input">
                        <span>Book Photo</span>
                         <input type="file" name="image" id="image">    
                    </label>
                    <label class="input">
                    <label style="color:green"><?php echo $msg; ?></label>
                    
                    <button class="submit" name="submit" type="submit">submit</button>
                    </label>
                </form>
    
        </div>




    </body>
</html>