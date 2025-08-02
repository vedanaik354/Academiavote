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
      
      
    </ul>
    
    <ul class="nav navbar-nav navbar-right">
      <li class="active"><a href="index.php">Home</a></li>
        <li class="active"><a href="about.php">About College</a></li>
      <li class="active"><a href="candidate.php">Candidate</a></li>
      <li class="active"><a href="result.php">Result</a></li>
    </ul>
    </div>

</nav>

<div class="container" style="margin-top:60px;">
  <div class="row">
    <div class="col-sm-12">
    <h1 align="center">Candidates</h1>
    </div>
  </div>
</div>

<div class="container" style="margin-top:0px; margin-bottom:10px;">
    <?php   
        $query = "SELECT * FROM candidate_details ORDER BY can_course ASC";
        $result = mysqli_query($connect, $query);  
        
        $i = 1;
        while($row = mysqli_fetch_assoc($result)) { 
    ?>
    
    <div class="col-md-4">
       
            <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:10px; margin-top:20px; text-align:center;"  >   
            
               <img src="images/candidates/<?php echo $row['can_img']; ?>" class="img-responsive" style="width:500px; height:300px;" /><br />  
               <h3 class="text-info"><?php echo $row["can_name"]; ?></h3> 
              <h4 class="text-info"><?php echo $row["can_course"]; ?></h4> 
              <h4 class="text-info"><?php echo $row["can_sem"]; ?></h4> 
                 
               
      </div>  

</div>      
<?php $i++; } // End of while 
                    // mysqli_close($connect); ?>       
        
</div>

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