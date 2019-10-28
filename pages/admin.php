<?php
session_start();
if(!isset($_SESSION['admin'])){
header('Location:../index.php');
die();
}
//initiate connection
include"connect.php";
$regno=$_SESSION['admin'];

$status= 'submitted';
// FETCH ALL STUDENT THAT HAVE SUBMITTED
$sql = "SELECT * FROM studentList WHERE status='$status'";
$query=mysqli_query($con,$sql);
//---==========Count Number of Student That Have Submitted There Thesis=======
$count = mysqli_num_rows($query);
	$msg = '';
	?>

<?php $msg = $count.' Student(s) waiting for your approval'; include"index.php";
include"asd.php";?>

<?php if ($count > 0) {?>
	<div class="container">
 
	<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
			<tr class="col-md-6">


				
				<th >Name</th>
				<th>Registration Number</th>
					
				
			</tr>
			<tbody>
			<?php 
			while($row= mysqli_fetch_array($query))
			{
				?><tr class="col-md-6">
<td class="bg-info"><a href="<?php echo "admindisplay.php?id=".$row["id"]; ?>" class="hover" ><?php echo $row["name"];?></a></td><td><a href="<?php echo "admindisplay.php?id=".$row["id"]; ?>" class="hover" ><?php echo $row["regno"];?></a></td>
</tr>
				<?php


			}
			?>

		</tbody>
		</table>
		</div>
		</div>
				
		<?php	
			
		}else{
			$msg ='No student has submitted yet';

		}?>

</body>



</html>
