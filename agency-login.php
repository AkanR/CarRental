<!-- Agency login page validate login -->
<?php require_once './db-functions/dbconnect.php';?>
<?php require_once 'header.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agency Login</title>
</head>
<body>
<div class="container">
      <br>
      <?php display_message();?>
    <div class="row">
        <div class=" col-lg-4 col-md-3 col-sm-4 col-xs-4">
        </div>
        <div class=" col-lg-4 col-md-6  col-sm-4 col-xs-4">
            <center>
             <div class="card">
                <div class="card-header">
                        <p style="font-size:30px;">Agency Login</p>
                </div>
                <div class="card-body">
                    <form action="" method="Post">
                        <div class="form-group">
                            <input class="form-control" type="email" placeholder="Email" name="aemail" required="true">
                        </div>
                        <div class="form-group">
                            <input  class="form-control"  type="password" id="myinput" placeholder="Password" name="apassword" required="true">
                        </div>
                        <div class="form-group">
                            <input type="checkbox" onclick="myFunction()">&nbsp;Show password <br>
                        </div>
                        <input class="form-control" type="submit" class="btn btn-info" name="login" value="Login" id="login" style="background-color: #17a2b8; color:white;">
                    </form><br>
                    Are you a new Customer? <a href="./agency-registration.php" class="btn btn-info">Register</a>
                </div>
            </div>
            </center>
        </div>
        <div class=" col-lg-4 col-md-3 col-sm-4 col-xs-4">
        </div>
    </div>
</div>
</body>
</html>
<script>
    function myFunction()
    {
            var x = document.getElementById("myinput");
                    if (x.type === "password") {
            x.type = "text";
            } else {
            x.type = "password";
            }
    }
</script>
<?php
if(isset($_POST['login'])) {
    $emailid = $_POST['aemail'];
    $password = $_POST['apassword'];
    agencylogin($emailid,$password);
}
?>