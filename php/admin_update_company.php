<?php
include('./connection.php');

$company_id = mysqli_real_escape_string($con, $_POST['company_id']);
$company_name = mysqli_real_escape_string($con, $_POST['company_name']);

$update_sql = "UPDATE admin_companies SET company_id='$company_id' where company_name='$company_name'";

if ($con->query($update_sql) === TRUE) {
    echo '<script>alert("Company updated Successfully !!!")</script>';
    echo '<script>location.replace("../Admin/admin_company_page.php")</script>';  
  }
  else
  {
    // echo "Error" . $update_sql . "<br/>" . $con->error;
    echo '<script>alert("OOPS!!!!, Try Again.......")</script>';
    echo '<script>location.replace("../Admin/admin_company_page.php")</script>';  
  }

$con->close();
?>