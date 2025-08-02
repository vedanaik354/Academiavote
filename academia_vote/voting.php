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
	  <!--
	  <a href="#" style="margin:10px; padding:5px;  border:3px solid red;  border-radius: 10px; width:80px; text-align:center;"> Sign Up</a>
	  -->
	  <!-- Trigger the modal with a button 
	  <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal_signup" style="margin:10px; width:80px;">Sign Up</button>
	  </li>
      <li>-->
	  <!--
	  <a href="#" style="margin:10px; padding:5px;  border:3px solid blue;  border-radius: 10px; width:80px; text-align:center; "> Login</a>
	
	  <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal_login" style="margin:10px; margin-right:25px; width:80px;">Login</button>
	  </li>  -->
    </ul>
	</div>

</nav>

<?php   
		$edit_course = $_GET['course'];
		$edit_sem = $_GET['sem'];
		
		$query = "SELECT * FROM candidate_details WHERE can_course = '$edit_course' AND can_sem = '$edit_sem'";
		$result = mysqli_query($connect, $query);  
	?>
			
			<form action="voting.php" method="POST"> 
			<div class="container" style="margin-top:80px;">
			
			<div class="row">
			
				<?php 
						$i = 1;
						while($row = mysqli_fetch_array($result)) { 
					?>
				<div class="col-md-3" style="margin-top:40px">	
					<form method="POST" action="main.php">
						<div class="card" style="width: 25rem; border:1px solid blue; border-radius: 15px;">
							<input type="hidden" name="bname" value="<?php echo $row['can_name']; ?>"/>
							<input type="hidden" name="bauthor" value="<?php echo $row['can_course']; ?>"/>
							<input type="hidden" name="bimage" value="<?php echo $row['can_img']; ?>"/>
							
						  <img src="images/candidates/<?php echo $row['can_img']; ?>" 
						  class="card-img-top" alt="..." width="100%" height="200px" style="border-radius: 15px 15px 0 0;">
						  <div class="card-body" align="center">
							<h3 class="card-title"><b><?php echo $row['can_name']; ?></b></h3>
							<p class="card-text"><?php echo $row['can_course']; ?></p>
							<p class="card-text"><?php echo $row['can_sem']; ?> Sem</p>
							<a class="btn btn-info btn-sm" href="voting_update.php?edit=<?php echo $row['can_id']; ?>">  CLICK TO VOTE </a> </td>
						  </div>
						</div>
					</form>
				</div>
				<?php $i++; }  ?> 
			</div>	
				
		</div>
	</form>



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
