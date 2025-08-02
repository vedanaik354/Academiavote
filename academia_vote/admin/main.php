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
			<a href="gs_result.php">Result(GS)</a>
			<a href="../index.php">Logout</a>			
		</div>

		<div class="main">
		  <h2 style="background-color:silver; padding:10px; text-align:center; margin-top:10px;">Admin Panel</h2>		
		
	</body>
</html>