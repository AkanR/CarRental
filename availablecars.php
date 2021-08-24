<!-- agency registration page validate login -->
<?php require_once './db-functions/dbconnect.php';?>
<?php require_once 'header.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available cars to rent</title>
</head>
<body>
    <div class="container" style="margin-top: 40px;">
    <center>
        <h1>Available Cars</h1>
        <?php display_message();?>
    </center>
        <div class="row">
        <?php display_cars_available_for_rent(); ?>
        </div>
    </div>
</body>
</html>
<?php
if(isset($_POST['rentcar'])) {
    customersession();
    $car_id = $_POST['car_id'];
    $vehicle_model = $_POST['Vehicle_model'];
    $vehicle_number = $_POST['Vehicle_number'];
    $seating_capacity = $_POST['Seating_capacity'];
    $rent_per_day = $_POST['Rent_per_day'];
    $agency_id = $_POST['Agency_id'];
    $customer_id = $_SESSION['c_id'];
    $noofdays = $_POST['noofdays'];
    $startdate = $_POST['startdate'];
    rentacar($agency_id,$car_id,$customer_id,$noofdays,$startdate,$vehicle_model,$vehicle_number,$seating_capacity,$rent_per_day);
}
?>