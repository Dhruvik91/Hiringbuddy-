<?php
include('../php/connection.php');

// SQL query to delete data from database
$enro_no = mysqli_real_escape_string($con, $_POST['enro_no']);
 
$delete_sql = "DELETE FROM `admin_students` WHERE enro_no = '$enro_no'";
 
if($con->query($delete_sql) === TRUE){
//  echo "Record Added Sucessfully";
  echo '<script>alert("Student Removed Successfully !!!")</script>';
  echo '<script>location.replace("../admin_students/admin_students.php")</script>';  
}
else
{
  // echo "Error" . $insert_sql . "<br/>" . $con->error;
  echo '<script>alert("Try Again.......")</script>';
  echo '<script>location.replace("../admin_students/admin_students.php")</script>';  
}  
?>