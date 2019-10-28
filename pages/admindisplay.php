<?php
session_start();
if(!isset($_SESSION['admin'])){
header('Location:index.php');
die();
}
$id= $_GET['id'];
//initiate connection
include"index.php";
include"connect.php";

// FETCH ALL STUDENT THET HAVE SUBMITTED
$query = mysqli_query($con,"SELECT * FROM studentList WHERE id = '$id'");
$count = mysqli_num_rows($query);
	$msg = '';


		




?>
<!DOCTYPE html>


<?php if ($count > 0) {?>
 <?php  ?>
	<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
			<tr>


				
				<th width="50%">Name</th>
				<th>Registration Number</th>
				
					
				
			</tr>
<div id="detail" class="alert alert-info" role="alert" type="hidden" style="display:none;"></div>
			<tbody>
			<?php 
			while($row= mysqli_fetch_array($query))
			{
			$output='<tr><td>'.$row["name"].'</td><td>'.$row["regno"].'</td><td><input type="button" id="'.$row["id"].'" name="approve" class="approve" value="approve" /><input type="button" id="'.$row["id"].'" name="decline" class="decline" value="decline"/></td></tr>';
				

echo $output;
			}
			?>

		</tbody>

		</table>
		
				
		<?php
			
		}else{
			$msg ='No student has submitted yet';

		}

echo $msg;
?>

</body>
<script type="text/javascript" src="jquery-1.9.1.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.approve').click(function(){
			var approve = $(this).attr("id");

			$.ajax({
				url:"update.php",
				method:"post",
				data:{approve:approve},
				success:function(data){
				$('#detail').show().html(data);
				$('input').hide();
					
				}

			});
			
		});
		

	});
	

</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.decline').click(function(){
			var decline = $(this).attr("id");

			$.ajax({
				url:"update.php",
				method:"post",
				data:{decline:decline},
				success:function(data){
				$('#detail').show().html(data);
				$('input').hide();
				}

			});
			
		});
		

	});
	

</script>
</html>

