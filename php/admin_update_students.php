<?php
include('../php/connection.php');

// SQL query to delete data from database
$enro_no = mysqli_real_escape_string($con, $_POST['enro_no']);
$f_name = mysqli_real_escape_string($con, $_POST['f_name']);
$d_name = mysqli_real_escape_string($con, $_POST['d_name']);
$last_cpi = mysqli_real_escape_string($con, $_POST['last_cpi']);
$status = mysqli_real_escape_string($con, $_POST['status']);
$company = mysqli_real_escape_string($con, $_POST['company']);
$package = mysqli_real_escape_string($con, $_POST['package']);

$update_sql = "UPDATE `admin_students` SET 
 enro_no = '$enro_no', 
 f_name = '$f_name', 
 d_name = '$d_name', 
 last_cpi = '$last_cpi', 
 status = '$status', 
 company = '$company', 
 package = '$package'
 WHERE enro_no = '$enro_no'";

if($con->query($update_sql) === TRUE){
  //  echo "Record Added Sucessfully";
    echo '<script>alert("Student Updated Successfully !!!")</script>';
    echo '<script>location.replace("../admin_students/admin_students.php")</script>';  
  }
  else
  {
    // echo "Error" . $insert_sql . "<br/>" . $con->error;
    echo '<script>alert("Try Again.......")</script>';
    echo '<script>location.replace("../admin_students/admin_students.php")</script>';  
  }  
  ?>
