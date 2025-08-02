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
		  <h2 style="background-color:silver; padding:10px; text-align:center; margin-top:10px;">Admin Panel - User Details</h2>
		  
			<?php   
				$query = "SELECT * FROM user_details ORDER BY user_id ASC";
				$result = mysqli_query($connect, $query);  
			?>
			
			<form action="users.php" method="POST"> 
			<div class="container">
				<div class="table-responsive">
					<table class="table table-hover table-condensed" style="width:90%;">
						<thead>
						  <tr>
							<th> user. Id </th>
							<th> User Name </th>
							<th> Email </th>
							<th> Password </th>
							<!--
							<th> Edit </th>
							-->
							<th> Delete </th>
						  </tr>
						</thead>
						<?php 
							$i = 1;
							while($row = mysqli_fetch_array($result)) { 
						?>
						<tbody>
						  <tr>
							<input type="hidden" name="u_id" value="<?php echo $row['user_id']; ?>"/>
							<td> <?php echo $row['user_id']; ?></td>
							<td> <?php echo $row['user_name']; ?></td>
							<td> <?php echo $row['user_email']; ?></td>
							<td> <?php echo $row['user_pass']; ?></td>
						
								<!--
								<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal_signup">Edit</button>
								-->
								<!--
								<a data-toggle="modal" data-userid="<?php // echo $user['user_id']; ?>" href="#myModal_signup" 
									class="btn btn-warning btn-sm">Edit </a>
								-->
								<!--
								<a class="btn btn-info btn-sm" href="user_edit.php?edit=<?php echo $row['user_id']; ?>">Edit </a>
								-->

						
							<td> 
								<!-- <button type="button" class="btn btn-danger btn-sm">Delete</button> -->
								<input name="btn_del" class="btn btn-danger btn-sm" type="submit" value="Delete"/> 
								
							</td>
						  </tr>					  
						</tbody>				 		
				
					<?php $i++; } // End of while 
					// mysqli_close($connect); ?> 
				
					 </table>
				</div>
			</div>
			</form>
			<?php
				if(isset($_POST['btn_del']))
				{ 
					//echo "test";
					$user_id = $_POST['u_id'];
					$sql = "DELETE FROM user_details WHERE user_id = $user_id ";
					 if(mysqli_query($connect,$sql))
					{
						echo '<script> alert("User Deleted Succeesfully") </script>';
						echo "<script>window.open('users.php?deleted=Record Deleted','_self')</script>";
					}
					else
					{
						echo "ERROR: Could not able to execute $sql. ". mysqli_error($connect);
					}
				}
				mysqli_close($connect);
			?>

		</div>
				
	</body>
</html>