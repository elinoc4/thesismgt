<?php
session_start();
$id= $_GET['id'];
//initiate connection
include"connect.php";
// FETCH ALL STUDENT THET HAVE SUBMITTED
$query = mysqli_query($con,"SELECT * FROM studentList WHERE stdId = '$id'");
$count = mysqli_num_rows($query);
	$msg = '';


		if ($count > 0) {

			while ($rows = mysqli_fetch_assoc($query)) {
			'<tr><td>.'$row['name']'.</td>.'$row['regno']'.</td><td><form><input type="submit" name="approve" /><input type="submit" name="decline" /></form></tr>'
				# code...
			}
			# code...
		}else{
			$msg ='<tr>No student has submitted yet</tr>';

		}






?>