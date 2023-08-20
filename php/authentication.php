<?php      
    include('../php/connection.php');  
    $email = $_POST['email'];  
    $password = $_POST['password'];  
      
        //to prevent from mysqli injection  
        $email = stripcslashes($email);  
        $password = stripcslashes($password);  
        $email = mysqli_real_escape_string($con, $email);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select *from admin_login where email = '$email' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            // echo "<h1><center> Login successful </center></h1>";
            echo '<script>alert("Login Successfully!!!")</script>';
			echo '<script>location.replace("../Admin/Admin_home.php")</script>';  
        }  
        else{  
            // echo "<h1> Login failed. Invalid email or password.</h1>";  
            echo '<script>alert("check your credentials...")</script>';
			echo '<script>location.replace("../Admin/Admin_login.html")</script>';
        }     
?>