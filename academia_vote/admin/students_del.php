<?php
   $connect = mysqli_connect('localhost', 'root', '', 'aca_votingdb');
	   if(!$connect)
	   {
		 	die('Could not connect: ' . mysqli_error());
	   }
	   //echo 'Connected successfully';
?>

<?php
	
		//echo "test";
		$stud_id = $_GET['del'];
		$sql = "DELETE FROM student_details WHERE stud_id = $stud_id ";
		 if(mysqli_query($connect,$sql))
		{
			echo '<script> alert("Student Deleted Succeesfully") </script>';
			echo "<script>window.open('students.php?deleted=Record Deleted','_self')</script>";
		}
		else
		{
			echo "ERROR: Could not able to execute $sql. ". mysqli_error($connect);
		}

	mysqli_close($connect);
?>