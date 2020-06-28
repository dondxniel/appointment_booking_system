<?php 
    session_start();
    include("./assets/inc/header.php");
    include("./assets/inc/conn.php");
?>
<div style = "background-image: url(./assets/img/doctor.jpg); height: 650px; background-size: cover">
    <div style="height: 650px; background-color: rgba(0, 0, 0, 0.4);" >
        <nav class = "navbar navbar-expand-md navbar-dark">
            <a href="index.php" class = "navbar-brand">Appointment Booking</a>
            <button type="button" class = "navbar-toggler" data-toggle="collapse" data-target = "#navbarCollapse">
                <span class = "navbar-toggler-icon"></span>
            </button>

            <div class = "collapse navbar-collapse" id = "navbarCollapse">
                <div class = "navbar-nav">
                    <a href="index.php" class = "nav-item nav-link">Home</a>
                    <!-- <a href="appointment.php" class = "nav-item nav-link">Appointment</a> -->
                    <!-- modal start -->
                    <button type="button" style = "border: none;  background: none;" class="" data-toggle="modal" data-target=".bd-example-modal-sm"><span style = "color: #bbb">Check Your Appointment</span></button>
                    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Login To View Your Appointment Details</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                    </button>
                                </div>
                                <form action="index.php" method = "POST" id = "loginForm">
                                    <?php 
                                    
                                        if(isset($_POST['login_email']) && isset($_POST['login_password'])){
                                            $email = $_POST['login_email'];
                                            $password = $_POST['login_password'];
                                            $sql_login = "SELECT * FROM appointments WHERE email = '".$email."'";
                                            $query_login = mysqli_query($conn, $sql_login);
                                            if(mysqli_num_rows($query_login)){
                                                $fetch_login = mysqli_fetch_assoc($query_login);
                                                if($fetch_login['password'] == $password){
                                                    $_SESSION['appointment'] = $fetch_login['id'];
                                                    header("location: appointment.php");
                                                    echo "<script type = 'text/javascript'>location.href='appointment.php'</script>";
                                                }else{
                                                    echo "<script type = 'text/javascript'>alert('Wrong login details.')</script>";
                                                }
                                            }else{
                                                echo "<script type = 'text/javascript'>alert('Wrong login details.')</script>";
                                            }
                                        }
                                    ?>
                                    <div class="modal-body">
                                            <input type="email" name = "login_email" id = "loginEmail" placeholder = "Enter Email" class="form-control">
                                            <br>
                                            <input type="password" name = "login_password" id = "loginPassword" placeholder = "Enter Password" class="form-control">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button onclick = "checkLogin()" type="button" role = "button" class="btn btn-primary">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- modal end -->
                </div>
            </div>
        </nav>
        <div class = "container">
            <div class="row">
                <div class="col-md-4">
                    <?php
                        if(isset($_GET['full_name']) && isset($_GET['phone_number']) && isset($_GET['email']) && isset($_GET['password']) && isset($_GET['case_id']) && isset($_GET['date_of_birth']) && isset($_GET['date_of_appointment'])){
                            $full_name = $_GET['full_name'];
                            $phone_number = $_GET['phone_number'];
                            $email = $_GET['email'];
                            $password = $_GET['password'];
                            $case_id = $_GET['case_id'];
                            $dob = $_GET['date_of_birth'];
                            $doa = $_GET['date_of_appointment'];
                            $date =  date('Y-m-d');

                            $sql_book_appointment = "INSERT INTO appointments(patient_name, phone_number, email, date_of_birth, case_id, date_booked, date_of_appointment, password) VALUES('".$full_name."', '".$phone_number."', '".$email."', '".$dob."', '".$case_id."', '".$date."', '".$doa."', '".$password."')";
                            $query_book_appountment = mysqli_query($conn, $sql_book_appointment);

                            $sql_login = "SELECT * FROM appointments WHERE email = '".$email."' AND case_id = '".$case_id."' AND date_of_appointment = '".$doa."'";
                            $query_login = mysqli_query($conn, $sql_login);
                            $fetch_login = mysqli_fetch_assoc($query_login);

                            $_SESSION['appointment'] = $fetch_login['id'];
                            // header("location: appointment.php");
                            echo "<script type = 'text/javascript'>location.href='appointment.php'</script>";
                        }
                    ?>
                    <form class = "booking_form text-center" action = "index.php" method = "GET"  id = "bookAppointment"> 
                        <h2>Book an Appointment</h2>
                        <!-- <p>Please fill the form below so we can contact you.</p> -->
                        <div class="form-group">
                            <label for="" class="label">Full Name</label>
                            <input name = "full_name" id = "fullName" type="text" class="form-control" placeholder="First name, middle name and surname.">
                        </div>
                        <div class="form-group">
                            <label for="" class="label">Phone Number</label>
                            <input name = "phone_number" id = "phoneNumber" type="text" class="form-control" placeholder="Please input active mobile number">
                        </div>
                        <div class="form-group">
                            <label for="" class="label">Email</label>
                            <input name = "email" id = "email" type="email" class="form-control" placeholder="Please input active email address">
                        </div>
                        <div class="form-group">
                            <label for="" class="label">Password</label>
                            <input name = "password" id = "password" type="password" class="form-control" placeholder="Please input password">
                        </div>
                        <div class="form-group">
                            <label for="" class="label">Retype Password</label>
                            <input name = "retyped_password" id = "retypedPassword" type="password" class="form-control" placeholder="Please input password">
                        </div>
                        <div class="form-group">
                            <label for="" class="label">Case</label>
                            <select class="form-control" name = "case_id" id = "caseId"> 
                                <option value="">-Select Case-</option>
                                <?php
                                    $sql_cases = "SELECT * FROM cases";
                                    $query_cases = mysqli_query($conn, $sql_cases);
                                    while($fetch_cases = mysqli_fetch_assoc($query_cases)):
                                ?>
                                <option value="<?php echo $fetch_cases['id']?>"><?php echo $fetch_cases['name']?></option>
                                <?php
                                    endwhile;
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="label">Date of Birth</label>
                            <input name = "date_of_birth" id = "dateOfBirth" type="date" class="form-control" placeholder="Date of Birth">
                        </div>
                        <div class="form-group">
                            <label for="" class="label">Date of Appointment</label>
                            <input name = "date_of_appointment" id = "dateOfAppointment" type="date" class="form-control" placeholder="Date of Appointment">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary py-3 px-4" role = "button" type = "button" onclick = "checkSubmit()">Book Appointment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 

<?php include("./assets/inc/footer.php");?>
