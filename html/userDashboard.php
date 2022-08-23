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
        </button>
                <button class="btn" style="background: #D4F1F4; color: #0080bf;">Home</button>
                <a href="userAccount.php"><button class="btn">account details</button></a>
                <a href="userIssue.php"><button class="btn">issue book</button></a>
                <a href="userReport.php"><button class="btn">issue report</button></a>
                <a href="../studentLogin.php"><button class="btn" >logout</button></a>
        </div>
        <div class="rightbar">
        
        <form action="" method="post" target="_self">
                        <div class="search">
                            <input id="text" type="text" name="searchbook" placeholder="search book">
                            <input type="submit" name="search" value="search" class="btn">
                        </div>
                        <?php
                            if(isset($_POST['search'])){
                                $book = $_POST['searchbook'];
                                
                                $sql="SELECT * FROM book WHERE bookname LIKE '%$book%'";
                       
                                $res = mysqli_query($conn,$sql);
                                if(mysqli_num_rows($res)>0){
                                while($row = mysqli_fetch_assoc($res)){
                                    $id=$row['id'];
                                    $img=$row['bookpic'];
                                    $bookid = $row['bookid'];
                                    $bookname = $row['bookname'];
                                    $booktag = $row['booktag'];

                                }
                                

                                $sql = mysqli_query($conn,"INSERT INTO searchhistory (username,email,bookname,bookid,booktag) VALUES ('$name','$email','$bookname','$bookid','$booktag')");
                          ?>
                    <div class="searchlist">
                    <div class="image">
                    <a href="userView.php?id=<?php echo $id;?>"><img id="image"  src="../php/<?php echo $img;?>"/></a>
               
                    <p id='bname'><?php echo $bookname; ?></p>
                </div>
                </div>
                <div class="recommend">
                <p>You may also like:</p>
                <div class="result">
                <?php
                           
                                
                           $sql="SELECT * FROM searchhistory WHERE email = '$email'";
                              
                           $res = mysqli_query($conn,$sql);
                           if(mysqli_num_rows($res)>0){
                           while($row = mysqli_fetch_assoc($res)){
                              
                               $booktag = $row['booktag'];

                               
                        
                           }
                           $sql1="SELECT * FROM book WHERE booktag = '$booktag' AND NOT bookname='$bookname'";
                              
                               $res1 = mysqli_query($conn,$sql1);
                               if(mysqli_num_rows($res1)>0){
                               while($row1 = mysqli_fetch_assoc($res1)){
                                $id1=$row1['id'];
                                $img=$row1['bookpic'];
                                $bookname=$row1['bookname'];
                               
                            ?>
                            <div class="image">
                    <a href="userView.php?id=<?php echo $id1;?>"><img id="image"  src="../php/<?php echo $img;?>"/></a>
               
                    <p id='bname'><?php echo $bookname; ?></p>
                
                </div>
                <?php 
                               }
                            }
                        }
                ?>
                </div>
                </div>  
                    <?php
                                }
                            }
                            ?>
                    
        </div>
</body>
</html>