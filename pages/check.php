<?php


include"connect.php";
	$pgd=3;$msc=5;$phd =7;
 	
 		
 	if (isset($_POST['approve'])) {
		$increase = mysqli_query($con,"SELECT * FROM studentList WHERE id= '$id'");
		while($row = mysqli_fetch_assoc($increase)){
		$stage =$row['stage'];
		$name =$row['name'];
		
		$cat = $row['category'];
		}
	
$id = $_POST['approve'];
$staged=$stage + 1;
$pdh="PhD";
			
	if($cat ==$pdh && $stage==$phd){
		
		echo'You can\'t approve ths candidate as he is due for graduation';
		}elseif($cat =="Pgd" && $stage==$pgd){
		
		echo'You can\'t approve ths candidate as he is due for graduation';
		}elseif($cat =="MSc" && $stage==$msc){
		
		echo'You can\'t approve ths candidate as he is due for graduation';
		}else{
	$query = "UPDATE studentList SET stage='$staged', status =''   WHERE id ='$id'";
		 $update=mysqli_query($con, $query)or die(mysqli_error($con));
		echo 'You just Approved '.strtoupper($name);
		
		}
	}
		
	


	if (isset($_POST['decline'])) {
 		
 		$id=$_POST['decline'];
		
		
			$query = "UPDATE studentList SET  status = 'Decline'   WHERE id ='$id'";
		 $update=mysqli_query($con, $query)or die(mysqli_error($con));
		
		
		
		echo 'You just Declined';
	}


	



	


?>
