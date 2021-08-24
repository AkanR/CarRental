<?php require 'db-functions/dbconnect.php'; ?>
<!-- checking session -->
<?php
if(isset($_SESSION["cemail"])) 
{
    $location = "./availablecars.php";
    redirect($location);
}
elseif(isset($_SESSION["aemail"]))
{
    $location = "./view-booked-cars.php";
    redirect($location); 
}
?>
<!-- checking session  ending-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Agency</title>
</head>
<body style="background-image: url('./images/home-page-bg.jpg'); background-repeat: no-repeat; background-size: cover;">
    <?php require 'header.php'; ?>
   <center>
       <div class="container">
       <div style="margin-top: 70px;">
           <h1 style="color: white; font-size: 50px;">WELCOME TO RENT CAR</h1>
           <h1 style="color: white; font-size: 40px;">Rates so low, you won’t think twice</h1>
       </div>
       <div class="jumbotron" style="width: 600px;opacity: 0.5;">
            <h2>Demo Credentials</h2>
            <h2>For Agency</h2>
            <h5>Email Id: tmagento01@gmail.com  Pass: 12345</h5>
            <h5>Email Id: agency2@gmail.com  Pass: 12345</h5>
            <h2>For Customer</h2>
            <h5>Email Id: ronwes2017302@gmail.com  Pass: 12345</h5>
       </div>
       </div>
       
   </center>
    <div>

    </div>
</body>
</html>