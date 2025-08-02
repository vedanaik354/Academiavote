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
    </ul>
	
    <ul class="nav navbar-nav navbar-right">
      <li class="active"><a href="../index.php">Home</a></li>
	  <li class="active"><a href="result.php">Result</a></li>	  
    </ul>
	</div>

</nav>

<?php  
		
		$query = "SELECT * FROM gs_details";
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
						 
						  <div class="card-body" align="center">
							<h3 class="card-title"><b><?php echo $row['can_name']; ?></b></h3>
							<p class="card-text"><?php echo $row['can_course']; ?></p>
							<p class="card-text"><?php echo $row['can_sem']; ?> Sem</p>
							<a class="btn btn-info btn-sm" href="gs_voting_update.php?edit=<?php echo $row['gs_id']; ?>" style="margin-bottom:10px;">  CLICK TO VOTE </a> </td>
						  </div>
						</div>
					</form>
				</div>
				<?php $i++; }  ?> 
			</div>	
				
		</div>
	</form>



<div class="navbar navbar-inverse" style="margin-top:250px;">
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
