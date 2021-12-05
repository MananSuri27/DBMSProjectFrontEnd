<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Information</title>
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
                    <a class="nav-link" href="search.php">Search</a>
                    <a class="nav-link" href="alldoctors.php">Doctors</a>
                    <a class="nav-link" href="room.html">Book Room</a>
                    <a class="nav-link" href="patient.html">Register patient</a>
                    <a class="nav-link" href="doctorInfo.php"></a>
                </nav>
            </div>
        </header>
    </div>

<div class="col-6 mx-auto">

  <h1> Search Results</h1>

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
$D_ID=$_POST['D_ID'];

$sql1 = "SELECT * from `asm hospital`.`doctors` where D_ID=$D_ID";
$result1 = $con->query($sql1);

$sql2="SELECT nurse.Name FROM  `asm hospital`.`nurse`,`asm hospital`.`works_under` where nurse.Nurse_ID=works_under.Nurse_ID AND $D_ID=works_under.D_ID;";

$sql3="SELECT CONCAT(P_First_Name,' ', P_Last_Name) AS 'name' 
From `asm hospital`.`patients`,`asm hospital`.`attends_to`
Where $D_ID= attends_to.D_ID AND Patients.P_ID= attends_to.P_ID;
";




if ($result1->num_rows > 0) {
    while($row = $result1->fetch_assoc()) {
      echo ("<div class='card'><h5 class='card-header'>Patient Name:" . $row['D_Name'] . " </h5><div class='card-body'>
      <h5 class='card-text'>Doctor ID: ". $row['D_ID']. "</h5>
      <p class='card-text'> Work Experience: ".$row['D_Work_Experience']." </p>
      <p class='card-text'> Department: ". $row['D_Department']. "</p>
      <p class='card-text'> Consultation: ". $row['D_Consultation']. "</p>
    </div></div>" );
    }
    $result2 = $con->query($sql2);
    
    // if($result2->num_rows>0){
        echo ("<br><ul class='list-group'>   <li class='list-group-item active'>Nurses under the Doctor</li>");
        while($row = $result2->fetch_assoc()){
            echo(
                "<li class='list-group-item'>".$row['nurse.Name']."</li>"
            );
        }

        echo "</ul> <br>";
        
    // }


    $result3 = $con->query($sql3);

    echo($con->error);
    // if($result3->num_rows > 0){
        echo ("<ul class='list-group'>   <li class='list-group-item active'>Patients under the Doctor</li>");
        while($row = $result3->fetch_assoc()){
            echo(
                "<li class='list-group-item'>".$row['name']."</li>"
            );
        }

        echo "</ul>";
        
    // }


    

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