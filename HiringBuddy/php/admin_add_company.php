<?php
    include('../php/connection.php');

    // SQL query to insert data into database
$company_id = mysqli_real_escape_string($con, $_POST['company_id']);
$company_name = mysqli_real_escape_string($con, $_POST['company_name']);
 
$insert_sql = "INSERT INTO admin_companies (company_id, company_name) VALUES ('$company_id', '$company_name')";
 
if($con->query($insert_sql) === TRUE){
//  echo "Record Added Sucessfully";
  echo '<script>alert("Company Inserted Successfully !!!")</script>';
  echo '<script>location.replace("../Admin/admin_company_page.php")</script>';  
}
else
{
  // echo "Error" . $insert_sql . "<br/>" . $con->error;
  echo '<script>alert("Try Again.......")</script>';
  echo '<script>location.replace("../Admin/admin_company_page.php")</script>';  
}  
?>