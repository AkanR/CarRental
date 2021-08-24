<!-- Agency login page validate login -->
<?php require_once './db-functions/dbconnect.php';?>
<?php require_once 'header.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booked Cars</title>
</head>
<body>
<div class="container" style="margin-top: 40px;">
    <center>
        <h1>Booked Cars</h1>
    </center>
        <table border="1" style="margin-top: 40px; width:100%;" >
            <thead>
            <tr>
            <th>Booking Id</th>
            <th>Model Number</th>
            <th>Customer Name</th>
            <th>Customer Email</th>
            <th>Customer Contact</th>
            <th>Rent per Day</th>
            <th>No. of Days</th>
            <th>Total Cost</th>
            <th>starting Date</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            agencysession();
            $agency_id = $_SESSION['a_id'];
            view_bookings($agency_id); 
            ?>
            </tbody>          
        </table>           
</div>    
</body>
</html>