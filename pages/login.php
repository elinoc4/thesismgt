<?php
session_start();
error_reporting(E_ALL);
include"connect.php";
	if (isset($_POST['fname'])) {
	$regno=$_POST['fname'];
	$pword=$_POST['pword'];
	$table=$_POST['table'];

	if ($regno !='' && $pword != '') {
		if ($table == 'studentList') {
			$query = mysqli_query($con,"SELECT * FROM $table WHERE regno='$regno' AND pword='$pword'")or die('an error occurred');
			$count=mysqli_num_rows($query);
			if ($count > 0) {
				$_SESSION['regno']=$regno;
				$_SESSION['pword']=$pword;
echo 'bravo';
				header('Location:portal.php');

			}else{
			$msg = 'Wrong Password';
		}
			
		}else{
			$query = mysqli_query($con,"SELECT * FROM $table WHERE email='$regno' AND pword='$pword'");	
			$count=mysqli_num_rows($query);
			if ($count>0) {
				$_SESSION['admin']=$regno;
				$_SESSION['pword']=$pword;
				header('Location:admin.php');

			}else{
			$msg = 'Wrong Password';
		}		
		}
		
	}else{
		$msg = 'please fill in your details';
	}

}else{
	$msg = 'no data was sent';
}




?>

<?php include "index.php";?>


<div class="container">
			<!---------Navigation area----->
				<div class="container col-md-4">
					<div class="row">
						<div class=""></div>
					</div>
				</div>





			 <!------ Form Area----========================================FORM ARENA===========================----->
				<div class="container">
					<div class="row">
						
						<div class="col-md-6 " id="form">
							
							<form class="form-horizontal " role="form" enctype="multipart/form-data" method="POST" action="login.php">
								<div class="form-group">
									<div class="col-md-6">
										<select class="form-control" name="table">
											<option class="form-control" value="admin">Admin</option>
											<option class="form-control" value="studentList">Student</option>
										</select> 
					                </div>
					            </div>
								
					            
					            <div class="form-group">
									<div class="col-md-6">
										<input type="text" name="fname" placeholder="Name(admin) Regno(Student)" class="form-control"  autofocus>
					                </div>
					            </div>
					            <div class="form-group">
									<div class="col-md-6">
										<input type="password" for="password" name="pword" placeholder="Password" class="form-control"  autofocus>
					                </div>
					            </div>
					            <div class="form-group">
									<div class="col-md-6">
										<input type="submit" name="submit"  class="form-control"  autofocus>
					                </div>
					            </div>
					        </form>
					    </div>
					</div>
				</div>
			</div>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
	</body>
</html>
