<?php
  session_start();
  error_reporting(0);
  $usr_doc = $_POST["uname_doc"];
  $pss_doc = $_POST["psw_doc"];
  $con_doc = mysqli_connect("localhost","root","","pdc");
  mysqli_select_db($con_doc,"pdc");
  $sel_doc="select * from doctor where d_username = '".$usr_doc."' AND password = '".$pss_doc."'";
  $exe_doc=mysqli_query($con_doc,$sel_doc);
  $total_rows_doc = mysqli_num_rows($exe_doc);
  if($total_rows_doc == 1)
  {
    $fetch_doc=mysqli_fetch_array($exe_doc);
    $_SESSION['udid1']=$fetch_doc['d_username'];
    echo '<script>window.location="doctor.php"</script>';
  }
  if($total_rows_doc == 0)
  {
    echo '<script>alert("Please Check your Username and Password");</script>';
  }
?>