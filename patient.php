<?php
// $server="localhost";
// $username="root";
// $password=" ";


// $con=mysqli_connect($server,$username,$password);

// if(!$con){
//   die("connection to db failed due to".mysqli_connect_error());
// }
// else
// {
//   echo "success";
// }

$server="localhost";
   $username="root";
   $password="";


   $con=mysqli_connect($server,$username,$password);
   if(!$con){
       die('connection to this database failed due to '.mysqli_connect_error());
   }
   else{
       echo 'Success';
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
  echo "ERROR";
  echo "ERROR <br> $con->error";
}

$con->close();
?>

