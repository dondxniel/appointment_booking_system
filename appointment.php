<?php 
    session_start();
    if(!isset($_SESSION['appointment'])){
        header("location: index.php");
    }
    include("./assets/inc/header.php");
    include("./assets/inc/conn.php");
    $sql_appointment_details = "SELECT * FROM appointments WHERE id = '".$_SESSION['appointment']."'";
    $query_appointment_details = mysqli_query($conn, $sql_appointment_details);
    $fetch_appointment_details = mysqli_fetch_assoc($query_appointment_details);
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
                    <div class = "row">
                        <div class = "grey_border">
                            <b>NAME: </b><?php echo $fetch_appointment_details['patient_name']?>
                        </div>
                        <div class = "grey_border">
                            <b>EMAIL: </b><?php echo $fetch_appointment_details['email']?>
                        </div>
                        <div class = "grey_border">
                            <b>DATE OF BIRTH: </b><?php echo $fetch_appointment_details['date_of_birth']?>
                        </div>
                        <div class = "grey_border">
                            <b>CASE: </b>
                            <?php 
                                $sql_case = "SELECT * FROM cases WHERE id = '".$fetch_appointment_details['case_id']."'";
                                $query_case = mysqli_query($conn, $sql_case);
                                $fetch_case = mysqli_fetch_assoc($query_case);
                                echo $fetch_case['name'];
                            ?>
                        </div>
                        <div class = "grey_border">
                            <b>DATE BOOKED: </b><?php echo $fetch_appointment_details['date_booked']?>
                        </div>
                        <div class = "grey_border">
                            <b>APPOINTMENT DATE: </b><?php echo $fetch_appointment_details['date_of_appointment']?>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-6 booking_form">
                    <b>DOCTOR'S MESSAGES</b>
                    <div class = "row">
                        <?php
                            $sql_messages = "SELECT * FROM messages WHERE appointment_id = '".$_SESSION['appointment']."'";
                            $query_messages = mysqli_query($conn, $sql_messages);
                            if(mysqli_num_rows($query_messages)):
                                while($fetch_messages = mysqli_fetch_assoc($query_messages)):
                        ?>
                        <div class = "grey_border">
                            <?php echo $fetch_messages['message']?>
                            <div class = "text-right small">
                                <span><?php echo $fetch_messages['time']?></span>
                                <br>
                                <span><?php echo $fetch_messages['date']?></span>
                            </div>
                        </div>
                        <?php
                                endwhile;
                            else:
                                echo "<p style = 'padding: 30px 0 0 15px'>Your doctor hasn't sent you any messages at this time.</p>";
                            endif;
                        ?>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div> 

<?php include("./assets/inc/footer.php");?>
