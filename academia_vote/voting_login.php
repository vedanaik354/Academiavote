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
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1; padding:20px; border-radius:10px;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>
<nav class="navbar navbar-fixed-top" style="background-color:white; margin-right:20px;">
 
    <div class="navbar-header">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Academia Vote</a>
    </div>
	<div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
	<!--
      <li class="active"><a href="index.php">Home</a></li>
	  <li class="active"><a href="candidate.php">Candidate</a></li>
	  <li class="active"><a href="voting_login.php">Voting</a></li>
	  <li class="active"><a href="result.php">Result</a></li>
	-->
    </ul>
	
   <ul class="nav navbar-nav navbar-right">
		<li class="active"><a href="index.php">Home</a></li>
		<li class="active"><a href="about.php">About College</a></li>
	  <li class="active"><a href="candidate.php">Candidate</a></li>
	  <li class="active"><a href="result.php">Result</a></li>
	</ul>
	</div>

</nav>

<div class="row" style="margin-top:80px;">
	<div class="col-md-4"> </div>	
	
	<div class="col-md-4">
	
		<form action="voting_login.php" method="post">
		<!--
		  <div class="imgcontainer">
			<img src="img_avatar2.png" alt="Avatar" class="avatar">
		  </div>
		 -->
			<label for="uname"><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="login_username" required>

			<label for="psw"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="login_password" required>
				
			<button type="submit" name="btn_login">Login</button>		
		  
		</form>
		
	</div>
		
	<div class="col-md-4"></div>
	</div>

  <?php         
        if(isset($_POST['btn_login']))
        {       
            $username = $_POST['login_username'];
			$password = $_POST['login_password'];
			
			$sql1 = "SELECT * FROM student_details WHERE stud_email='$username' AND stud_regno='$password'";

			$result = mysqli_query($connect, $sql1);

			if (mysqli_num_rows($result) === 1) {

				$row = mysqli_fetch_assoc($result);
					
					$stud_course = $row['stud_course'];
					$stud_sem = $row['stud_sem'];
					
					if ($row['stud_email'] === $username && $row['stud_regno'] === $password && $row['stud_vote_status'] === '0') 
					{

						$sql2 = "UPDATE student_details SET stud_vote_status = '1' WHERE stud_regno = '$password'";  
                
						if (mysqli_query($connect, $sql2))
						{
							echo "<script type='text/javascript'> document.location ='voting.php?course=$stud_course&&sem=$stud_sem'; </script>";
						}
						
					}
					
						else
						{
							echo '<script> alert("You Have Already Voted") </script>';
						}
			}
			else{
				echo '<script> alert("Invalid Username or Password") </script>';
			}
        }
	?> 
	<!-- End of Btn Save -->
</div>	
	
<div class="navbar navbar-inverse" style="margin-top:30px;">
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
