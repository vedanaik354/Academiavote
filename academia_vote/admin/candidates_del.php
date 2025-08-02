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
		$can_id = $_GET['del'];
		$sql = "DELETE FROM candidate_details WHERE can_id = $can_id ";
		 if(mysqli_query($connect,$sql))
		{
			echo '<script> alert("candidate Deleted Succeesfully") </script>';
			echo "<script>window.open('candidates.php?deleted=Record Deleted','_self')</script>";
		}
		else
		{
			echo "ERROR: Could not able to execute $sql. ". mysqli_error($connect);
		}

	mysqli_close($connect);
?>