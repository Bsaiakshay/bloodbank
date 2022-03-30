<?php 
session_start();

if (isset($_SESSION['name']) && isset($_SESSION['password'])) 
{
?>
 <!DOCTYPE html>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="style.css">
<style>
body{
  background-image: url("ackground1.jpg"); 
  background-repeat:no-repeat;
  background-size:cover;

 }
 
</style>
</head>
<body>
  <div style="float:right">
  <a href="logout.php" class="button">Logout</a>
</div>
  <div class="model">
    <div class="botton">
      <form action="donor2.php">
       <div class="donor">
        <button class="button button1">donor details</button>
       </div>
      </form>
      </div>  
       <div class="botton1">
          <form action="patient2.php">
           <div class="patient"> 
            <button class="button button1">patient details</button>
           </div>
       </div>
  </div>


</body>
</html>


<?php 
}else{
     header("Location: login page2.php");
     exit();
}
 ?>