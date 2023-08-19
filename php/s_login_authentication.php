<?php      
    include('connection.php');  
    $e_no = $_POST['e_no'];  
    $password = $_POST['password'];  
      
        //to prevent from mysqli injection  
        $e_no = stripcslashes($e_no);  
        $password = stripcslashes($password);  
        $e_no = mysqli_real_escape_string($con, $e_no);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select *from s_login_register where e_no = '$e_no' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            // echo "<h1><center> Login successful </center></h1>";
            echo '<script>alert("Login Successfully!!!")</script>';
			echo '<script>location.replace("../Students/s_home_main.html")</script>';  
        }  
        else{  
            // echo "<h1> Login failed. Invalid e_no or password.</h1>";  
            echo '<script>alert("check your credentials...")</script>';
			echo '<script>location.replace("../Students/student_login_register.html")</script>';
        }     
?>