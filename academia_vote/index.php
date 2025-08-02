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
  <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <script src="bootstrap/jquery.min.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>
  
  
  <style>
	@import url(
'https://fonts.googleapis.com/css2?family=Poppins&display=swap');

* {
    font-family: 'Poppins', sans-serif;
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

.imgbox {
    position: relative;
    width: 100%;
}

.mybtn {
    position: absolute;
    top: 70%;
    left: 40%;
    width: 110px;
    height: 40px;
    border-radius: 10px;
    font-size: 17px;
    border: none;
    box-shadow: rgba(242, 242, 242) 0px 3px 20px;
    transition: 0.3s linear;
}

.mybtn:hover {
    transform: translateY(-5px);
}

img {
    width: 100%;
    margin: 0;
    padding: 0;
    border-radius: 30px;
    box-shadow: rgb(21, 20, 20) 0px 3px 20px;
}

h1 {
    color: rgb(16, 87, 16);
    text-align: center;
    margin-bottom: 20px;
}

p {
    font-size: 20px;
    color: palevioletred;
    font-weight: 700;
    text-align: center;
    margin-bottom: 20px;
}

.box1 {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 90vh;
}
  
  </style>
</head>
<body>

<nav class="navbar navbar-fixed-top" style="background-color:white;">
 
    <div class="navbar-header">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
	<div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">  
    </ul>
	
    <ul class="nav navbar-nav navbar-right">
		<li class="active"><a href="index.php">Home</a></li>
		<li class="active"><a href="about.php">About Us</a></li>
	  <li class="active"><a href="candidate.php">Candidate</a></li>
	  <li class="active"><a href="result.php">Result</a></li>
	  
	 
      

	<li>
	  <button type="button" class="btn btn-success btn-md" style="margin-right:40px; margin-top:10px; width:100px;"><a href="admin/index.php" style="text-decoration:none; color:white;">Admin Login</a></button>
	  </li>	 
    </ul>
	</div>

</nav>

<form action="index.php" method="POST">
  <!-- Modal Sign Up -->
  <div class="modal fade" id="myModal_signup" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sign Up</h4>
        </div>
        <div class="modal-body">
			<form>
				<div class="input-group" style="margin:10px;">
					<span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
					<input id="username" type="text" class="form-control" name="username" placeholder="User Name" required>
				</div>
				<div class="input-group" style="margin:10px;">
				  <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
				  <input id="email" type="text" class="form-control" name="email" placeholder="Email" required>
				</div>
				<div class="input-group" style="margin:10px;">
				  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				  <input id="Password" type="password" class="form-control" name="password" placeholder="Password" required>
				</div>
				<div class="input-group" style="margin:10px;">
				  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				  <input id="ph_no" type="Contact number" class="form-control" name="ph_no" placeholder="Contact number" required>
                </div>
				<div class="input-group" style="margin:10px;">
				  <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
				
					<select id="user_course" name="user_course" style="width:full-width;" class="form-control" required>
					  <option value="">Select Course</option>
					  <option value="B.A">B.A</option>
					  <option value="B.Com">B.Com</option>
					  <option value="B.C.A">B.C.A</option>
					  <option value="B.Sc">B.Sc</option>
					</select>
				</div>
				
				 <div class="input-group" style="margin:10px;">
				  <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
				  <select id="user_sem" name="user_sem" style="width:full-width;" class="form-control" required>
					  <option value="">Select Sem</option>
					  <option value="First">First</option>
					  <option value="Third">Third</option>
					  <option value="Fifth">Fifth</option>
					</select>
				</div>
				<div class="input-group" style="margin:10px;">
					<span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
					<input id="reg_no" type="text" class="form-control" name="reg_no" placeholder="Reg number"required>
				</div>
				<div class="input-group" style="margin:10px;">
				  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				  <input id="gender" type="text" class="form-control" name="gender" placeholder="Gender" required>
				</div>
				 
			</form>
        </div>
        <div class="modal-footer">
			 <input name="btn_save" class="btn btn-success" type="submit" value="Sign Up"/>
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</form> 

	<?php         
        if(isset($_POST['btn_save']))
        {       
            $username = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$ph_no = $_POST['ph_no'];
			$user_course = $_POST['user_course'];
			echo $user_sem = $_POST['user_sem'];
			$reg_no = $_POST['reg_no'];
			$gender = $_POST['gender'];

            $sql = "INSERT INTO user_details(user_name, user_email, user_pass, user_ph, user_course, user_sem, user_reg, user_gen) VALUES ('$username','$email','$password','$ph_no','$user_course','$user_sem','$reg_no','$gender')";

            if(mysqli_query($connect,$sql))
            {
              //echo "<p align='center' > <font color='green'> Record Saved Sucesfully </font> </p>"; 
				echo '<script> alert("User Sign Up Succeesfully") </script>';
            }
            else
            {
              //echo "<p align='center' > <font color='Red'> Record Saved Failed</font> </p>";
				echo '<script> alert("User Sign Up Failed") </script>';
            }
        }
	?> 
	<!-- End of Btn Save -->
	
 
 
	<?php   
		$query = "SELECT * FROM home_details ORDER BY home_id ASC";
		$result = mysqli_query($connect, $query);  
		
		$i = 1;
		while($row = mysqli_fetch_array($result)) { 
		
	?>
	
	
	<div class="box1">
        <div class="box">
            <div class="imgbox">
                <img src= images/home_gallery/<?php echo $row['home_img1']; ?>  alt="">
			
                <button class="btn">
                    <a class="btn btn-primary btn-danger btn-md mybtn" href="voting_login.php" role="button">Vote Now</a>
                </button>
            </div>
        </div>
    </div>
	
	<li>
	  <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#myModal_signup" style="margin-right:20px; margin-top:10px; width:80px;"><a href="voting_login.php" style="text-decoration:none; color:white;"></a></button>
	  </li>	 
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
<!--	
<div class="container-fluid" style="margin-top:50px;">
  <img class="img-responsive" src="images/home_gallery/<?php echo $row['home_img1']; ?>" alt="voting system" width="100%"> 
  <!-- <img class="img-responsive" src="images/home_gallery/home_img.jpg" alt="voting system" width="100%"> 
</div>-->

<?php $i++; } // End of while 
					// mysqli_close($connect); ?>

<div class="navbar navbar-inverse">
    <div class="container">
		<div class="row">
			<div class="col-md-12">
				<h4 align="center" style="color:white;"> © Copyright Academia_vote 2025. All rights reserved.</h4>
			</div>
		</div>
    </div>
</div>

</body>
</html>
