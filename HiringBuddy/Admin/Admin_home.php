<!-- php code to diplay details of Students and companies -->
<?php
    include('../php/connection.php');

    $p_count_sql = "SELECT * FROM admin_students where status = 'placed';";
    $p_count_result = $con->query($p_count_sql);
    $p_rowcount = mysqli_num_rows( $p_count_result );

    $up_count_sql = "SELECT * FROM admin_students where status = 'unplaced';";
    $up_count_result = $con->query($up_count_sql);
    $up_rowcount = mysqli_num_rows( $up_count_result );

    $ap_count_sql = "SELECT * FROM admin_students where status = 'applied';";
    $ap_count_result = $con->query($ap_count_sql);
    $ap_rowcount = mysqli_num_rows( $ap_count_result );

    $tc_count_sql = "SELECT * FROM admin_companies;";
    $tc_count_result = $con->query($tc_count_sql);
    $tc_rowcount = mysqli_num_rows( $tc_count_result );

    $con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiring Buddy</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src=" https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <script src="../JS/Admin_home.js"></script>
    <link rel="stylesheet" href="../CSS/Admin_home.css">
    <link rel="stylesheet" href="../CSS/admin_company_page.css" />
    <link rel="stylesheet" href="../CSS/Add_company.css" />

    <!-- Favicon  -->
    <link rel="icon" href="../landing_page/images/fav-icon-white.png">
</head>

<body>
    <div class="nav_div">
        <!-- <p class="logo">
            <a href="#" style="text-decoration: none; color: black">Hiring Buddy 🤝</a>
        </p> -->
        <a href="../landing_page/index.html">
            <img class="logo" src="../images/logo.png" alt="">
        </a>
        <section>
            <nav class="shift">
                <ul>
                    <li><a href="../admin_students/admin_students.php" style="text-decoration: none;">Students</a></li>
                    <li><a href="./admin_company_page.php" style="text-decoration: none;">companies</a></li>
                    <!-- <li><a href="#" style="text-decoration: none;">profile</a></li> -->
                    <!-- <li><a href="#"></a></li> -->
                    <!-- <li><a href="#"></a></li> -->
                </ul>
            </nav>
        </section>
        <div class="logout">
            <button><a href="./Admin_login.html">Logout</a></button>
        </div>
    </div>
    <div class="row" style="justify-content:center;">
        <div class="col-sm-2" style="margin: 3rem 2rem 2rem 2rem;">
            <div class="card" style="width:15rem;">
                <div class="card-body"
                    style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <h5 class="card-title ">
                        <?php 
                            echo $p_rowcount;
                        ?>
                    </h5>
                    <p class="card-text">Placed Students </p>
                    <a href="../admin_students/admin_students.php" class="btn btn-primary"
                        style="background-color: rgb(63, 63, 63)">Check Now</a>
                </div>
            </div>
        </div>
        <div class="col-sm-2" style="margin: 3rem 2rem 2rem 2rem;">
            <div class="card" style="width:15rem;">
                <div class="card-body"
                    style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <h5 class="card-title">
                        <?php 
                            echo $ap_rowcount;
                        ?>
                    </h5>
                    <p class="card-text">Applied Students</p>
                    <a href="../admin_students/admin_students.php" class="btn btn-primary"
                        style="background-color: rgb(63, 63, 63)">Check Now</a>
                </div>
            </div>
        </div>
        <div class="col-sm-2" style="margin: 3rem 2rem 2rem 2rem;">
            <div class="card" style="width:15rem;">
                <div class="card-body"
                    style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <h5 class="card-title">
                        <?php 
                            echo $up_rowcount;
                        ?>
                    </h5>
                    <p class="card-text">Unplaced Students</p>
                    <a href="../admin_students/admin_students.php" class="btn btn-primary"
                        style="background-color: rgb(63, 63, 63)">Check Now</a>
                </div>
            </div>
        </div>
        <div class="col-sm-2" style="margin: 3rem 2rem 2rem 2rem;">
            <div class="card" style="width:15rem;">
                <div class="card-body"
                    style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <h5 class="card-title">
                        <?php 
                            echo $tc_rowcount;
                        ?>
                    </h5>
                    <p class="card-text">Total Companies</p>
                    <a href="./admin_company_page.php" class="btn btn-primary" style="background-color: rgb(63, 63, 63)"">Check Now</a>
                </div>
            </div>
        </div>
    </div>

    <div style=" display: flex; height: 23rem; justify-content: space-evenly; margin: 4rem 0rem 4rem 0rem;">
                        <canvas id="barchart" style="max-width:600px;width: 5rem;height: 3rem;"></canvas>
                        <canvas id="doughnutchart" style="max-width:600px;"></canvas>
                </div>
                
                    <!-- <div class="top_buttons container mt-5">
                        <button id="add_company" class="btn btn-primary add_button">New</button>
                        <form action="../php/admin_new_notice.php" method="post">
                            <div class="add_popup">
                                <div class="close-btn">&times;</div>
                                <div class="AD_form">
                                    <h2>New Notice</h2>
                                    <div>
                                        <label for="subject">Subject : </label>
                                        <input type="text" name="subject" id="subject"
                                            placeholder="Enter Subject" required />
                                    </div>
                                    <div>
                                        <label for="msg">Message : </label>
                                        <input type="textarea" name="msg" id="msg"
                                            placeholder="Enter Message" required />
                                    </div>
                                    <button type="submit">Submit</button>
                                </div>
                            </div>
                        </form> -->

                        <!-- Update the comapny details -->
                        <!-- <button id="update_company" class="btn btn-primary add_button">Update</button>
                        <form action="../php/admin_update_notice.php" method="post">
                            <div class="update_popup">
                                <div class="close-btn">&times;</div>
                                <div class="AD_form">
                                    <h2>Update Notice</h2>
                                    <div>
                                        <label for="subject">Subject : </label>
                                        <input type="text" name="subject" id="subject"
                                            placeholder="Enter Subject" required />
                                    </div>
                                    <div>
                                        <label for="msg">Message : </label>
                                        <input type="textarea" name="msg" id="msg"
                                            placeholder="Enter Message" required />
                                    </div>
                                    <button type="submit">Submit</button>
                                </div>
                            </div>
                        </form> -->

                        <!-- <button class="btn btn-primary delete_buttons"> Delete </button> -->
                        <!-- <button id="delete_company" class="btn btn-primary delete_buttons"> Remove </button>
                        <form action="../php/admin_delete_notice.php" method="post">
                            <div class="delete_popup">
                                <div class="close-btn">&times;</div>
                                <div class="AD_form">
                                    <h2>Remove Notice</h2>
                                    <div>
                                        <label for="subject">Subject : </label>
                                        <input type="text" name="subject" id="subject"
                                            placeholder="Enter Subject" required />
                                    </div>
                                    <button type="submit">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="container">
                        <img src="../images/board.png" alt="Notebook" style="width:100%;">
                        <div class="content">
                            <h1>Hello Students</h1>
                            <form action="" method="post" class="content-form">
                                <h4>Subject: Regarding bla bla </h4> 
                                <p>
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae delectus voluptates
                                    eligendi facilis sequi incidunt a totam tempore nihil, cum quis omnis optio repellat
                                    aliquid
                                    nesciunt ipsam atque. Repellat odit quod sapiente quae ipsum.
                                </p>
                            </form>
    
                        </div>
                    </div> -->


                <!-- Remove the container if you want to extend the Footer to full width. -->
                <div>
                    <!-- Footer -->
                    <footer class="text-center text-lg-start text-white" style="background-color:rgb(43, 43, 43);">
                        <!-- Grid container -->
                        <div class="p-4 pb-0">
                            <!-- Section: Links -->
                            <section class="">
                                <!--Grid row-->
                                <div class="row">
                                    <!-- Grid column -->
                                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                                        <h6 class="text-uppercase mb-4 font-weight-bold">
                                            Hiring Buddy
                                        </h6>
                                        <img src="../images/Admin_home.jpeg" style="width: 16rem;height: 13rem;">
                                    </div>
                                    <!-- Grid column -->

                                    <hr class="w-100 clearfix d-md-none" />

                                    <!-- Grid column -->
                                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                                        <h6 class="text-uppercase mb-4 font-weight-bold">Students</h6>
                                        <p>
                                            <a class="text-white">Placed Students</a>
                                        </p>
                                        <p>
                                            <a class="text-white">Unplaced Students</a>
                                        </p>
                                        <p>
                                            <a class="text-white">Applied Students</a>
                                        </p>
                                        <p>
                                            <a class="text-white"></a>
                                        </p>
                                    </div>
                                    <!-- Grid column -->

                                    <hr class="w-100 clearfix d-md-none" />

                                    <!-- Grid column -->
                                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                                        <h6 class="text-uppercase mb-4 font-weight-bold">
                                            Companies
                                        </h6>
                                        <p>
                                            <a class="text-white">Total companies</a>
                                        </p>
                                        <p>
                                            <a class="text-white">Upcoming companies</a>
                                        </p>
                                        <p>
                                            <a class="text-white"></a>
                                        </p>
                                        <p>
                                            <a class="text-white"></a>
                                        </p>
                                    </div>

                                    <!-- Grid column -->
                                    <hr class="w-100 clearfix d-md-none" />

                                    <!-- Grid column -->
                                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                                        <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                                        <!-- <p><i class="fas fa-home mr-3"></i> LDRP-ITR, Gandhinagar, Gujarat, Bharat.</p>
                                        <p><i class="fas fa-envelope mr-3"></i> helphiringbuddy@gmail.com</p> -->
                                        <!-- <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                                        <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p> -->
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3666.103141503015!2d72.63654211447427!3d23.239333514024697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395c2b933477ba9f%3A0xe440409e66bea08a!2sLDRP%20Institute%20of%20Technology%20and%20Research!5e0!3m2!1sen!2sin!4v1671622995922!5m2!1sen!2sin"
                                            width="265" height="240" style="border:0;" allowfullscreen="" loading="lazy"
                                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                    <!-- Grid column -->
                                </div>
                                <!--Grid row-->
                            </section>
                            <!-- Section: Links -->

                            <hr class="my-3">

                            <!-- Section: Copyright -->
                            <section class="p-3 pt-0">
                                <div class="row d-flex align-items-center">
                                    <!-- Grid column -->
                                    <div class=" col-lg-12 text-center text-md-start">
                                        <!-- Copyright -->

                                        © 2020 Copyright:
                                        <a href="./Admin_login.html">HiringBuddy.com</a>

                                        <!-- Copyright -->
                                    </div>
                                </div>
                            </section>
                            <!-- Section: Copyright -->
                        </div>
                        <!-- Grid container -->
                    </footer>
                    <!-- Footer -->
                </div>
                <!-- End of .container -->


</body>
<script>
    // --------------bar cahrt---------------
    var xValues = ["2018", "2019", "2020", "2021", "2022"];
    var yValues = [188, 177, 199, 202, 209];
    // var barColors = ["black"];

    new Chart("barchart", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            legend: { display: false },
            title: {
                display: true,
                text: "Last 5 years Placement chart"
            },
            scales: {
                xAxes: [{
                    barThickness: 40,  // number (pixels) or 'flex'
                    maxBarThickness: 8 // number (pixels)
                }]
            }
        }
    });

    // -------------------doughnut chart--------------------
    var xValues = ["Computer Engineering", "Mechanical Engineering", "Civil Engineering", "Electical Engineering",
        "Chemical Engineering", "Aeronautical Engineering"];
    var yValues = [85, 29, 34, 24, 21, 16];
    var barColors = [
        "#b91d47",
        "#00aba9",
        "#2b5797",
        "#e8c3b9",
        "#1e7145",
        "#881248"
    ];

    new Chart("doughnutchart", {
        type: "doughnut",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            title: {
                display: true,
                text: "Placement of 2021"
            }
        }
    });
</script>


<script>
    document
        .querySelector("#add_company")
        .addEventListener("click", function () {
            document.querySelector(".add_popup").classList.add("active");
        });

    document
        .querySelector(".add_popup .close-btn")
        .addEventListener("click", function () {
            document.querySelector(".add_popup").classList.remove("active");
        });
    document
        .querySelector("#delete_company")
        .addEventListener("click", function () {
            document.querySelector(".delete_popup").classList.add("active");
        });

    document
        .querySelector(".delete_popup .close-btn")
        .addEventListener("click", function () {
            document.querySelector(".delete_popup").classList.remove("active");
        });
    document
        .querySelector("#update_company")
        .addEventListener("click", function () {
            document.querySelector(".update_popup").classList.add("active");
        });

    document
        .querySelector(".update_popup .close-btn")
        .addEventListener("click", function () {
            document.querySelector(".update_popup").classList.remove("active");
        });  
</script>

<script src=" https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
<!-- <canvas id="myChart" style="width:100%;max-width:600px"></canvas> -->

</html>