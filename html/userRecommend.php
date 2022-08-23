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
                
                <button class="btn"><a href="userAccount.php">My account</a></button>
                <button class="btn"><a href="userRecommend.php">Recommendation</a></button>
                <button class="btn"><a href="userSearch.php">Search book</a></button>
                <button class="btn"><a href="userIssue.php">issue book</a></button>
                <button class="btn"><a href="userReport.php">issue report</a></button>
            
                <button class="btn" ><a href="../studentLogin.php">logout</a></button>
        </div>
        <div class="rightbar">
       
                <table class="reporttable">
               <tr id="head">
                       <th>Book ID</th>
                       <th>Book Name</th>
                       <th>Book Author</th>
                       <th>Faculty</th>
                       <th>Action</th>	
                   </tr>
                        <?php
                           
                                
                                $sql="SELECT * FROM searchhistory WHERE email = '$email'";
                                   
                                $res = mysqli_query($conn,$sql);
                                if(mysqli_num_rows($res)>0){
                                while($row = mysqli_fetch_assoc($res)){
                                   
                                    $booktag = $row['booktag'];

                                    
                             
                                }
                                $sql1="SELECT * FROM book WHERE booktag = '$booktag'";
                                   
                                    $res1 = mysqli_query($conn,$sql1);
                                    if(mysqli_num_rows($res1)>0){
                                    while($row1 = mysqli_fetch_assoc($res1)){
                                       
                                     
                                       echo "<tr>";
                                       echo "<td>".$row1['bookid']."</td>";
                                       echo "<td>".$row1['bookname']."</td>";
                                       echo "<td>".$row1['bookauthor']."</td>";
                                       echo "<td>".$row1['faculty']."</td>";
       
                                       echo "<td>"."<a href='../php/recommendrequest.php?id=$row1[id]' class='btn'>request</a>"."</td>";
                                      
                                       echo "</tr>";
                                 
                                    }
                                }
                            }
                           
                           
                        ?>
                    </table>
        </div>
</body>
</html>