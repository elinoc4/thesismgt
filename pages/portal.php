<?php
session_start();
if(!isset($_SESSION['regno'])){
header('Location:index.php');
die();
}
error_reporting(E_ALL);
	include"connect.php";
	$regno=$_SESSION['regno'];
	/*if(!isset($_SESSION[$regno])){
		
		header('Location:index.php');
	}*/
	$regno=$_SESSION['regno'];
	$query = mysqli_query($con,"SELECT * FROM studentList WHERE regno='$regno'");
	while($row = mysqli_fetch_assoc($query))
	{
		$stage=$row['stage'];
		$status=$row['status'];
		$stdId=$row['id'];
		$name=$row['name'];
		$cated = $row['category'];
	}


$rstage = $stage;
$name = strtoupper($name);
	$msg='';
	if($status==''){
		$msg= $name.' Your thesis has been Approved';
	}elseif($status=='Decline'){
		$msg=$name.' Your thesis has been Declined';
	}elseif($status=='submitted'){
		$msg=$name.' You\'ve submitted your thesis and its awaiting approval';
	}
	if(isset($_POST['sname'])){
		$lname = "img/";
		$msg="";
		$cname=basename($_FILES['doc']['name']);
		$imgcheck=pathinfo($cname,PATHINFO_EXTENSION);
	if ($imgcheck == "ppt") {
		
	
		$t_title=$_POST['t_title'];
		$sname =$_POST['sname'];
		$status = 'submitted';
		$query = "UPDATE studentList SET status ='submitted'   WHERE regno ='$regno'";
		$update=mysqli_query($con, $query)or die(mysqli_error($con));
		if ($update) {
		 	$sql= "INSERT INTO thesisProgress (stdId, thesisTitle, sName) VALUES ('$stdId', '$t_title', '$sname')";
			$query=mysqli_query($con, $sql)or die(mysqli_error($con));
			$newname = "../img/$t_title.ppt";
				$upload=move_uploaded_file( $_FILES['doc']['tmp_name'], "$newname");
				$msg="File UPLOADED";

			
		 }
		
		 $msg = 'submitted';
		}else{
			$msg= "<span class='txt-warning'>please choose a power point file</span>";
		
		
		}
	}


?>
<?php 
if($cated=='PhD'){

$d=7;
if($rstage==7){

$class='hidden';}}
elseif($cated== 'MSc'){
$d=5;if($rstage==5){

$class='hidden';}}
else{
$d=3;if($rstage==3){

$class='hidden';}} $per=100/$d;

switch($stage){
	case 1:
	$stage =$per;
break; 
case 2:
$stage = $per * 2;
break;
case 3:
$stage = $per * 3;
	break;
case 4:
$stage = $per * 4;
	break;
case 5:
$stage = $per * 5;
	break;
case 6:
$stage = $per * 6;
	break;
case 7:
$stage = $per * 7;
	break;
	}

$stage = number_format($stage);
?>

<?php include"index.php";?>
<?php include"asd.php";?>
<div class="container">
			<!---------Navigation area----->
				<div class="container col-md-4" id="bg">
					<div class="row">
						<div class=""></div>
					</div>
				</div>

			<div class="container">
				<div class="row">
					
					<div class="col-md-6 " id="form">
						
						<form class="form-horizontal <?php if(isset($class)){echo $class;}?> " role="form" enctype="multipart/form-data" method="POST" action="portal.php">
				            
				            <div class="form-group">
								<div class="col-md-6">
									<input type="text" name="t_title" placeholder="Thesis Title" class="form-control" required autofocus>
				                </div>
				            </div>
				            <div class="form-group">
								<div class="col-md-6">
									<input type="text"  name="sname" placeholder="Supervsor's Name" class="form-control <?php if(isset($class)){echo $class;}?>" required autofocus>
				                </div>
				            </div>
				            <div class="form-group">
								<div class="col-md-6 <?php if(isset($class)){echo $class;}?>">
									<input type="file" name="doc" placeholder="Upload a power point document" class="form-control" required autofocus>
				                </div>
				            </div>
				            <div class="form-group">
								<div class="col-md-6">
									<input type="<?php if(isset($class)){echo $class;}else{echo "submit";}?>" name="submit"  class="form-control" required autofocus>
				                </div>
				            </div>
				
				           
				        </form>
				    </div>
				</div>
				<span id="paste"></span>
			</div>
			<script type="text/javascript" src="js/bootstrap.min.js"></script>
			<script type="text/javascript" src="js/ajax.js"></script>
		</body>
</html>
