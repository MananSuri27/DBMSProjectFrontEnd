<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASM Hospital</title>
    <Link rel="stylesheet" href="nav.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<div class="cover-container d-flex  h-25  ml-auto mr-auto flex-column">
        <header class="mb-auto">
            <div>
                
                <nav class="nav nav-masthead justify-content-center ">
                <a class="nav-link" href="home.html">Home</a>
                    <a class="nav-link" href="coverpage.html">About</a>
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
   }
   else{
       echo '<div class="alert alert-success" >
       Successful connected to the Database!
     </div>';
   }

//collect variables for patient table
$firstName=$_POST['P_First_Name'];
$lastName=$_POST['P_Last_Name'];
$address=$_POST['P_Address'];
$dob=$_POST['P_DOB'];
$medicalHistory=$_POST['P_Medical_History'];
$sex=$_POST['P_Sex'];

$dummydate="2006-06-06";
//sql command
// $sql_patient = "INSERT INTO `asm hospital`.`patients`(`sex`, `medical_history`, 
//  `address`, `dob`, `firstName`,`lastName`) VALUES ('$sex', 
//  '$medicalHistory', '$address', NULL , '$firstName','$lastName'
//   );";
$sql_patient=" INSERT INTO `asm hospital`.`patients`(`P_Sex`, `P_Medical_History`, `P_Address`, `P_DOB`, `P_First_Name`, `P_Last_Name`) VALUES ('$sex', 
 '$medicalHistory', '$address', '$dummydate' , '$firstName','$lastName'
  );";
 


//collect variables for contact table
$contact=$_POST['Contact_Number'];




// if($con->query($sql1) == true && $con->query($sql2)== true  && $con->query($sql3)==true ){
//   echo "Inserted successfully";
// }else{
//   echo "ERROR <br> $con->error";
// }

// $con->close();
 if($con->query($sql_patient)==true){
  $last_id = $con->insert_id;
  $sql_contact="INSERT INTO `asm hospital`.`contact_number` VALUES ('$last_id','$contact');";

  $con->query($sql_contact);
  // echo "New record created successfully. Last inserted ID is: " . $last_id;

  // echo "Successfully inserted";
 }
else{
  echo "<br>ERROR <br> $con->error";
}

$con->close();
?>


</div>


   
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    
</body>
</html>