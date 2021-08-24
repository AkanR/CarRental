<?php require_once './db-functions/dbconnect.php';?>
<?php
//for agencies
if(isset($_SESSION["aemail"]))
{
?>
<header id="hdesign">
  <nav class="navbar navbar-default navbar-fixed-top navbar-expand-lg navbar-dark" style="color: white; background-color:black; ">
    <div class="container">
      <a class="navbar-brand" href="./view-booked-cars.php" style="font-weight: 700; font-size:30px;"><i>Rent A Car</i></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown" style="font-family: 'unbuntu'; font-size: 20px;">
        <ul class="navbar navbar-nav end">
          <li class="nav-item">
            <a class="nav-link" href="./addcars.php" style="color: white;"><b>Add cars</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./view-booked-cars.php" style="color: white;"><b>Bookings</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./logout.php" style="color: white;"><b>Logout</b></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
<?php
}
//for customers
elseif(isset($_SESSION["cemail"]))
{
?>
<header id="hdesign">
  <nav class="navbar navbar-default navbar-fixed-top navbar-expand-lg navbar-dark" style="color: white; background-color:black; ">
    <div class="container">
      <a class="navbar-brand" href="./availablecars.php" style="font-weight: 700; font-size:30px;"><i>Rent A Car</i></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown" style="font-family: 'unbuntu'; font-size: 20px;">
        <ul class="navbar navbar-nav end">
          <li class="nav-item">
            <a class="nav-link" href="./availablecars.php" style="color: white;"><b>Available cars</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./logout.php" style="color: white;"><b>Logout</b></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
<?php
}
//for no login headers
else
{
?>
<header id="hdesign">
  <nav class="navbar navbar-default navbar-fixed-top navbar-expand-lg navbar-dark" style="color: white; background-color:black; ">
    <div class="container">
      <a class="navbar-brand" href="index.php" style="font-weight: 700; font-size:30px;"><i>Rent A Car</i></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown" style="font-family: 'unbuntu'; font-size: 20px;">
        <ul class="navbar navbar-nav end">
          <li class="nav-item">
            <a class="nav-link" href="./agency-login.php" style="color: white;"><b>Agencies</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./customer-login.php" style="color: white;"><b>Login</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./availablecars.php" style="color: white;"><b>Available cars to rent</b></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
<?php
}
?>