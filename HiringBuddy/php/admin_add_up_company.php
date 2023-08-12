<?php
    include('../php/connection.php');

    // SQL query to insert data into database
$company_name = mysqli_real_escape_string($con, $_POST['company_name']);
$company_date = mysqli_real_escape_string($con, $_POST['company_date']);

$insert_sql = "INSERT INTO admin_upcoming (company_name, company_date) VALUES ('$company_name','$company_date')";
 
if($con->query($insert_sql) === TRUE){
//  echo "Record Added Sucessfully";
  echo '<script>alert("Company Inserted Successfully !!!")</script>';
  echo '<script>location.replace("../Admin/admin_upcoming_companies.php")</script>';  
}
else
{
  // echo "Error" . $insert_sql . "<br/>" . $con->error;
  echo '<script>alert("Try Again.......")</script>';
  echo '<script>location.replace("../Admin/admin_upcoming_companies.php")</script>';  
}  
?>