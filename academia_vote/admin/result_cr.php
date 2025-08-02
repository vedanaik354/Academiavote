<?php
   $connect = mysqli_connect('localhost', 'root', '', 'aca_votingdb');
	   if(!$connect)
	   {
		 	die('Could not connect: ' . mysqli_error());
	   }
	   //echo 'Connected successfully';
?>


<!DOCTYPE html>
<html lang="en">
<head>
		<title>Academia Vote</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
		<script src="../bootstrap/jquery.min.js"></script>
		<script src="../bootstrap/bootstrap.min.js"></script>
		
		<style>
			body {
			  font-family: "Lato", sans-serif;
			}

			.sidenav {
			  height: 100%;
			  width: 160px;
			  position: fixed;
			  z-index: 1;
			  top: 0;
			  left: 0;
			  background-color: #111;
			  overflow-x: hidden;
			  padding-top: 20px;
			}

			.sidenav a {
			  padding: 6px 8px 6px 16px;
			  text-decoration: none;
			  font-size: 20px;
			  color: #818181;
			  display: block;
			}

			.sidenav a:hover {
			  color: #f1f1f1;
			}

			.main {
			  margin-left: 160px; /* Same as the width of the sidenav */
			  font-size: 16px; /* Increased text to enable scrolling */
			  padding: 0px 10px;
			}

			@media screen and (max-height: 450px) {
			  .sidenav {padding-top: 15px;}
			  .sidenav a {font-size: 18px;}
			}
		</style>
	</head>
	<body>

		<div class="sidenav">			
			<a href="main.php">Dashboard</a>
			<a href="home_edit.php">Home Page</a>
			<a href="users.php">Users</a>						
			<a href="students.php">Students</a>
			<a href="candidates.php">Candidate</a>
			<a href="result_cr.php">Result(cr)</a>
			<a href="../index.php">Logout</a>			
		</div>

		<div class="main">
		  <h2 style="background-color:silver; padding:10px; text-align:center; margin-top:10px;">Admin Panel - Result Update</h2>
		
			<form action="result_cr.php" method="POST"> 
			<?php   
				$query = "SELECT * FROM candidate_details";
				$result = mysqli_query($connect, $query);  				
				$row = mysqli_fetch_array($result) 
			?>
				<input type="submit" value="<?php echo $row['can_status']; ?>" name="btn_status" class="btn btn-danger btn-md"/>
				
			</form>
			
				<?php         
					if(isset($_POST['btn_status']))
					{       
							if($_POST['btn_status'] == 'hide')
							{
								$sql1 = "UPDATE candidate_details SET can_status = 'show'";
								if (mysqli_query($connect, $sql1))
								  {
									//echo "<a href='result_edit.php'> Back </a>";
									echo '<script> alert("Updated Succeesfully") </script>';
								  }	                  
							}
					
							else if($_POST['btn_status'] == 'show')
							{
						
							$sql2 = "UPDATE candidate_details SET can_status = 'hide'";
							if (mysqli_query($connect, $sql2))
							  {
								//echo "<a href='result_edit.php'> Back </a>";
								echo '<script> alert("Updated Succeesfully") </script>';
							  }	                  
														
							}
					}
				?> 
		  
			<?php   
				$query = "SELECT * FROM candidate_details ORDER BY can_vote DESC";
				$result = mysqli_query($connect, $query);  
			?>
			
		
			<div class="container" style="margin-top:50px;">
				<div class="table-responsive">
					<table class="table table-hover table-condensed" style="width:100%;">
						<thead>
						  <tr>
							<th> Id </th>
							<th> Image </th>							
							<th> Name </th>
							<th> Course </th>							
							<th> Sem </th>							
							<th> Votes </th>							
							<th> Status</th>
							<th> Add to GS </th>							
						</tr>
						</thead>
						<?php 
							$i = 1;
							while($row = mysqli_fetch_array($result)) { 
						?>
						<tbody>
						<tr>
						<form method="POST" action="result_cr.php"> 
						  
							<input type="hidden" name="can_id" value="<?php echo $row['can_id']; ?>"/>
							<input type="hidden" name="can_name" value="<?php echo $row['can_name']; ?>"/>
							<input type="hidden" name="can_course" value="<?php echo $row['can_course']; ?>"/>
							<input type="hidden" name="can_sem" value="<?php echo $row['can_sem']; ?>"/>
							
							
							
							
							
							<td> <?php echo $row['can_id']; ?></td>
							<td> <img src="../images/candidates/<?php echo $row['can_img']; ?>" width="50px" height="50px"/></td>
							
							<td> <?php echo $row['can_name']; ?></td>
							<td> <?php echo $row['can_course']; ?></td>
							<td> <?php echo $row['can_sem']; ?></td>
							<td> <?php echo $row['can_vote']; ?></td>
							<td> <?php echo $row['can_status']; ?></td>
							 <td> <input type="submit" name="add_to_gs" style="margin-top:5px;" class="btn btn-info" value="Add to GS Vote" /> </td>
						</form>
						  </tr>					  
						</tbody>				 		
				
					<?php $i++; } // End of while 
					// mysqli_close($connect); ?> 
				
					 </table>
				</div>
			</div>
			
		</div>
				
	</body>
</html>

<?php         
        if(isset($_POST['add_to_gs']))
        {				
            $can_id = $_POST['can_id'];
            $can_name = $_POST['can_name'];
			$can_course = $_POST['can_course'];
			$can_sem = $_POST['can_sem'];

            $sql = "INSERT INTO gs_details(can_id, can_name, can_course, can_sem) VALUES ('$can_id','$can_name', '$can_course','$can_sem')";

            if(mysqli_query($connect,$sql))
            {
              //echo "<p align='center' > <font color='green'> Record Saved Sucesfully </font> </p>"; 
				echo '<script> alert("Candidate Added Succeesfully") </script>';
            }
            else
            {
              //echo "<p align='center' > <font color='Red'> Record Saved Failed</font> </p>";
				echo '<script> alert("Candidate Added Failed") </script>';
            }
        }
	?> 
	<!-- End of Btn Save -->