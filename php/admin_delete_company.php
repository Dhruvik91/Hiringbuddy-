<?php
include('../php/connection.php');

// SQL query to delete data from database
$company_name = mysqli_real_escape_string($con, $_POST['company_name']);
 
$delete_sql = "DELETE FROM `admin_companies` WHERE company_name = '$company_name'";
 
if($con->query($delete_sql) === TRUE){
//  echo "Record Added Sucessfully";
  echo '<script>alert("Company Deleted Successfully !!!")</script>';
  echo '<script>location.replace("../Admin/admin_company_page.php")</script>';  
}
else
{
  // echo "Error" . $insert_sql . "<br/>" . $con->error;
  echo '<script>alert("Try Again.......")</script>';
  echo '<script>location.replace("../Admin/admin_company_page.php")</script>';  
}  
?>