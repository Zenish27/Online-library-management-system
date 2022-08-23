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
           
            <button class="btn" style="background: #D4F1F4; color: #0080bf;">issue report</button>
            <a href="login.php"><button class="btn">logout</button></a>
    </div>
    <div class="rightbar">
 
           
    <table class="reporttable">
        <tr id="head">
				<th>Book ID</th>
				<th>Book Name</th>
				<th>Student Name</th>
                <th>Student Email</th>
                <th>Faculty</th>
                <th>Issue Date</th>
                <th>Return Date</th>
                <th>Issue Days</th>
                <th>Action</th>	
			</tr>
            <?php
                $sql="SELECT * FROM issuebook";
                
                $res = mysqli_query($conn,$sql);
                if(mysqli_num_rows($res)>0){
                while($row = mysqli_fetch_assoc($res)){
                    $bookid=$row['bookid'];
                echo "<tr>";
                echo "<td>".$row['bookid']."</td>";
                echo "<td>".$row['bookname']."</td>";
                echo "<td>".$row['studentname']."</td>";
                echo "<td>".$row['studentemail']."</td>";
                echo "<td>".$row['faculty']."</td>";
                echo "<td>".$row['issuedate']."</td>";
                echo "<td>".$row['issuereturn']."</td>";
                echo "<td>".$row['issuedays']."</td>";
                echo "<td>"."<a href='../php/deletebook.php?id=$row[id]' class='btn'>Return</a>"."</td>";
                echo "</tr>";
                }
                }
            ?>
        </table>
        
               
        </div>




    </body>
</html>