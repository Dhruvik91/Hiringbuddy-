<?php
    include('../php/connection.php');

    // SQL query to insert data into database
    $f_name = mysqli_real_escape_string($con, $_POST['f_name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $e_no = mysqli_real_escape_string($con, $_POST['e_no']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    
    $insert_sql = "INSERT INTO s_login_register (f_name, email, e_no , password) VALUES ('$f_name', '$email', '$e_no', '$password')";
    
    if($con->query($insert_sql) === TRUE){
        //  echo "Record Added Sucessfully";
        echo '<script>alert("Registered Successfully!!!")</script>';
        echo '<script>location.replace("../Students/student_login_register.html")</script>';  
    }
    else
    {
        // echo "Error" . $insert_sql . "<br/>" . $con->error;
        echo '<script>alert("Check Your Credentials...")</script>';
        echo '<script>location.replace("../Students/student_login_register.html")</script>';  
    }  
?>