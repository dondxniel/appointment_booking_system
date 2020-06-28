<?php 
    include("./assets/inc/header.php");
    include("./assets/inc/conn.php");
    
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
                <div class="col-md-12 booking_form">
                    <b>APPOINTMENTS</b>
                    <div class = "row">
                        <?php
                            $sql_appointments = "SELECT * FROM appointments";
                            $query_appointments = mysqli_query($conn, $sql_appointments);
                            while($fetch_appointments = mysqli_fetch_assoc($query_appointments)):
                        ?>
                        <a href="appointment_details.php?appointment=<?php echo $fetch_appointments['id']?>"  class = "grey_border" style = "color: #000; text-decoration: none">
                            <div>
                                <b>Name: </b><?php echo $fetch_appointments['patient_name']?> <br>
                                <b>Email: </b><?php echo $fetch_appointments['email']?> <br>
                                <b>Phone Number: </b><?php echo $fetch_appointments['phone_number']?> <br>
                                <b>Appointment Date: </b><?php echo $fetch_appointments['date_of_appointment']?> <br>
                            </div>
                        </a>
                        <?php
                            endwhile;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

<?php include("./assets/inc/footer.php");?>
