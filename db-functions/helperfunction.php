<?php

//function for redirecting pages
function redirect($location){
    header("location:$location");
}

//funcion for setting a message
function set_message($msg){

if(!empty($msg)) {

$_SESSION['message'] = $msg;

} else {

$msg = "";


    }
}

//function for displaying a message
function display_message() {

if(isset($_SESSION['message'])) {
      $mess=<<<DELIMETER
        <br><br>
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{$_SESSION['message']}</strong>
        </div>
DELIMETER;
echo $mess;     
unset($_SESSION['message']);
}}

//function for sql query
function query($sql){
    global $conn;
    return mysqli_query($conn, $sql);
}

//function for executing sql query
function confirm($result){
    global $conn;
    if(!$result){
        die("Query failed".mysqli_errno($conn));
    }
}

//function for sql fetch array
 function fetch_array($send_query){
     return mysqli_fetch_array($send_query);
 }

//escaping string characters in sql
function escape($string)
 {
     
      global $conn;
     return mysqli_real_escape_string($conn,$string);
 }

//agency session function
function agencysession()
{
        $query=  query("select * from agenciesdata where a_email='{$_SESSION['aemail']}'");
        confirm($query);
        $row = fetch_array($query);
        $_SESSION['a_id']=$row['a_id'];
        $_SESSION['a_name']=$row['a_name'];
}

//customer session function
function customersession()
{
        $query=  query("select * from customerdata where u_emailid='{$_SESSION['cemail']}'");
        confirm($query);
        $row = fetch_array($query);
        $_SESSION['c_id']=$row['u_id'];
        $_SESSION['c_name']=$row['u_name'];
}
//customer login function
function customerlogin($email,$password)
{
    $result = query("SELECT * FROM customerdata WHERE (u_emailid='" . $email. "') and u_password = '". $password."'");
    confirm($result);
    $row = fetch_array($result);
    if($row['u_emailid']==$email)
    {
        $_SESSION["cemail"]=$email;
        if(isset($_SESSION["cemail"]))
        {
            $location = "./availablecars.php";
            redirect($location);
        }     
    } 
    else
   {
        $message = "Invalid  email or Password!";
        set_message($message);
        $location = "./customer-login.php";
        redirect($location);
    } 
}

//customer registration function
function customerregistration($cname,$cemailid,$cpassword,$ccontact)
{
    $query= query("SELECT u_emailid from customerdata where u_emailid='".$cemailid."'");
    confirm($query);
    $row = fetch_array($query);
    //fetching agencies database
    $query1 = query("SELECT a_email from agenciesdata where a_email='".$cemailid."'");
    confirm($query1);
    $row1 = fetch_array($query1);
    if($cemailid==$row['u_emailid'])
    {
      set_message("Sorry this email id is already regsitered with us!.");
      $location = "./customer-login.php";
      redirect($location);  
    }
    elseif(($cemailid==$row1['a_email']))
    {
        set_message("Sorry this email id is already regsitered with us as an agency!");
        $location = "./customer-registration.php";
        redirect($location);
    }
    else
    { 
        $query2= query("INSERT into customerdata (u_name, u_emailid,u_password,u_contact) values ('$cname','$cemailid','$cpassword','$ccontact')");
        confirm($query2);
        set_message("Congratulation! Account creation successful, login with your email id");
        $location = "./customer-login.php";
        redirect($location); 
    }
}


//agency login function
function agencylogin($email,$password)
{
    $result = query("SELECT * FROM agenciesdata WHERE a_email='" . $email. "' and a_password = '". $password."'");
    confirm($result);
    $row = fetch_array($result);
    if($row['a_email'] == $email)
    {
        $_SESSION["aemail"]=$email;
        if(isset($_SESSION["aemail"]))
        {
            $location = "./view-booked-cars.php";
            redirect($location);
        }     
    } 
    else
    {
        $message = "Invalid  email or Password!";
        set_message($message);
        $location = "./agency-login.php";
        redirect($location);
    }
}

//agency registration function
function agencyregistration($cname,$cemailid,$cpassword,$ccontact)
{
    $query1 = query("SELECT a_email from agenciesdata where a_email ='".$cemailid."'");
    confirm($query1);
    $row1 = fetch_array($query1);
    //fetching customer database
    $query= query("SELECT u_emailid from customerdata where u_emailid ='".$cemailid."'");
    confirm($query);
    $row = fetch_array($query);
    if($row1>1)
    {
        set_message("Sorry this email id is already regsitered with us.");
        $location = "./agency-registration.php";
        redirect($location);
    }
    elseif($row>1)
    {
      set_message("Sorry this email id is already regsitered with us as an agency!");
      $location = "./agency-registration.php";
      redirect($location);  
    }
    else
    { 
        $query2= query("INSERT into agenciesdata (a_name, a_email,a_password,a_contact) values ('$cname','$cemailid','$cpassword','$ccontact')");
        confirm($query2);
        set_message("Congratulation! Account creation successful, login with your email id");
        $location = "./agency-login.php";
        redirect($location); 
    }
}

//function to add cars
function addcars($agency_id,$vehicle_model,$vehicle_number,$seating_capacity,$rent_per_day)
{
    $query= query("INSERT into addcar (agency_id,Vehicle_model,Vehicle_number,Seating_capacity,Rent_per_day) values ('$agency_id','$vehicle_model','$vehicle_number','$seating_capacity','$rent_per_day')");
    confirm($query);
    set_message("Vehicle having number ".$vehicle_number." is added");
}

//function for displaying added cars
function disply_addedcars()
{
    agencysession();
    $query=query("SELECT * FROM addcar WHERE agency_id = '{$_SESSION['a_id']}'");
     confirm($query);
     while($row = fetch_array($query))
     {
         $addedcars= <<<DELIMETER
                 
         <br><br>
         <div class="jumbotron" style="margin-left: 20px;">
              <p><b>Vehicle Model - {$row['Vehicle_model']}</b></p>
              <p><b>Vehicle Number - {$row['Vehicle_number']}</b></p>
              <p><b>Seating Capacity - {$row['Seating_capacity']}</b></p>
              <p><b>Rent Per Day - {$row['Rent_per_day']}</b></p>
              <br>
              <center><button class="btn btn-danger" style="padding-left: 25px; padding-right: 25px;">Edit</button></center>
         </div>     
                 
DELIMETER;
          echo $addedcars;
     }
}

//function to display cars available for rent
function display_cars_available_for_rent()
{
    $query=query("SELECT a.*, b.a_name, b.a_id FROM addcar a, agenciesdata b WHERE a.agency_id = b.a_id");
    confirm($query);
    while($row = fetch_array($query))
     {
         $displaycars= <<<DELIMETER
                 
        <div class="col-lg-4" style="margin-top:50px">
              <div class="jumbotron">
                <p><b>Vehicle Model - {$row['Vehicle_model']}</b></p>
                <p><b>Vehicle Number - {$row['Vehicle_number']}</b></p>
                <p><b>Seating Capacity - {$row['Seating_capacity']}</b></p>
                <p><b>Rent Per Day - {$row['Rent_per_day']}</b></p>
                <p><b>Agency Name - {$row['a_name']}</b></p>
             
                 
DELIMETER;
          if(isset($_SESSION["cemail"]))
          {
              $displayhiddeninputs = <<<DELIMETER
              <form action="" method="post">
              <input class="form-control" type="hidden" name="car_id" value={$row['car_id']} required="true">
              <input class="form-control" type="hidden" name="Vehicle_model" value={$row['Vehicle_model']} required="true">
              <input class="form-control" type="hidden" name="Vehicle_number" value={$row['Vehicle_number']} required="true">
              <input class="form-control" type="hidden" name="Seating_capacity" value={$row['Seating_capacity']} required="true">
              <input class="form-control" type="hidden" name="Rent_per_day" value={$row['Rent_per_day']} required="true">
              <input class="form-control" type="hidden" name="Agency_id" value={$row['agency_id']} required="true">
              <div>
              <select name="noofdays" class="form-control" style="width: 173px;">
                <option value="">Select no. of days</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
              </select>
              </div>
              <br>
              <input type="date" class="form-control" name="startdate" placeholder="Start Date" id="datefield" min="" style="width: 175px;">      
              <br>
              <input class="form-control" type="submit" class="btn btn-info" name="rentcar" value="Rent Car" id="login" style="background-color: #17a2b8; color:white;">
              <form>
              </div>
              </div>
DELIMETER;
          }
else
{
    $displayhiddeninputs = <<<DELIMETER
    <a href="./agency-login.php" class="btn btn-info" style="background-color: #17a2b8; color:white;">Rent Car</a>
    </div>
    </div>
    DELIMETER;
}
          echo $displaycars;
          echo $displayhiddeninputs;
     }
}

//booking function for users for renting the car
function rentacar($agency_id,$car_id,$customer_id,$noofdays,$startdate,$vehicle_model,$vehicle_number,$seating_capacity,$rent_per_day)
{
    $query= query("INSERT into bookings (car_id,agency_id,customer_id,No_of_days,startdate) values ('$car_id','$agency_id','$customer_id','$noofdays','$startdate')");
    confirm($query);
    set_message("Rented a vehicle having number ".$vehicle_number);
    $location = "./availablecars.php";
    redirect($location);
}

//view bookings for agencies
function view_bookings($agency_id)
{
    $query = query("SELECT a.*,b.* FROM addcar a, bookings b where a.agency_id = {$agency_id} AND a.car_id = b.car_id");
    confirm($query);
    while($row = fetch_array($query))
    {
        $customer_id = $row['customer_id'];
        $query1 = query("SELECT * FROM customerdata where u_id = $customer_id");
        confirm($query1);
        $row1 = fetch_array($query1);
        $totalcost = $row['No_of_days'] * $row['Rent_per_day'];
         $displaybookings= <<<DELIMETER
            <tr>
            <td>{$row['booking_id']}</td>
            <td>{$row['Vehicle_number']}</td>
            <td>{$row1['u_name']}</td>
            <td>{$row1['u_emailid']}</td>
            <td>{$row1['u_contact']}</td>
            <td>{$row['Rent_per_day']}</td>
            <td>{$row['No_of_days']}</td>
            <td>{$totalcost}</td>
            <td>{$row['startdate']}</td>
            </tr>         
DELIMETER;
        echo $displaybookings;
    }

}
?>