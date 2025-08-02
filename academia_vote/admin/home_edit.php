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
			<a href="index.php">Logout</a>			
		</div>

		<div class="main">
		  <h2 style="background-color:silver; padding:10px; text-align:center; margin-top:10px;">Admin Panel - Home Update</h2>
		  
			<?php
				//$edit_rec = $_GET['edit'];
				$query = "SELECT * FROM home_details WHERE home_id = 1";
				$result = mysqli_query($connect, $query);
		
					$i = 1;
					while($row = mysqli_fetch_array($result)) { 
			?>
				<div class="container" style="background-color:white; width:100%;">
				  <form class="form-horizontal" action="home_edit.php" method="POST" enctype="multipart/form-data">
				  
				  
					<div class="form-group" style="background-color:white;">
					  <label class="control-label col-sm-2" for="email">Home Image</label>
					  <div class="col-sm-2">
						<img src="../images/home_gallery/<?php echo $row['home_img1'];?>" width="100px" height="50px"/>				
					  </div>
					  <div class="col-sm-4">
						<input type="hidden" class="form-control" id="home_image1" name="home_image1" value="<?php echo $row['home_img1']; ?>">
						<h5> Upload Home Image </h5>
						<input type="file" name="home_image1" id="home_image1" />
						</div>
					</div>
					
					
					<div class="form-group">        
					  <div class="col-sm-offset-4 col-sm-7">
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
				//echo $user_id = $_POST['user_id'];
								
				echo $item_image1 = $_POST['home_image1'];
				$new_upload_name1 = date('YmdHis')+1;  
				
				$photo_name1 = basename($_FILES['home_image1']['name']);
				$photo_tmp_name1 = $_FILES['home_image1']['tmp_name'];
				if(move_uploaded_file($photo_tmp_name1,"../images/home_gallery/$new_upload_name1.jpg"))
				{
				echo $item_image1 = "$new_upload_name1.jpg";
				}
				
				
                      
				$sql1 = "UPDATE home_details SET home_img1 = '$item_image1' WHERE home_id = 1";  
                
				if (mysqli_query($connect, $sql1))
				  {
					//echo json_encode("Updated Successfully!!!");
					echo '<script> alert("Home Details Updtaed Succeesfully") </script>';
					echo "<script>window.open('home_edit.php','_self')</script>";
				  }
			  }                    
               
            ?>
		
		
	</body>
</html>