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
	  <li class="active"><a href="gs_result.php">Result</a></li>
    </ul>
	</div>

</nav>
	<center>
		<?php   
				$query = "SELECT * FROM gs_details WHERE status = 'show' ORDER BY can_vote DESC";
				$result = mysqli_query($connect, $query);  
			?>
			
			<form action="candidate_edit.php" method="POST" style="margin-top:80px;"> 
			<div class="container">
				<div class="table-responsive">
					<table class="table table-hover table-condensed table-bordered" style="width:90%;">
						<thead>
						  <tr>
							
											
							<th> Name </th>
							<th> Course </th>							
							<th> Sem </th>							
							<th> Result</th>							
						  </tr>
						</thead>
						<?php 
							$i = 1;
							while($row = mysqli_fetch_array($result)) { 
						?>
						<tbody>
						  <tr>
						  <!--
							<input type="hidden" name="s_id" value="<?php echo $row['can_id']; ?>"/>
							<td> <?php echo $row['gs_id']; ?></td>
							-->
						
							
							<td> <?php echo $row['can_name']; ?></td>
							<td> <?php echo $row['can_course']; ?></td>
							<td> <?php echo $row['can_sem']; ?></td>
							<td> <h3> <?php echo $row['can_vote']; ?></h3></td>
						  </tr>					  
						</tbody>				 		
				
					<?php $i++; } // End of while 
					// mysqli_close($connect); ?> 
				
					 </table>
				</div>
			</div>

	</center>
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
