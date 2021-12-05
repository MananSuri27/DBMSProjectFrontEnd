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

