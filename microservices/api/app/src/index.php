<?php
error_reporting(0);
session_start();
  if(isset($_POST["login"]))
  {
  $usr = $_POST["uname"];
  $pss = $_POST["psw"];
  $con = mysqli_connect("localhost","root","","pdc");
  mysqli_select_db($con,"pdc");
  $sel="select * from patient where p_username = '".$usr."' AND password = '".$pss."'";
  $exe=mysqli_query($con,$sel);
  $total_rows = mysqli_num_rows($exe);
  if($total_rows == 1)
  {
    $fetch=mysqli_fetch_array($exe);
    $_SESSION['udid']=$fetch['p_username'];
    echo '<script>window.location="patient.php"</script>';
  }
  if($total_rows == 0)
  {
    echo '<script>alert("Please Check your Username and Password");</script>';
}
}
if(isset($_POST["reg"]))
  {

  $email = $_POST['email'];
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "<script>alert('Provide Valid Email');</script>";
  }
  else
  {
    include('reg.php');
  }
}
if(isset($_POST["login_doc"]))
{
  include('login_doc.php');
}
if(isset($_POST['reg_doc']))
{
  $email = $_POST['email'];
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "<script>alert('Provide Valid Email');</script>";
  }
  else
  {
  include('reg_doc.php');
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-1.9.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-1.9.1.min.js"></script>
  <script sr="js/bootstrap.min.js"></script>
  <style >
/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    width: 100%;
}
.bg-2
{
     margin-left: 70px;
     margin-top: 10px;
}
.bg-3
{
     margin-left: 70px;
     margin-top: 20px;
}
.bg-4
{
    background-color:brown;
}
.bg-2
{
    background-color: red;
}
.bg-1
{
  margin-left: 70px;
}
.glyphicon
{
  color: white;
  font-size: 30px;
}
.abt
{
  font-family:Comic Sans MS, Comic Sans, cursive;
}
.footer
{
   background-color:blue;
    opacity: 0.7;
    height: 80px;
    color: white;
    text-align: center;
    font-family:Comic Sans MS, Comic Sans, cursive;
    font-size: 30px;
    padding-top: 20px;

}
</style>
</head>
<body >
  <div class="container-fluid ">
    <div class="row">
      <div class="col-sm-7">
        <a href="index.php" style="text-decoration:none"><h1 class="header1">PatientDoctorConnect</h1></a>
      </div>
      <div class="col-sm-5">
        <h3 class="header3">Care today, Just a CLICK away...</h3>
      </div>
    </div>
  </div>
<div class="container-fluid hello" id="navbar">
  <div class="row ">
    <div class="col-xs-3 col-sm-6 col-lg-9">
      <a href="index.php"><h3 class="glyphicon glyphicon-home"></h3></a>
    </div>
    <div class=" col-xs-3 col-sm-2 col-lg-1">
      <h3 class="headinghi">You Are:</h3>
    </div>
    <div class=" col-xs-3 col-sm-2 col-lg-1">
      <h3 class="heading5" onclick="document.getElementById('id01').style.display='block'">Patient</h3>
    </div>
    <div class="col-xs-3 col-sm-2 col-lg-1">
      <h3 class="heading4" onclick="document.getElementById('id03').style.display='block'">Doctor</h3>
    </div>
  </div>
</div>
<div>
<div class="container-fluid ">
  <div class="col-md-12 col-xs-12 col-lg-12">
  <br> 
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
  <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="hospital/3.jpg" alt="Los Angeles" style="width:100%;">
        </div>
        <div class="item">
          <img src="hospital/2.jpg" alt="Chicago" style="width:100%;">
        </div>
      <div class="item">
        <img src="hospital/surface-Hub-Healthcare.png" alt="New york" style="width:100%;">
      </div>
      
      </div>
    </div>
 <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  </div>
</div>
<br>
<br>
<br>
<div>
  <div class="col-md-12 text-center"><h1>About Us</h1> </div>
  <h3 style="text-align:center" class="abt"><p >Patient Doctor Connect is a platform for immediate consulatancy from various doctor around the globe.Any patient could get immediate consulatancy from doctor who are avaialable online</p>
  <p>If no doctor is able to respond to querry of a patient then after a fixed amount of time an AI would respond to the query giving result in first a few seconds</p></h3>
</div>
<br>
<br>
<br>
<div>
<div class="container-fluid text-center">
  <div class="col-md-12">
  <h1>Common Diseases</hi>
</div>
</div>
<div class="container-fluid">
  <div class="col-md-4 ">
      <img src="hospital/clf.jpg" class="img-circle bg-2"  id="id1" width="350" height="350" >
      <div class="text-center" id="id2">
        <h2><h1>Fever & Cold </h1><p><h4 style="font-family:Comic Sans MS, Comic Sans, cursive;">Any body temperature above the normal oral measurement of 98.6 Fahrenheit(37 Celcius)or the normal rectal temperature of 99 F(37.2 C) is considered elevated.</h4></p></h2>
       </div>
  </div>
  <div class="col-md-4">
      <img src="hospital/head.jpg" class="img-circle bg-1" id="id3" width="350" height="350">
      <div class="text-center" id="id4">
        <h2><h1>Headache </h1><p><h4 style="font-family:Comic Sans MS, Comic Sans, cursive;">It is sympton of pain anywhere in the region of head or neck. It occurs in migraines ,tension type headache.</h4></p></h2>
       </div>
  </div>
  <div class="col-md-4 ">
      <img src="hospital/gas.jpg" class="img-circle bg-3"  id="id5" width="350" height="350">
      <div class="text-center" id="id6">
        <h2><h1>Gastric </h1><p><h4 style="font-family:Comic Sans MS, Comic Sans, cursive;">Gastric pain is commonly used to describe pain or discomfort in the upper abdomen.Other sympton typically include heartburn,bloating.</h4> </p></h2>
       </div>
  </div>
</div>

<br>
<br>
<br>
<div class="col-md-12 footer">
    © 2017 PatientDoctorConnect Pvt. Ltd. All rights reserved
</div>

<div id="id01" class="modal">
  <div onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">X</div>
  <form class="modal-content model1" method="POST" >
    <div class="row">
      <div class="col-md-12">
      <h1 class="aa">Login</h1>
    </div>
      <div class="col-md-12">
      <label><b>Username</b></label>
    </div>
    <div class="col-md-12">
      <input type="text" class="form-control" placeholder="Enter Username" name="uname" required>
    </div>
    <div class="col-md-12">
      <label><b>Password</b></label>
    </div>
    <div class="col-md-12">
      <input type="password" class="form-control" placeholder="Enter Password" name="psw" required>
        
      </div>
      <div class="col-md-12"><button name="login">Login</button><button onclick="myfunction()">Register</button></div>
    </div>
  </form>
</div>
<div id="id02" class="modal">
  <div onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">X</div>
  <form class="modal-content1 model2" method="POST" >
    <div class="row">
      <div class="col-md-12">
      <h1 class="aa">Register</h1>
    </div>
      <div class="col-md-12">
      <label><b >Username</b></label>
    </div>
    <div class="col-md-12">
      <input type="text" class="form-control" placeholder="Enter Username" name="uname" required>
    </div>
     <div class="col-md-12">
      <label><b>Name</b></label>
    </div>
    <div class="col-md-12">
      <input type="text" class="form-control" placeholder="Enter Name" name="name" required>
    </div>
     <div class="col-md-12">
      <label><b>Age</b></label>
    </div>
    <div class="col-md-12">
      <input type="text" class="form-control" placeholder="Enter Age" name="age" required>
    </div>
     <div class="col-md-12">
      <label><b>Phone no</b></label>
    </div>
    <div class="col-md-12">
      <input type="text" class="form-control"0 placeholder="Enter Phone Number" name="number" required>
    </div>
     <div class="col-md-12">
      <label><b>Email</b></label>
    </div>
    <div class="col-md-12">
      <input type="text" class="form-control" placeholder="Enter email" name="email" required>
    </div>
     <div class="col-md-12">
      <label><b>District</b></label>
    </div>
    <div class="col-md-12">
      <input type="text" class="form-control" placeholder="Enter District" name="district" required>
    </div>
     <div class="col-md-12">
      <label><b>Pin</b></label>
    </div>
    <div class="col-md-12">
      <input type="text" class="form-control" placeholder="Enter Pin" name="pin" required>
    </div>
     <div class="col-md-12">
      <label><b>State</b></label>
    </div>
    <div class="col-md-12">
      <input type="text" class="form-control" placeholder="Enter State" name="state" required>
    </div>
     <div class="col-md-12">
      <label><b>Country</b></label>
    </div>
    <div class="col-md-12">
      <input type="text" class="form-control" placeholder="Enter Country" name="country" required>
    </div>
    <div class="col-md-12">
      <label><b>Password</b></label>
    </div>
    <div class="col-md-12">
      <input type="password" class="form-control" placeholder="Enter Password" name="psw" required>
        
      </div>
        <div class="col-md-12"><button name='reg'>Register</button></div>
    </div>
  </form>
</div>



<div id="id03" class="modal">
  <div onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">X</div>
  <form class="modal-content model1" method="POST" >
    <div class="row">
      <div class="col-md-12">
      <h1 class="aa">Login</h1>
    </div>
      <div class="col-md-12">
      <label><b>Username</b></label>
    </div>
    <div class="col-md-12">
      <input type="text" class="form-control" placeholder="Enter Username" name="uname_doc" required>
    </div>
    <div class="col-md-12">
      <label><b>Password</b></label>
    </div>
    <div class="col-md-12">
      <input type="password" class="form-control" placeholder="Enter Password" name="psw_doc" required>
        
      </div>
      <div class="col-md-12"><button name="login_doc">Login</button><button onclick="myfunction_doc()">Register</button></div>
    </div>
  </form>
</div>
<div id="id04" class="modal">
  <div onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">X</div>
  <form class="modal-content1 model2" method="POST" >
    <div class="row">
      <div class="col-md-12">
      <h1 class="aa">Register</h1>
    </div>
      <div class="col-md-12">
      <label><b >Username</b></label>
    </div>
    <div class="col-md-12">
      <input type="text" class="form-control" placeholder="Enter Username" name="uname_doc" required>
    </div>
     <div class="col-md-12">
      <label><b>Name</b></label>
    </div>
    <div class="col-md-12">
      <input type="text" class="form-control" placeholder="Enter Name" name="name_doc" required>
    </div>
     <div class="col-md-12">
      <label><b>Qualification</b></label>
    </div>
    <div class="col-md-12">
      <input type="text" class="form-control" placeholder="Enter Qualification" name="qualification_doc" required>
    </div>
     <div class="col-md-12">
      <label><b>Phone no</b></label>
    </div>
    <div class="col-md-12">
      <input type="text" class="form-control" placeholder="Enter Phone Number" name="number_doc" required>
    </div>
     <div class="col-md-12">
      <label><b>Email</b></label>
    </div>
    <div class="col-md-12">
      <input type="text" class="form-control" placeholder="Enter email" name="email_doc" required>
    </div>
     <div class="col-md-12">
      <label><b>District</b></label>
    </div>
    <div class="col-md-12">
      <input type="text" class="form-control" placeholder="Enter District" name="district_doc" required>
    </div>
     <div class="col-md-12">
      <label><b>Pin</b></label>
    </div>
    <div class="col-md-12">
      <input type="text" class="form-control" placeholder="Enter Pin" name="pin_doc" required>
    </div>
     <div class="col-md-12">
      <label><b>State</b></label>
    </div>
    <div class="col-md-12">
      <input type="text" class="form-control" placeholder="Enter State" name="state_doc" required>
    </div>
     <div class="col-md-12">
      <label><b>Country</b></label>
    </div>
    <div class="col-md-12">
      <input type="text" class="form-control" placeholder="Enter Country" name="country_doc" required>
    </div>
    <div class="col-md-12">
      <label><b>Password</b></label>
    </div>
    <div class="col-md-12">
      <input type="password" class="form-control" placeholder="Enter Password" name="psw_doc" required>
      </div>
        <div class="col-md-12"><button name='reg_doc'>Register</button></div>
    </div>
  </form>
</div>

<script>
  function myfunction()
 {
  document.getElementById('id01').style.display='none';
  document.getElementById('id02').style.display='block';
 }
  function myfunction_doc()
 {
  document.getElementById('id03').style.display='none';
  document.getElementById('id04').style.display='block';
 }
// Get the modal
var modal1 = document.getElementById('id01');
var modal2 = document.getElementById('id02');
var modal3 = document.getElementById('id03');
var modal4 = document.getElementById('id04');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
    if (event.target == modal2) {
        modal2.style.display = "none";
    }
    if (event.target == modal3) {
        modal3.style.display = "none";
    }
    if (event.target == modal4) {
        modal4.style.display = "none";
    }
  }

 
</script>
<script>
$(document).ready(function(){
$("#id1").click(function(){
$("#id2").fadeToggle(1000);
})
});
$(document).ready(function(){
$("#id3").click(function(){
$("#id4").fadeToggle(1000);
})
});
$(document).ready(function(){
$("#id5").click(function(){
$("#id6").fadeToggle(1000);
})
});
</script>
</body>
</html>