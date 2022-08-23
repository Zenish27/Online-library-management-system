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
                <button class="btn" style="background: #D4F1F4; color: #0080bf;">account details</button>
                <a href="userIssue.php"><button class="btn">issue book</button></a>
                <a href="userReport.php"><button class="btn">issue report</button></a>
                <a href="../studentLogin.php"> <button class="btn" >logout</button></a>
        </div>
        <div class="rightbar">
        <Button class="btn" >My Detail</Button>
    <?php
            // $id = $_GET['id'];
            
                $sql="SELECT * FROM userdata WHERE email='$email'";
                $res = mysqli_query($conn,$sql);
                if(mysqli_num_rows($res)>0){
                while($row = mysqli_fetch_assoc($res)){
                    $name=$row['name'];
                    $email=$row['email'];
                    $faculty=$row['faculty'];
                    ?>

                <div class="detail">
                        
                        <span><b>Name:</b><?php echo $name;?></span><br>
                        <span><b>Email:</b><?php echo $email;?></span><br>
                        <span><b>Faculty:</b><?php echo $faculty;?></span><br>
                       
                 </div>
                 <?php
                }
            }
            ?>
        </div>
</body>
</html>