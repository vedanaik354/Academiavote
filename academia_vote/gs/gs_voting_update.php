<?php
   $connect = mysqli_connect('localhost', 'root', '', 'aca_votingdb');
	   if(!$connect)
	   {
		 	die('Could not connect: ' . mysqli_error());
	   }
	   //echo 'Connected successfully';
?>
		
		<?php
				$edit_rec = $_GET['edit'];
				$query = "SELECT * FROM gs_details WHERE gs_id ='$edit_rec'";
				$result = mysqli_query($connect, $query);
		
					$i = 1;
					while($row = mysqli_fetch_array($result)) 
					{
					 $total_votes = $row['can_vote']; 
					}
			
				$total_votes = $total_votes + 1;
			  
				$sql = "UPDATE gs_details SET can_vote = '$total_votes' WHERE gs_id = '$edit_rec'";  
		
				if (mysqli_query($connect, $sql))
				  {
					//echo json_encode("Updated Successfully!!!");
					echo '<script> alert("Vote Succeesfully Added") </script>';
					echo "<script>window.open('gs_vote_login.php','_self')</script>";
				  }
	                    
		?>