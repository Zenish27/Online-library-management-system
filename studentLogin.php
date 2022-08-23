<?php
	$emailMsg="";
	$passMsg="";
	$msg="";

	if(!empty($_REQUEST['emailMsg'])){
		$emailMsg=$_REQUEST['emailMsg'];
	}
	if(!empty($_REQUEST['passMsg'])){
		$passMsg=$_REQUEST['passMsg'];
	}
	if(!empty($_REQUEST['msg'])){
		$msg=$_REQUEST['msg'];
	}
	
	?>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="css/firstPage.css">
        <title>
            LMS||Login
        </title>
    </head>
    <body>
    <h1>Library Management System</h1>
	<div class="box">
	<form method="get" action="php/userLogin.php">		
		<div class="form">
			<h2>Sign In</h2>
			<label class="input">
			<span>email</span>
			<input type="email" name="email">
			<label style="color:red"><?php echo $emailMsg; ?></label>
			</label>
			
			<label class="input">
			<span>password</span>
			<input type="password" name="password">
			<label style="color:red"><?php echo $passMsg; ?></label>
			<label style="color:red"><?php echo $msg; ?></label>
			</label>
			
			<button class="submit" type="submit">Sign In</button><br>
			<div class="bottom"><?php  ?></div>
            <!-- <div class="bottom"> -->
            <p class="signUp" style="font-size: 20px;"><a href="html/login.php" target="_self">
				Admin Login</a></p>
			<p class="forgotPass"><a href="html/forgotPass.php" >Forgot Password ?</a></p>
            <!-- </div> -->
        </div>
	
	</form>
	</div>
    </body>
</html>