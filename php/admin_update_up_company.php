<?php
include('../php/connection.php');

$company_name = mysqli_real_escape_string($con, $_POST['company_name']);
$company_date = mysqli_real_escape_string($con, $_POST['company_date']);

$update_sql = "UPDATE admin_upcoming SET company_date='$company_date' where company_name='$company_name'";

if ($con->query($update_sql) === TRUE) {
    echo '<script>alert("Company updated Successfully !!!")</script>';
    echo '<script>location.replace("../Admin/admin_upcoming_companies.php")</script>';  
  }
  else
  {
    // echo "Error" . $update_sql . "<br/>" . $con->error;
    echo '<script>alert("OOPS!!!!, Try Again.......")</script>';
    echo '<script>location.replace("../Admin/admin_upcoming_companies.php")</script>';  
  }

$con->close();
?>