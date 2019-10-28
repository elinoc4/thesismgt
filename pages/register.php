<?php
session_start();
error_reporting(0);


	 include"connect.php";
	if(isset($_POST['dept']))
	{
		    $lname = "img/";
			$msg="";
			$cname=basename($_FILES['doc']['name']);
			$imgcheck=pathinfo($cname,PATHINFO_EXTENSION);
		if ($imgcheck != "ppt") {
			$msg= '<span class="txt-warning">please choose a power point file</span>';
			
			
		}
		else
		{
				// collecting data
				$fname=$_POST['fname'];
				$category=$_POST['category'];
				$dept=$_POST['dept'];
				$faculty=$_POST['faculty'];
				$regno=$_POST['regno'];
				$t_title=$_POST['t_title'];
				$category=$_POST['category'];
				$sname =$_POST['sname'];
				$email =$_POST['email'];
				$stage =1;
				$status = 'submitted';
				//insering data
				$query="INSERT INTO studentList (category,name,dept,regno,faculty,stage,email,status)VALUES('$category','$fname', '$dept','$regno','$faculty','$stage','$email','$status')";
				$insert= mysqli_query($con,$query)or die(mysqli_error($con));
			if ($insert) 
			{
			    $last_id = mysqli_insert_id($con);
			   $sql= "INSERT INTO thesisProgress (stdId, thesisTitle, sName) VALUES ('$last_id', '$t_title', '$sname')";
			$query=mysqli_query($con, $sql)or die(mysqli_error($con));
			}
				$newname = "../img/$t_title.ppt";
				$upload=move_uploaded_file( $_FILES['doc']['tmp_name'], "$newname");
				$msg="File UPLOADED";

			if ($query)
			{	$_SESSION['regno']=$regno;
				header("Location:portal.php");
			}
			
		}
		}
		else
		{
		$msg= 'no data recieved';
	}
?>
<?php include'index.php';
include'and.php';?><div class="container">
			<!---------Navigation area----->
				<div class="container col-md-4" id="bg">
					<div class="row">
						<div class=""></div>
					</div>
				</div>

				<div class="container">
					<div class="row">
						
						<div class="col-md-6 " id="form">
							
							<form class="form-horizontal " role="form" enctype="multipart/form-data" method="POST" action="register.php">
								<div class="form-group">
									<div class="col-md-6">
										<select class="form-control" name="category">
											<option class="form-control" value="Pgd">Pgd</option>
											<option class="form-control" value="MSc">MSc</option>
											<option class="form-control" value="PhD">PhD</option>
										</select> 
					                </div>
					            </div>
								<div class="form-group">
									<div class="col-md-6">
										<input type="text" name="fname" placeholder="Full Name" class="form-control" required autofocus>
					                </div>
					            </div>
					            <div class="form-group">
									<div class="col-md-6">
										<input type="text" name="regno" placeholder="Registration Number" class="form-control" required autofocus>
					                </div>
					            </div>
					            <div class="form-group">
									<div class="col-md-6">
										<input type="text" name="sname" placeholder="Supervisor Name" class="form-control" required autofocus>
					                </div>
					            </div>
					            <div class="form-group">
									<div class="col-md-6">
										<input type="text" name="t_title" placeholder="Thesis Title" class="form-control" required autofocus>
					                </div>
					            </div>
					            <div class="form-group">
									<div class="col-md-6">
										<input type="text" name="faculty" placeholder="Faculty" class="form-control" required autofocus>
					                </div>
					            </div>
					            <div class="form-group">
									<div class="col-md-6">
										<input type="text" name="dept" placeholder="Department" class="form-control" required autofocus>
					                </div>
					            </div>
					            <div class="form-group">
									<div class="col-md-6">
										<input type="email" for="email" name="email" placeholder="E-mail" class="form-control" required autofocus>
					                </div>
					            </div>
					            <div class="form-group">
									<div class="col-md-6">
										<input type="file" name="doc" placeholder="Upload a power point document" class="form-control" required autofocus>
					                </div>
					            </div>
					            <div class="form-group">
									<div class="col-md-6">
										<input type="submit" name="submit"  class="form-control" required autofocus>
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
