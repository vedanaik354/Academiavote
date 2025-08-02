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
			<a href="users.php">Users</a>
			<a href="home_edit.php">Home Page</a>			
			<a href="candidate_edit.php">Candidate</a>
			<a href="result_edit.php">Result</a>
			<a href="index.php">Logout</a>
			
		</div>

		<div class="main">
		  <h2 style="background-color:silver; padding:10px; text-align:center; margin-top:10px;">Admin Panel - User Edit </h2>
		  
			<?php
				$edit_rec = $_GET['edit'];
				$query = "SELECT * FROM user_details WHERE user_id ='$edit_rec'";
				$result = mysqli_query($connect, $query);
		
					$i = 1;
					while($row = mysqli_fetch_array($result)) { 
			?>
				<div class="container">
				  <form class="form-horizontal" action="user_edit.php" method="POST">
				  <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>"/>
				  
					<div class="form-group">
					  <label class="control-label col-sm-2" for="email">Username:</label>
					  <div class="col-sm-4">
						<input type="text" class="form-control" id="username" name="username" value="<?php echo $row['user_name']; ?>">
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-2" for="email">Email:</label>
					  <div class="col-sm-4">
						<input type="email" class="form-control" id="email" name="email" value="<?php echo $row['user_email']; ?>">
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-2" for="pwd">Password:</label>
					  <div class="col-sm-4">          
						<input type="text" class="form-control" id="password" name="password" value="<?php echo $row['user_pass']; ?>">
					  </div>
					</div>   
					<div class="form-group">        
					  <div class="col-sm-offset-3 col-sm-10">
						<!-- <button type="submit" class="btn btn-success">Update</button> -->
						<input name="btn_update" class="btn btn-success" type="submit" value="Update"/>
					  </div>
					</div>
				  </form>
				</div>
											
			<?php } ?>
			
			<?php
			
			 if(isset($_POST['btn_update']))
             { 
				echo $user_id = $_POST['user_id'];
				$user_name = $_POST['username'];
                $user_email = $_POST['email'];
				$user_pass = $_POST['password'];
                      
				$sql1 = "UPDATE user_details SET user_name = '$user_name', user_email = '$user_email', user_pass ='$user_pass' WHERE user_id = '$user_id'";  
                
				if (mysqli_query($connect, $sql1))
				  {
					//echo json_encode("Updated Successfully!!!");
					echo '<script> alert("User Details Updtaed Succeesfully") </script>';
					echo "<script>window.open('users.php','_self')</script>";
				  }
			  }                    
               
            ?>
       
	</body>
</html>