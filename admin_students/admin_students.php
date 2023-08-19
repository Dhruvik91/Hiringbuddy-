<?php
include('../php/connection.php');

// SQL query to select data from database
$display_sql = " SELECT * FROM admin_students ORDER BY enro_no ASC ";
$result = $con->query($display_sql);

$con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hiring Buddy</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

    <script src=" https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <!-- Filter table JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>

    <script src="../JS/Admin_home.js"></script>
    <link rel="stylesheet" href="../CSS/Admin_home.css" />
    <link rel="stylesheet" href="../CSS/admin_company_page.css" />
    <link rel="stylesheet" href="../CSS/Add_company.css" />
    <link rel="stylesheet" href="../CSS/admin_students.css" />
    <!-- Favicon  -->
    <link rel="icon" href="../landing_page/images/fav-icon-white.png">
</head>

<body>
    <div class="nav_div">
        <a href="../Admin/Admin_home.php">
            <img class="logo" src="../images/logo.png" alt="">
        </a>
        <section>
            <nav class="shift">
                <ul>
                    <li><a href="#" style="text-decoration: none;padding-bottom: 4px;
        border-bottom-style: solid;
        border-bottom-width: 3.1px;
        width: fit-content; cursor: pointer;">Students</a></li>
                    <li>
                        <a href="../Admin/admin_company_page.php" style="text-decoration: none;">companies</a>
                    </li>
                    <!-- <li><a href="#" style="text-decoration: none">profile</a></li> -->
                    <!-- <li><a href="#"></a></li> -->
                    <!-- <li><a href="#"></a></li> -->
                </ul>
            </nav>
        </section>
        <div class="logout">
            <button><a href="../Admin/Admin_login.html">Logout</a></button>
        </div>
    </div>

    <div style="width: 90%; margin-left: 4.4rem;" class="mt-4">
        <div style="display: flex; justify-content: space-between;">
            <div class="top_buttons">

                <button id="add_company" class="btn btn-primary add_button">Add</button>
                <form id="myForm" action="../php/admin_add_students.php" method="post">
                    <div class="add_popup">
                        <div class="close-btn">&times;</div>
                        <div class="AD_form">
                            <h2>Add Student</h2>

                            <label for="enro_no">Enrollment No. : </label>
                            <input type="text" name="enro_no" id="enro_no" placeholder=" Enter Enrollment No."
                                required />
                            <br>

                            <label for="f_name">Full Name : </label>
                            <input type="text" name="f_name" id="f_name" placeholder=" Enter Full Name" required />
                            <br>

                            <label for="d_name">Department Name :</label>
                            <select name="d_name" id="d_name" required>
                                <option value="none" selected>Select Department Name</option>
                                <option value="Computer Engineering">Computer Engineering</option>
                                <option value="Mechanical Engineering">Mechanical Engineering</option>
                                <option value="Civil Engineering">Civil Engineering</option>
                                <option value="Electrical Engineering">Electrical Engineering</option>
                                <option value="Chemical Engineering">Chemical Engineering</option>
                                <option value="Aeronautical Engineering">Aeronautical Engineering</option>
                            </select>
                            <br>

                            <label for="last_cpi">Last CPI : </label>
                            <input type="tel" name="last_cpi" id="last_cpi" placeholder=" Enter Last Semester's CPI"
                                min="6.5" max="10" required />
                            <br>

                            <label for="status"> Status : </label>
                            <select id="status" name="status" onchange="enable(this)" required>
                                <option value="none">Select Status</option>
                                <option value="placed">Placed</option>
                                <option value="unplaced">Unplaced</option>
                                <option value="applied">Applied</option>
                            </select>
                            <br>

                            <div id="placed" class="d-none">
                                <label for="company">comapny name:</label>
                                <select name="company" id="company" required>
                                    <option value="none" selected>Select Company Name</option>
                                    <option value="capgemini">capgemini</option>
                                    <option value="tesla">Tesla</option>
                                    <option value="tata">Tata</option>
                                </select>
                                <br>
                                <label for="package">Package <sub> In LPA </sub> :</label>
                                <input type="number" name="package" id="package" placeholder="Enter Package Detail"
                                    min="1" step="0.01" />
                            </div>

                            <div id="applied" class="d-none">
                                <label for="company">comapny name:</label>
                                <select name="company" id="company" required>
                                    <option value="none">Select Company Name</option>
                                    <option value="capgemini">capgemini</option>
                                    <option value="tesla">Tesla</option>
                                    <option value="tata">Tata</option>
                                </select>
                                <br>
                            </div>

                            <button type="submit" onclick="submit_func()">Submit</button>
                        </div>
                    </div>
                </form>

                <!-- Update the comapny details -->
                <button id="update_company" class="btn btn-primary add_button">Update</button>
                <form action="../php/admin_update_up_company.php" method="post">
                    <div class="update_popup">
                        <div class="close-btn">&times;</div>
                        <div class="AD_form">
                            <h2>Update Student</h2>

                            <!-- <div>
                                <label for="company_name">Company Name : </label>
                                <input type="tel" name="company_name" id="company_name" placeholder="Enter Company Name"
                                    required />
                            </div>
                            <div>
                                <label for="company_date">Company Date : </label>
                                <input type="date" name="company_date" id="company_date"
                                    placeholder="Select Company Date" required />
                            </div> -->

                            <label for="enro_no">Enrollment No. : </label>
                            <input type="text" name="enro_no" id="enro_no" placeholder=" Enter Enrollment No."
                                required />
                            <br>

                            <label for="f_name">Full Name : </label>
                            <input type="text" name="f_name" id="f_name" placeholder=" Enter Full Name" required />
                            <br>

                            <label for="d_name">Department Name :</label>
                            <select name="d_name" id="d_name" required>
                                <option value="none" selected>Select Department Name</option>
                                <option value="Computer Engineering">Computer Engineering</option>
                                <option value="Mechanical Engineering">Mechanical Engineering</option>
                                <option value="Civil Engineering">Civil Engineering</option>
                                <option value="Electrical Engineering">Electrical Engineering</option>
                                <option value="Chemical Engineering">Chemical Engineering</option>
                                <option value="Aeronautical Engineering">Aeronautical Engineering</option>
                            </select>
                            <br>

                            <label for="last_cpi">Last CPI : </label>
                            <input type="tel" name="last_cpi" id="last_cpi" placeholder=" Enter Last Semester's CPI"
                                min="6.5" max="10" required />
                            <br>

                            <label for="status"> Status : </label>
                            <select id="status" name="status" onchange="enable(this)" required>
                                <option value="none">Select Status</option>
                                <option value="placed">Placed</option>
                                <option value="unplaced">Unplaced</option>
                                <option value="applied">Applied</option>
                            </select>
                            <br>

                            <div id="placed" class="d-none">
                                <label for="company">comapny name:</label>
                                <select id="company" name="company" required>
                                    <option value="none">Select Company Name</option>
                                    <option value="capgemini">capgemini</option>
                                    <option value="tesla">Tesla</option>
                                    <option value="tata">Tata</option>
                                </select>
                                <br>
                                <label for="package">Package <sub> In LPA </sub> :</label>
                                <input type="number" name="package" id="package" placeholder="Enter Package Detail"
                                    min="1" step="0.01" />
                            </div>

                            <div id="applied" class="d-none">
                                <label for="company">comapny name:</label>
                                <select name="company" id="company" required>
                                    <option value="none">Select Company Name</option>
                                    <option value="capgemini">capgemini</option>
                                    <option value="tesla">Tesla</option>
                                    <option value="tata">Tata</option>
                                </select>
                                <br>
                            </div>

                            <button type="submit">Submit</button>
                        </div>
                    </div>
                </form>

                <!-- <button class="btn btn-primary delete_buttons"> Delete </button> -->
                <button id="delete_company" class="btn btn-primary delete_buttons"> Remove </button>
                <form action="../php/admin_delete_student.php" method="post">
                    <div class="delete_popup">
                        <div class="close-btn">&times;</div>
                        <div class="AD_form">
                            <h2>Remove Student</h2>
                            <div>
                                <label for="enro_no">Enrollment No. : </label>
                                <input type="text" name="enro_no" id="enro_no" placeholder="Enter Enrollment No."
                                    required />
                            </div>
                            <button type="submit">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="search_button">
                <input id="gfg" type="text" placeholder="&nbsp; 🕵️‍♂️  &nbsp;Search Student...">
            </div>
        </div>
        <hr>
        <div style="height: 24.7rem; overflow-y: scroll;width: auto; border-radius: 5px;
        box-shadow: 4px 4px 8px 4px rgb(223, 220, 220);">
            <table class="table table-striped" style="width: 100%; margin: 0rem 0rem 0rem 0rem;">

                <tr>
                    <th>Enrollment No.</th>
                    <th>Full Name</th>
                    <th>Department Name</th>
                    <th>Last CPI</th>
                    <th>Status</th>
                    <th>Company</th>
                    <th>Package <sub>In LPA</sub></th>
                </tr>

                <tbody id="geeks">
                    <?php
                        // $col_name = 'company_name';
                        // LOOP TILL END OF DATA
                        while($rows=$result->fetch_assoc())
                        {
                            ?>
                    <tr>
                        <td>
                            <?php 
                                    echo $rows['enro_no'];
                                    ?>
                        </td>
                        <td>
                            <?php 
                                    echo $rows['f_name'];
                                    ?>
                        </td>
                        <td>
                            <?php 
                                    echo $rows['d_name'];
                                    ?>
                        </td>
                        <td>
                            <?php 
                                    echo $rows['last_cpi'];
                                    ?>
                        </td>
                        <td>
                            <?php 
                                    echo $rows['status'];
                                    ?>
                        </td>
                        <td>
                            <?php 
                                    echo $rows['company'];
                                    ?>
                        </td>
                        <td>
                            <?php 
                                    echo $rows['package'];
                                    ?>
                        </td>
                        <?php
                            }
                            ?>
                    </tr>
                </tbody>
            </table>
        </div>


    </div>

    <!-- Remove the container if you want to extend the Footer to full width. -->
    <div class="my-5">
        <!-- Footer -->
        <footer class="text-center text-lg-start text-white" style="background-color: rgb(43, 43, 43)">
            <!-- Grid container -->
            <div class="container p-0 pb-0">
                <!-- Section: Links -->
                <section class="">
                    <!--Grid row-->
                    <div class="row">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">
                                Hiring Buddy
                            </h6>
                            <img src="../images/Admin_home.jpeg" style="width: 16rem; height: 13rem" />
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
                            <h6 class="text-uppercase mb-4 font-weight-bold">Companies</h6>
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
                                width="265" height="240" style="border: 0" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!--Grid row-->
                </section>
                <!-- Section: Links -->

                <hr class="my-3" />

                <!-- Section: Copyright -->
                <section class="p-3 pt-0">
                    <div class="row d-flex align-items-center">
                        <!-- Grid column -->
                        <div class="col-lg-12 text-center text-md-start">
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
<script>
    $(document).ready(function () {
        $("#gfg").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#geeks tr").filter(function () {
                $(this).toggle($(this).text()
                    .toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

<script type="text/javascript">
    function enable(answer) {
        console.log(answer.value);
        if (answer.value == "placed") {
            document.getElementById('placed').classList.remove('d-none');
            document.getElementById('applied').classList.add('d-none');
            document.getElementBy
        } else if (answer.value == "applied") {
            document.getElementById('placed').classList.add('d-none');
            document.getElementById('applied').classList.remove('d-none');
        } else {
            document.getElementById('placed').classList.add('d-none');
            document.getElementById('applied').classList.add('d-none');
        }
    };
    function submit_func() {
        document.getElementById("myForm").submit();
    }
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