<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Patients</title>
    <Link rel="stylesheet" href="nav.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<div class="cover-container d-flex  h-25  ml-auto mr-auto flex-column">
        <header class="mb-auto">
            <div>
                
                <nav class="nav nav-masthead justify-content-center ">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="allpatients.php">Patients</a>
                    <a class="nav-link" href="search.html">Search</a>
                    <a class="nav-link" href="alldoctors.php">Doctors</a>
                    <a class="nav-link" href="room.html">Book Room</a>
                    <a class="nav-link" href="patient.html">Register patient</a>
                    <a class="nav-link" href="doctorinfo.html">Doctor Info</a>
                </nav>
            </div>
        </header>
    </div>

<div class="col-6 mx-auto">


<?php
   $server="localhost";
   $username="root";
   $password="";


   $con=mysqli_connect($server,$username,$password);
   if(!$con){
       die('connection to this database failed due to '.mysqli_connect_error());
   }else{
    echo '<div class="alert alert-success" >
    Successful connected to the Database!
  </div>';
   }
   $P_ID =$_POST['P_ID'];
   $D_ID=$_POST['D_ID'];
   $Nurse_ID=$_POST['Nurse_ID'];
   $R_TYPE=$_POST['R_TYPE'];
   $R_ID=$_POST['R_ID'];



   $sql1="INSERT INTO `asm hospital`.`attends_to` VALUES ( '$P_ID' , '$D_ID')";

   if($R_TYPE==1){
    $sql2="INSERT INTO `asm hospital`.`assigned_to` VALUES ( '$P_ID' ,  '$R_ID' , NULL)";
    $sql3="INSERT INTO `asm hospital`.`governs` VALUES ( '$Nurse_ID' ,  '$R_ID' , NULL)";
   }else{
    $sql2="INSERT INTO `asm hospital`.`assigned_to` VALUES ( '$P_ID' , NULL ,'$R_ID' )";
    $sql3="INSERT INTO `asm hospital`.`governs` VALUES ( '$Nurse_ID' , NULL, '$R_ID')";

   }


   if($con->query($sql1) == true && $con->query($sql2)== true  && $con->query($sql3)==true ){
    echo '<div class="alert alert-success" >
    Inserted successfully!
  </div>';   }else{
       echo "ERROR <br> $con->error";
   }

   $con->close();
?>


</div>


   
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    
</body>
</html>