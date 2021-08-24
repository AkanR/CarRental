<!-- Add Cars -->
<?php require_once './db-functions/dbconnect.php';?>
<?php require_once 'header.php';?>
<?php
/*if(isset($_SESSION["aemail"]))
{*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Cars</title>
</head>
<body>
    <div class="container" style="margin-top: 40px;">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-6">
                <div>
                    <center>
                        <h1>Add a Car</h1>
                        <br><br>
                        <form action="" method="post">
                            <?php display_message(); ?>
                            <div class="form-group">
                            <input class="form-control" type="text" placeholder="Vehicle Model" name="vehicle_model" required="true">
                            </div>
                            <div class="form-group">
                            <input class="form-control" type="text" placeholder="Vehicle Number" name="vehicle_number" required="true" pattern=".{1,10}">
                            </div>
                            <div class="form-group">
                            <input  class="form-control"  type="text" placeholder="Seating Capacity" name="seating_capacity" required="true" pattern = "[0-9]" maxlength="3">
                            </div>
                            <div class="form-group">
                            <input  class="form-control"  type="text" placeholder="Rent Per Day" name="rent_per_day" required="true">
                            </div>
                            <input class="form-control" type="submit" class="btn btn-info" id="btn-info" name="addcar" value="ADD" style="background-color: #17a2b8; color:white;">
                        </form>
                    </center>
                    
                </div>
            </div>
                <?php
                    //adding cars
                    if(isset($_POST['addcar'])) {
                        agencysession();
                        $vehicle_model = $_POST['vehicle_model'];
                        $vehicle_number = $_POST['vehicle_number'];
                        $seating_capacity = $_POST['seating_capacity'];
                        $rent_per_day = $_POST['rent_per_day'];
                        $agency_id = $_SESSION['a_id'];
                        addcars($agency_id,$vehicle_model,$vehicle_number,$seating_capacity,$rent_per_day);
                    }
                ?>
            <div class="col-lg-6 col-md-6 col-xs-6">
                <div style="border-left: 3px solid grey;">
                    <center>
                        <h1>Cars Added</h1>
                    </center>
                        <?php disply_addedcars(); ?>                  
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
/*
}
else
{
    $location = "./index.php";
    redirect($location);
}*/
?>