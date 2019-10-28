<?php

error_reporting(0);
include"connect.php";
	$pgd=3;$msc=5;$phd =7;
 	if (isset($_POST['approve'])) {
 		$id = $_POST['approve'];
 	
		$increase = mysqli_query($con,"SELECT * FROM studentList WHERE id= '$id'");
		while($row = mysqli_fetch_assoc($increase)){
		$stage =$row['stage'];
		$name =$row['name'];
		
		$cat = $row['category'];
		$email = $row['email'];
		}
$staged=$stage + 1;
$pdh="PhD";
			
	if($cat ==$pdh && $stage==$phd){
		
		echo'You can\'t approve this candidate as he is due for graduation';die();
		}elseif($cat =="Pgd" && $stage==$pgd){
		
		echo'You can\'t approve this candidate as he is due for graduation';die();
		}elseif($cat =="MSc" && $stage==$msc){
		
		echo'You can\'t approve this candidate as he is due for graduation';die();
		}else{
$query = "UPDATE studentList SET stage='$staged', status =''   WHERE id ='$id'";
		 $update=mysqli_query($con, $query)or die(mysqli_error($con));
echo 'You just Approved '.strtoupper($name);
		 if ($update) {
			$subject ="Thesis notification";
			$message ="Your THESIS has been Declined. Submit something more substantial";
			$from = "From: elinoc4@gmail.com";
			mail($email, $subject, $message,$from);
		}
		
		
		}

	}
		
	


	if (isset($_POST['decline'])) {
 		
 		$id=$_POST['decline'];
		
		
			$query = "UPDATE studentList SET  status = 'Decline'   WHERE id ='$id'";
		 $update=mysqli_query($con, $query)or die(mysqli_error($con));
echo 'You just Declined';
		if ($update) {
			$subject ="Thesis notification";
			$message ="Your THESIS has been Declined. Submit something more substantial";
			$from = "elinoc4@gmail.com";
			mail($email, $subject, $message,$from);
		}
		
		
		
	}


	



	


?>
