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
                                       $_SESSION['name'] = $name;
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
        <Button class="btn" >search book</Button>
                        <form action="" method="post" target="_self">
                        <div class="search">
                            <input id="text" type="text" name="searchbook" placeholder="search book">
                            <input type="submit" name="search" value="search" class="btn">
                        </div>
                    
                        </form>
                <table class="reporttable">
               <tr id="head">
                       <th>Book ID</th>
                       <th>Book Name</th>
                       <th>Book Author</th>
                       <th>Faculty</th>
                       <th>Action</th>	
                   </tr>
                        <?php
                            if(isset($_POST['search'])){
                                $book = $_POST['searchbook'];
                                
                                $sql="SELECT * FROM book WHERE bookname LIKE '%$book%'";
                       
                                $res = mysqli_query($conn,$sql);
                                if(mysqli_num_rows($res)>0){
                                while($row = mysqli_fetch_assoc($res)){
                                    $bookid = $row['bookid'];
                                    $bookname = $row['bookname'];
                                    $booktag = $row['booktag'];
                                    
                                    
                                    
                                echo "<tr>";
                                echo "<td>".$row['bookid']."</td>";
                                echo "<td>".$row['bookname']."</td>";
                                echo "<td>".$row['bookauthor']."</td>";
                                echo "<td>".$row['faculty']."</td>";

                                echo "<td>"."<a href='../php/searchrequest.php?id=$row[id]' class='btn'>request</a>"."</td>";
                               
                                echo "</tr>";

                                }
                                }
                                
                                $name1 = $_SESSION['name'];

                                $sql = mysqli_query($conn,"INSERT INTO searchhistory (username,email,bookname,bookid,booktag) VALUES ('$name1','$email','$bookname','$bookid','$booktag')");
                            }
                           
                        ?>
                    </table>
        </div>
</body>
</html>