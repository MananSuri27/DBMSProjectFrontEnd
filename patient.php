<?php
$server="localhost";
$username="root";
$password="root";


$con=mysqli_connect($server,$username,$password);

if(!$con){
  die("connection to db failed due to".mysqli_connect_error());
}

//collect variables for patient table
$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$address=$_POST['address'];
$dob=$_POST['dob'];
$medicalHistory=$_POST['medicalHistory'];
$sex=$_POST['sex'];

//sql command
$sql_patient = "INSERT INTO `asmhospital`.`patient`(`sex`, `medical_history`, 
 `address`, `dob`, `firstName`,`lastName`) VALUES ('$sex', 
 '$medicalHistory', '$address', '$dob', '$firstName','$lastName'
  );";
 


//collect variables for contact table
$contact=$_POST['contact'];

$sql_contact=INSERT INTO `asmhospital`.`contact_number`(`contact_number`) VALUES ('$contact'
 );";


 if($con->query($sql_patient)==true && $con->query($sql_contact)){
  echo "Successfully inserted";
}
else{
  echo "ERROR";
}

$con->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Patient</title>
    <link rel="stylesheet" href="style.css"/>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
   <div class="container">
   <h1 > Register Patient</h1>
    
        <div class="col-8">
            <form>
                <div class="form-group">
                  <label for="firstName">First Name</label>
                  <input type="text" class="form-control" name="firstName"  placeholder="Enter first name">
                 
                </div>
                <div class="form-group">
                  <label for="lastName">Last Name</label>
                  <input type="text" class="form-control"  name="lastName" placeholder="Enter last name">
                 
                </div>
                <div class="form-group">
                  <label for="sex">Sex</label>
                  <input type="text" class="form-control" name="sex"  placeholder="Sex">
                 
                </div>
                <div class="form-group">
                  <label for="dob">Date of birth</label>
                  <input type="date" class="form-control" name="dob"  placeholder="dob">
                 
                </div>
                <div class="form-group">
                  <label for="contact">Contact Number</label>
                  <input type="text" class="form-control" name="contact"  placeholder="contact">
                 
                </div>
                <div class="form-group">
                  <label for="address">Address</label>
                  <textarea class="form-control" name="address" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label for="medicalHistory">Medical History</label>
                  <textarea class="form-control" name="medicalHistory" rows="3"></textarea>
                </div>
               
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>

      
    </div>
  </div>
    
   
    

    
</body>
</html>