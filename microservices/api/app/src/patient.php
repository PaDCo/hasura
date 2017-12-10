<?php
error_reporting(0);
  include('head.php');
?>
<style>
  .beemari{
    width: 800px;
    font-size: 25px;
    margin-left: 38%;
    margin-right: 25%;
  }

.txt_area{
    width: 800px;
    height: 230px;
    margin-left: 28%;
    margin-right: 25%;
    margin-top: 20px;
    font-size: 25px;
    font-family:Comic Sans MS, Comic Sans, cursive;
  }
.sub_but{
    width: 803px;
    height: 100px;
    margin-left: 28%;
    margin-right: 25%;
}
.text_only{
  margin-top: 40px;
  margin-bottom: 40px;
  margin-left: 39%;
  margin-right: 25%;
  font-size: 50px;
  font-family: monospace, courier new;
}
.non_heading{
  margin-left: 32%;
  margin-right : 20%;
  font-size: 25px;
  font-family: cursive;
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
.intro
{
  text-align : left;
  font-size : 20px;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Patients</title>
</head>
<body>
  <div class="intro"> <b>Welcome <?php 
session_start(); echo $_SESSION['udid'];  ?></b></div>
  <?php
    $con_test = mysqli_connect("localhost","root","","pdc");
    mysqli_select_db($con_test,"pdc");
    $sel_test="select * from wait where p_username = '".$_SESSION['udid']."' and flag = 0";
    $sel_test1="select * from wait where p_username = '".$_SESSION['udid']."' and flag = 1";
    $exe_test=mysqli_query($con_test,$sel_test);
    $tota = mysqli_num_rows($exe_test);
    if($tota == 0)
    {
        $sel_res_doc = "select * from doc_resp where p_username = '".$_SESSION['udid']."'";
        $exe_sel_doc = mysqli_query($con_test,$sel_res_doc);
        $tota_row = mysqli_num_rows($exe_sel_doc);
        if($tota_row > 0)
        {
          while ($rowing_new=mysqli_fetch_array($exe_sel_doc))  {
            $beemari = $rowing_new[2];
            $davai=$rowing_new[3];
            $dhyaan=$rowing_new[4];
            $doc = $rowing_new[1];
          }
          echo "<div class='beemari' id='01'><b>Responsive Doctor Id : </b> $doc</div>";
          echo "<div class='beemari' id='06'><br><b>Diagnosed Disease : </b>$beemari</div>";
          echo "<div class='beemari' id='02'><br><b>Medications for the Disease : </b></div>";
          echo "<div class='beemari' id='03'>$davai</div>";
          echo "<div class='beemari' id='04'><br><b>Precautions for the Disease :</b></div>";
          echo "<div class='beemari' id='05'>$dhyaan</div>";
        }
    }
    $exe_test1=mysqli_query($con_test,$sel_test1);
    $tota1 = mysqli_num_rows($exe_test1);
    if($tota1 == 0)
    {
        ?>      
  <div class='text_only'>Disease Finder</div>
  <div class='non_heading'>Please Enter your Symptoms in the Text Area below. After entering the symptoms the system for now takes a 10 second window waiting for a doctor's responce to the querry. If no doctor responds then the AI would respond to the querry as it happens.</div>
    <div class="txt_area">
      <form method="post">
      <textarea rows='6' cols='60' name="txtarea" id="ta01"></textarea>
    </div>
    <div class="sub_but">
      <button name="check" id="b01">Check For Symptoms</button>
      </form>
    </div>
       <?php
    }
    ?>
<?php

  if(isset($_POST['check']))
  {
    include('symptom.php');
  }
?>
<script>
    if(document.getElementById("ta01").value != NULL)
    {
        document.getElementById("b01").disabled = false;
    }
    else
    {
        document.getElementById("b01").disabled = true;
    }
</script>
<br>
<br>
<br>
<div class="col-md-12 footer">
    © 2017 PatientDoctorConnect Pvt. Ltd. All rights reserved
</div>
</body>
</html>