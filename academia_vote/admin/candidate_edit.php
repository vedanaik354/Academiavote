<?php
   $connect = mysqli_connect('localhost', 'root', '', 'votingdb');
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
		  <h2 style="background-color:silver; padding:10px; text-align:center; margin-top:10px;">Admin Panel - Candidate Update</h2>
		  
		  <div class="row">
			<div class="col-md-12">
				 <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal_add_can" style="margin:10px; width:150px;">Add Candidate</button>
			</div>
		  </div>
		  
<form class="form-horizontal" action="candidate_edit.php" method="POST" enctype="multipart/form-data">
 <!-- Modal Sign Up -->
  <div class="modal fade" id="myModal_add_can" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Candidate</h4>
        </div>
        <div class="modal-body">
      <form>
		<div class="input-group" style="margin:10px;">
          <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
          <input id="can_img" type="file" class="form-control" name="can_img" placeholder="Candidate Image">
        </div>
        
        <div class="input-group" style="margin:10px;">
          <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
          <input id="can_name" type="text" class="form-control" name="can_name" placeholder="Candidate Name">
        </div>
		
		 <div class="input-group" style="margin:10px;">
          <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
        
			<select id="can_course" name="can_course" style="width:full-width;" class="form-control">
			  <option value="">Select Course</option>
			  <option value="B.A">B.A</option>
			  <option value="B.Com">B.Com</option>
			  <option value="B.C.A">B.C.A</option>
			  <option value="B.Sc">B.Sc</option>
			</select>
        </div>
		
		 <div class="input-group" style="margin:10px;">
          <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
          <select id="can_sem" name="can_sem" style="width:full-width;" class="form-control">
			  <option value="">Select Sem</option>
			  <option value="First">Ist</option>
			  <option value="Third">3rd</option>
			  <option value="Fifth">5th</option>
			</select>
        </div>
       
      </form>
        </div>
        <div class="modal-footer">
		<!--
      <button type="button" class="btn btn-success" name="btn_save" data-dismiss="modal">Sign Up</button>
	  -->
	  <input name="btn_save" class="btn btn-success" type="submit" value="Save"/>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</form>

  
	<?php         
        if(isset($_POST['btn_save']))
        {      
			echo $can_image = $_POST['can_img'];
			$new_upload_name_gal = date('YmdHis')+14;  
			
			$photo_name_gal = basename($_FILES['can_img']['name']);
			$photo_tmp_name_gal = $_FILES['can_img']['tmp_name'];
			if(move_uploaded_file($photo_tmp_name_gal,"../images/candidates/$new_upload_name_gal.jpg"))
			{
			$can_image = "$new_upload_name_gal.jpg";
			}
				
           
			$can_name = $_POST['can_name'];
			$can_course = $_POST['can_course'];
			$can_sem = $_POST['can_sem'];
			
            $sql = "INSERT INTO candidate_details(can_img, can_name, can_course, can_sem, can_status) VALUES ('$can_image', '$can_name', '$can_course', '$can_sem', 'show')";

            if(mysqli_query($connect,$sql))
            {
              //echo "<p align='center' > <font color='green'> Record Saved Sucesfully </font> </p>"; 
				echo '<script> alert("candidate Added Succeesfully") </script>';
            }
            else
            {
              //echo "<p align='center' > <font color='Red'> Record Saved Failed</font> </p>";
				echo '<script> alert("candidate Added Failed") </script>';
            }
        }
	?> 
	<!-- End of Btn Save -->
	
	
		  
			<?php   
				$query = "SELECT * FROM candidate_details ORDER BY can_id ASC";
				$result = mysqli_query($connect, $query);  
			?>
			
			<form action="candidate_edit.php" method="POST"> 
			<div class="container">
				<div class="table-responsive">
					<table class="table table-hover table-condensed" style="width:90%;">
						<thead>
						  <tr>
							<th> Id </th>
							<th> Image </th>							
							<th> Name </th>
							<th> Course </th>							
							<th> Sem </th>							
							<th> Edit </th>
							<th> Delete </th>
						  </tr>
						</thead>
						<?php 
							$i = 1;
							while($row = mysqli_fetch_array($result)) { 
						?>
						<tbody>
						  <tr>
							<input type="hidden" name="s_id" value="<?php echo $row['can_id']; ?>"/>
							<td> <?php echo $row['can_id']; ?></td>
							<td> <img src="../images/candidates/<?php echo $row['can_img']; ?>" width="50px" height="50px"/></td>
							
							<td> <?php echo $row['can_name']; ?></td>
							<td> <?php echo $row['can_course']; ?></td>
							<td> <?php echo $row['can_sem']; ?></td>
							
							<td> 
								<!--
								<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal_signup">Edit</button>
								-->
								<!--
								<a data-toggle="modal" data-userid="<?php // echo $user['user_id']; ?>" href="#myModal_signup" 
									class="btn btn-warning btn-sm">Edit </a>
								-->
								<a class="btn btn-info btn-sm" href="user_edit.php?edit=<?php echo $row['can_id']; ?>">Edit </a>

							</td>
							<td> 
								<!-- <button type="button" class="btn btn-danger btn-sm">Delete</button> 
								<input name="btn_del" class="btn btn-danger btn-sm" type="submit" value="Delete"/> -->
								
								<a class="btn btn-danger btn-sm" href="candidate_del.php?del=<?php echo $row['can_id']; ?>">  Delete </a> </td>
								
							</td>
						  </tr>					  
						</tbody>				 		
				
					<?php $i++; } // End of while 
					// mysqli_close($connect); ?> 
				
					 </table>
				</div>
			</div>
			</form>
			

		</div>
				
	</body>
</html>