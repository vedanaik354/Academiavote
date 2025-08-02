<?php
   $connect = mysqli_connect('localhost', 'root', '', 'aca_votingdb');
	   if(!$connect)
	   {
		 	die('Could not connect: ' . mysqli_error());
	   }
	   //echo 'Connected successfully';
?>

<!--
<!DOCTYPE html>
<html lang="en">
<head>
		<title>GFGC Honnavar College Online College Voting System</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
		<script src="../bootstrap/jquery.min.js"></script>
		<script src="../bootstrap/bootstrap.min.js"></script>
</head>
<body>
-->


<!--
 <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal_login" style="margin:10px; margin-right:25px; width:80px;">Login</button>		 -->
   <!--
		<form action="index.php" method="POST">   
 Modal Log In -->
  <!--
  <div class="modal fade" id="myModal_login" role="dialog">
    <div class="modal-dialog"> -->
    
      <!-- Modal content-->
	  <!--
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login</h4>
        </div>
        <div class="modal-body">
      <form>
        <div class="input-group" style="margin:10px;">
          <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
          <input id="username" type="text" class="form-control" name="login_username" placeholder="User Name">
        </div>
        <div class="input-group" style="margin:10px;">
          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
          <input id="password" type="password" class="form-control" name="login_password" placeholder="Password">
        </div>
      </form>
        </div>
        <div class="modal-footer">
		<!--
      <button type="button" class="btn btn-info" data-dismiss="modal">Login</button>
	  -->
<!--	  
	   <input name="btn_login" class="btn btn-info" type="submit" value="Login"/>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
 </form>
--> 

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Academia Vote</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
		<script src="../bootstrap/jquery.min.js"></script>
		<script src="../bootstrap/bootstrap.min.js"></script>
</head>
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


<div class="row" style="margin-top:80px;">
	<div class="col-md-4"> </div>	
	
	<div class="col-md-4">
	
		<form action="index.php" method="post">
		  <div class="imgcontainer">
			<img src="img_avatar2.png" alt="Avatar" class="avatar">
		  </div>
		  
			<label for="uname"><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="login_username" required>

			<label for="psw"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="login_password" required>
				
			<button type="submit" name="btn_login">Login</button>		
		  
		</form>
		
	</div>
		
	<div class="col-md-4"></div>
	

  <?php         
        if(isset($_POST['btn_login']))
        {       
            $username = $_POST['login_username'];
			$password = $_POST['login_password'];
			
			$sql1 = "SELECT * FROM user_details WHERE user_name='$username' AND user_pass='$password'";

			$result = mysqli_query($connect, $sql1);

			if (mysqli_num_rows($result) === 1) {

				$row = mysqli_fetch_assoc($result);

					if ($row['user_name'] === $username && $row['user_pass'] === $password) {

						//echo "Logged in!";
						echo '<script> alert("Welcome to Admin Panel") </script>';
						echo "<script type='text/javascript'> document.location ='main.php'; </script>";
					}
			}
			else{
				echo '<script> alert("Login Failed") </script>';
			}
        }
	?> 
	<!-- End of Btn Save -->
		
	</body>
</html>