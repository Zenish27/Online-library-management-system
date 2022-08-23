<?php
     include "../php/db.php";
     session_start();
     $msginsert="";
   
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/secondPage.css">
        <title>
            LMS||UserDashboard
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
                                   $sql = mysqli_query($conn,"SELECT name FROM userdata WHERE email='$email'");
                                   while($row=mysqli_fetch_assoc($sql)){
                                       $name = $row['name'];
                                       echo $name;
                                   } 
                                ?>
               <a href="userDashboard.php"> <button class="btn">Home</button></a>
                <a href="userAccount.php"><button class="btn">account details</button></a>
                <a href="userIssue.php"><button class="btn">issue book</button></a>
              <button class="btn" style="background: #D4F1F4; color: #0080bf;">issue report</button>
                <a href="../studentLogin.php"><button class="btn" >logout</button></a>
        </div>
        <div class="rightbar">
        <Button class="btn" >ISSUE REPORT</Button>  
           
           <table class="reporttable">
               <tr id="head">
                       <th>Book ID</th>
                       <th>Book Name</th>
                       <th>Student Name</th>
                       <th>Student Email</th>
                  
                       <th>Issue Date</th>
                       <th>Return Date</th>
                       <th>Issue Days</th>
                       <!-- <th>Action</th>	 -->
                   </tr>
                   <?php
                       $sql="SELECT * FROM issuebook WHERE studentemail='$email'";
                       
                       $res = mysqli_query($conn,$sql);
                       if(mysqli_num_rows($res)>0){
                       while($row = mysqli_fetch_assoc($res)){
                        //    $status = $row['status'];
                        //    if($status==0){
                        //        $sta = "Pending";

                        //    }
                        //    else if($status==1){
                        //        $sta = "Approved";
                        //    }
                        //    else{
                        //        $sta = "Rejected";
                        //    }
                           
                       echo "<tr>";
                       echo "<td>".$row['bookid']."</td>";
                       echo "<td>".$row['bookname']."</td>";
                       echo "<td>".$row['studentname']."</td>";
                       echo "<td>".$row['studentemail']."</td>";
                       
                       echo "<td>".$row['issuedate']."</td>";
                       echo "<td>".$row['issuereturn']."</td>";
                       echo "<td>".$row['issuedays']."</td>";
                       
                       echo "</tr>";
                       }
                       }
                   ?>
               </table>
        </div>
</body>
</html>