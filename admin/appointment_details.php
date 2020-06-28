<?php 
    include("./assets/inc/header.php");
    include("./assets/inc/conn.php");
    if(!isset($_GET['appointment'])){
        header("location: home.php");
    }else{
        $ap = $_GET['appointment'];
    }
?>

<div style = "background-image: url(./assets/img/doctor.jpg); height: 650px; background-size: cover">
    <div style="height: 650px; background-color: rgba(0, 0, 0, 0.4);" >
        <nav class = "navbar navbar-expand-md navbar-dark">
            <span class = "navbar-brand">
                Appointment Booking
            </span>
            <button type="button" class = "navbar-toggler" data-toggle="collapse" data-target = "#navbarCollapse">
                <span class = "navbar-toggler-icon"></span>
            </button>

            <div class = "collapse navbar-collapse" id = "navbarCollapse">
                <div class = "navbar-nav">
                    <!-- <a href="index.php" class = "nav-item nav-link">Home</a> -->
                    <a href="logout.php" class = "nav-item nav-link">Logout</a>
                </div>
            </div>
        </nav>
        <div class="margin_100"></div>
        <div class = "container">
            <div class="row">
                <div class="col-md-4 booking_form">
                    <?php
                        $sql_ap = "SELECT * FROM appointments WHERE id = '".$ap."'";
                        $query_ap = mysqli_query($conn, $sql_ap);
                        $fetch_ap = mysqli_fetch_assoc($query_ap);
                    ?>
                    <div class = "row">
                        <div class = "grey_border">
                            <b>NAME: </b><?php echo $fetch_ap['patient_name'] ?>
                        </div>
                        <div class = "grey_border">
                            <b>EMAIL: </b><?php echo $fetch_ap['email'] ?>
                        </div>
                        <div class = "grey_border">
                            <b>DATE OF BIRTH: </b><?php echo $fetch_ap['date_of_birth'] ?>
                        </div>
                        <div class = "grey_border">
                            <b>CASE: </b>
                            <?php
                                $sql_case = "SELECT * FROM cases WHERE id = '".$fetch_ap['case_id']."'";
                                $query_case = mysqli_query($conn, $sql_case);
                                $fetch_case = mysqli_fetch_assoc($query_case);
                                echo $fetch_case['name'];
                            ?>
                        </div>
                        <div class = "grey_border">
                            <b>DATE BOOKED: </b><?php echo $fetch_ap['date_booked'] ?>
                        </div>
                        <div class = "grey_border">
                            <b>APPOINTMENT DATE: </b><?php echo $fetch_ap['date_of_appointment'] ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-6 booking_form">
                    <b>SEND MESSAGE TO THE PATIENT</b>
                    <div class = "row">
                        <?php
                            if(isset($_GET['message'])){
                                $ap = $_GET['appointment'];
                                $message = $_GET['message'];
                                $time = date("h:i");
                                $date = date("Y-m-d");

                                $sql_message = "INSERT INTO messages(appointment_id, message, time, date) VALUES('".$ap."', '".$message."', '".$time."', '".$date."')";
                                $query_message = mysqli_query($conn, $sql_message);

                                header("location: appointment_details.php?appointment=".$ap."&msg=1");
                            }
                        ?>
                        <form action="appointment_details.php" method = "GET" style = "margin: 15px 0 0 15px">
                            <?php
                                if(isset($_GET['msg'])){
                                    echo "<p class ='small text-success'>Your message has been successfully sent.</p>";
                                }
                            ?>
                            <input type="hidden" name="appointment" value = "<?php echo $ap?>">
                            <textarea name="message" id="" cols="30" rows="10" class = "form-control"></textarea>
                            <button type = "submit" role = "submit" class = "btn btn-primary" style = "margin-top: 5px">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

<?php include("./assets/inc/footer.php");?>
