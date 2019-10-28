<!DOCTYPE html>
<html>
		<head>
			<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
			<script type="text/javascript" src="js/bootstrap.min.js"></script>
			
			<title><?php if(isset($_SESSION['regno'])){echo 'Student Portal';}elseif(isset($_SESSION['admin'])){echo 'Admin Portal';}else{echo 'Home';}?></title>
		</head>
		
 
		<body style="background-image: url('img/bg.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: cover;">
<!--=====NAVIGAON ARENA=============----->
			
			 <nav class="navbar navbar-inverse" style="margin-bottom: 0px;">
  <div class="container-fluid">
  
			    <div class="navbar-header">
			      <a class="navbar-brand" href="index.php">THESIS_MGT</a>
			    </div>
			    <ul class="nav navbar-nav">
			      <li class="active"><a href="index.php">Home</a></li>
			       
			    </ul>
			  
    <ul class="nav navbar-nav navbar-right">
      <li><a href="register.php"><span class="fa fa-user"></span> Sign Up</a></li>
     
	<li><a href="login.php"><span class="fa fa-log-in"></span>Login</a></li>
<?php if(isset($_SESSION['regno'])){echo '<li><a href="logout.php"><span class="fa fa-log-in"></span>Logout</a></li>';}elseif(isset($_SESSION['admin'])){echo '<li><a href="logout.php"><span class="fa fa-log-in"></span>Logout</a></li>';}else{echo '';}?>
    </ul>
  </div>
</nav>



