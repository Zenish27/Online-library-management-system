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
            <button class="btn" style="background: #D4F1F4; color: #0080bf;">Book report</button>
            <a href="bookRequest.php"><button class="btn">book request</button></a>
            <a href="addStudent.php"><button class="btn">Add Student</button></a>
            <a href="studentReport.php"> <button class="btn">student report</button></a>
           
            <a href="adminIssueReport.php"><button class="btn">issue report</button></a>
            <a href="login.php"><button class="btn">logout</button></a>
    </div>
    <div class="rightbar">

        <table class="reporttable">
        <tr id="head">
				<th>Name</th>
				<th>Quantity</th>
				<th>Price</th>
				<th>Available</th>
				<th>Rent</th>
                <th>View</th>
				
			</tr>
            <?php
                $sql="SELECT * FROM book";

                $res = mysqli_query($conn,$sql);
                if(mysqli_num_rows($res)>0){
                while($row = mysqli_fetch_assoc($res)){
                echo "<tr>";
                echo "<td>".$row['bookname']."</td>";
                echo "<td>".$row['bookquantity']."</td>";
                echo "<td>".$row['bookprice']."</td>";
                echo "<td>".$row['bookava']."</td>";
                echo "<td>".$row['bookrent']."</td>";
                echo "<td>"."<a href='viewbook.php?id=$row[id]' class='btn'>view</a>"."</td>";
                echo "</tr>";
                }
                }
            ?>
        </table>
        
               
        </div>




    </body>
</html>