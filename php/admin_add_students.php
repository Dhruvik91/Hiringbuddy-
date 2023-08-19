<?php
  include('../php/connection.php');

  // SQL query to insert data into database
  $enro_no = mysqli_real_escape_string($con, $_POST['enro_no']);
  $f_name = mysqli_real_escape_string($con, $_POST['f_name']);
  $d_name = mysqli_real_escape_string($con, $_POST['d_name']);
  $last_cpi = mysqli_real_escape_string($con, $_POST['last_cpi']);
  $status = mysqli_real_escape_string($con, $_POST['status']);
  $company = mysqli_real_escape_string($con, $_POST['company']);
  $package = mysqli_real_escape_string($con, $_POST['package']);

  $insert_sql = "INSERT INTO admin_students (enro_no, f_name, d_name, last_cpi, status, company, package) 
  VALUES ('$enro_no', '$f_name', '$d_name', '$last_cpi', '$status', '$company', '$package')";
  
  if($con->query($insert_sql) === TRUE){
  //  echo "Record Added Sucessfully";
    echo '<script>alert("Student Inserted Successfully !!!")</script>';
    echo '<script>location.replace("../admin_students/admin_students.php")</script>';  
  }
  else
  {
    // echo "Error" . $insert_sql . "<br/>" . $con->error;
    echo '<script>alert("Try Again.......")</script>';
    echo '<script>location.replace("../admin_students/admin_students.php")</script>';  
  }  
?>