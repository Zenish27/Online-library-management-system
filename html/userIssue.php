<?php
     include "../php/db.php";
     session_start();
     $msg="";
     if(!empty($_REQUEST['msg'])){
		$msg=$_REQUEST['msg'];
	}
   
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
               <button class="btn" style="background: #D4F1F4; color: #0080bf;">issue book</button>
                <a href="userReport.php"><button class="btn">issue report</button></a>
                <a href="../studentLogin.php"><button class="btn" >logout</button></a>
        </div>
        <div class="rightbar">
        <Button class="btn" >FACULTY BOOKs</Button>
        <div class="fac-book">  
                   <?php
                    $r="SELECT * FROM userdata WHERE email = '$email'";
                    $res1 = mysqli_query($conn,$r);
                    if(mysqli_num_rows($res1)>0){
                    while($row1 = mysqli_fetch_assoc($res1)){
                        $faculty=$row1['faculty'];
                    }
                }
                $sql="SELECT * FROM book WHERE faculty='$faculty'";
                       
                $res = mysqli_query($conn,$sql);
                if(mysqli_num_rows($res)>0){
                while($row = mysqli_fetch_assoc($res)){
                    
                    $id1=$row['id'];
                    $img=$row['bookpic'];
                    $bookname=$row['bookname'];
                    ?>
                 <div class="image">
                    <a href="userView.php?id=<?php echo $id1;?>"><img id="image"  src="../php/<?php echo $img;?>"/></a>
               
                    <p id='bname'><?php echo $bookname; ?></p>
                
                </div>
             
                <?php 
                }
                }
                    
                 ?>
          </div>  
        </div>
</body>
</html>