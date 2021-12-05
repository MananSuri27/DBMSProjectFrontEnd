<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Patients</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>

<div class="col-6 mx-auto">

  <h1> All Doctors</h1>

<?php
$server="localhost";
$username="root";
$password="";


$con=mysqli_connect($server,$username,$password);
if(!$con){
    die('connection to this database failed due to '.mysqli_connect_error());
}else{
    echo 'Success';
}

$sql = "SELECT * from `asm hospital`.`doctors`";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo ("<div class='card'><h5 class='card-header'>Patient Name:" . $row['D_Name'] ."</h5><div class='card-body'>
    <h5 class='card-text'>Doctor ID: ". $row['D_ID']. "</h5>
    <p class='card-text'> Work Experience: ".$row['D_Work_Experience']." </p>
    <p class='card-text'> Department: ". $row['D_Department']. "</p>
    <p class='card-text'> Consultation: ". $row['D_Consultation']. "</p>
  </div>
  </div>" );
  }
} else {
  echo "0 results";
}



$con->close();

?>


 


</div>


   
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    
</body>
</html>