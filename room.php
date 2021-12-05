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
   $P_ID =$_POST['P_ID'];
   $D_ID=$_POST['D_ID'];
   $Nurse_ID=$_POST['Nurse_ID'];
   $R_Type=$_Post['R_Type'];
   $R_ID=$_Post['R_ID'];



   $sql1="INSERT INTO `asm hospital`.`attends_to` VALUES ( '$P_ID' , '$D_ID')";

   if($R_Type==1){
    $sql2="INSERT INTO `asm hospital`.`assigned_to` VALUES ( '$P_ID' ,  '$R_ID' , NULL)";
    $sql3="INSERT INTO `asm hospital`.`agoverns` VALUES ( '$Nurse_ID' ,  '$R_ID' , NULL)";
   }else{
    $sql2="INSERT INTO `asm hospital`.`assigned_to` VALUES ( '$P_ID' , NULL ,'$R_ID' )";
    $sql3="INSERT INTO `asm hospital`.`agoverns` VALUES ( '$Nurse_ID' , NULL, '$R_ID')";

   }


   if($con->query($sql1) == true && $con->query($sql2)== true  && $con->query($sql3)==true ){
       echo "Inserted successfully";
   }else{
       echo "ERROR <br> $con->error";
   }

   $con->close();
?>