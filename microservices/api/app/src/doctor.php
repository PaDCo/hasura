<style>
.noti{
  font-size: 35px;
  font-family:Comic Sans MS, Comic Sans, cursive;
  margin-top : 30px;
  margin-left : 30px;
}
.output{
  margin-top: 10px;
  font-size: 20px;
  margin-left : 30px;
  font-family: Comic Sans MS, Comic Sans, cursive;
}
.but{
  margin-top: 60px;
  width: 50%;
  margin-left: 25%;
  margin-right: 25%;
}
.new_class{
  display: none;
}
.new_label2{
   margin-top: 70px;
  font-size: 20px;
  margin-left : 30px;
  font-family: Comic Sans MS, Comic Sans, cursive;
}
.new_label{
   margin-top: 30px;
  font-size: 20px;
  margin-left : 30px;
  font-family: Comic Sans MS, Comic Sans, cursive;
}
.new_label1{
  margin-left: 30px;
  width: 50%;
}
.welcome{
  text-align : left;
  font-size : 20px;
}
</style>
<?php
session_start();
  include('head.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Doctor</title>
</head>
<body>
  <div class='welcome'><b>Welcome <?php echo $_SESSION['udid1']; ?> </b></div>
<div class="noti" id="01"> Notifications :
<?php
error_reporting(0);
  $con_doc_search = mysqli_connect("localhost","root","","pdc");
  mysqli_select_db($con,"pdc");
  $selection="select * from wait where flag = '0'";
  $exe_doc_search=mysqli_query($con_doc_search,$selection);
  $total_rows_search = mysqli_num_rows($exe_doc_search);
  if($total_rows_search == 0)
    {
        ?>
      <div class='output'> No New Notifications. </div>
      <?php
    }
  else
  {
    $symp_array_new = array();
    $patient_array_is = array();
    while ($rowing=mysqli_fetch_array($exe_doc_search)) 
      {
      $symptoms_are=$rowing[1];
      array_push($symp_array_new, $symptoms_are);
      $patient_id = $rowing[0];
      array_push($patient_array_is, $patient_id);
     }
     $array_length = count($symp_array_new);
    for ($i=0; $i < $array_length ; $i++) 

    { 
      $toPrint = "Patient with patient_id as '<b>".$patient_array_is[$i]."</b>' Has the following Symptoms : ";
      $test = $symp_array_new[$i];
      $test1 = explode (",",$test);
      $test2 = array();
      foreach ($test1 as $key_var) {
          array_push($test2, $key_var);
        }  
      $new_len = count($test2);
      for ($j=1; $j < $new_len ; $j++) {
        if ($j == $new_len-1){
          $toPrint = $toPrint.$test2[$j].".";
          }
          else
          {
            $toPrint = $toPrint.$test2[$j]." , ";
          }
        }
        ?>
          <div class='output'><?php echo $toPrint; ?></div>
        <?php
    }
  }
?>
</div>
<div class="but" id='id1'>
  <button onclick="new_function()">Click to Respond to Query</button>
</div>
<div id="id02" class="modal">
  <div onclick="hide_function()" class="close" title="Close Modal">X</div>
  <form class="modal-content model1" method="POST" >
    <div class="row">
      <div class="col-md-12">
      <h1 class="aa">Consultancy</h1>
    </div>
      <div class="col-md-12">
      <label><b>Enter the Patient's Username you are Addressing :</b></label>
    </div>
    <div class="col-md-12">
      <input type="text" class="form-control" placeholder="Enter the Patient's Username" name="usrname" required>
    </div>
    <div class="col-md-12">
      <label><b>Enter the Diagnosed Disease : </b></label>
    </div>
    <div class="col-md-12">
      <input type="text" class="form-control" placeholder="Enter the Disease" name="dis" required>
      </div>
    
    <div class="col-md-12">
      <label><b>Enter the Medications : </b></label>
    </div>
    <div class="col-md-12">
      <input type="text" class="form-control" placeholder="Enter the Medications" name="medi" required>
      </div>
      <div class="col-md-12">
      <label><b>Enter the Precautions : </b></label>
    </div>
    <div class="col-md-12">
      <input type="text" class="form-control" placeholder="Enter the Precautions" name="pre" required>
      </div>
      <div class="col-md-12"><button name="submit">Submit</button><button onclick="hide_function()">Cancel</button></div>
    </div>
  </form>
</div>
<script>
  function new_function(){
      document.getElementById("id1").style.display="none";
      document.getElementById("id02").style.display="block";
  }
  function hide_function(){
    document.getElementById('id02').style.display='none';
   document.getElementById("id1").style.display='block';  
  }
    var modal5 = document.getElementById('id02');
  window.onclick = function(event) {
    if (event.target == modal5) {
        modal5.style.display = "none";
         document.getElementById("id1").style.display='block';  
    }
  }
</script>
<?php
error_reporting(0);
    if(isset($_POST["submit"]))
    {
  $usr_pat = $_POST["usrname"];
  $dis_pat = $_POST["dis"];
  $medi_pat = $_POST["medi"];
  $pre_pat = $_POST["pre"];
  $con_pat = mysqli_connect("localhost","root","","pdc");
  mysqli_select_db($con_doc,"pdc");
  $sel_pat="insert into doc_resp set d_username = '".$_SESSION['udid1']."' , diseases = '".$dis_pat."',
  medi = '".$medi_pat."', precaution = '".$pre_pat."', p_username = '".$usr_pat."'";
  $exe_doc=mysqli_query($con_pat,$sel_pat);
  if($exe_doc)
  {
    echo '<script>alert("Query Responded Sucessfully.");</script>';
    $update_doc = "update doctor set patients_treated = patients_treated + 1 where d_username = '".$_SESSION['udid1']."'";
    $exe_doc_update=mysqli_query($con_pat,$update_doc);
    $update_wait = "update wait set flag = 1 where p_username = '".$usr_pat."'";
    $exe_pat_update = mysqli_query($con_pat,$update_wait);
  }
  else
  {
    echo '<script>alert("Query Not Responded. Please try again.");</script>';
  }
    }

?>
</body>
</html>