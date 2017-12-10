<style>
	.beemari{
		width: 800px;
		font-size: 25px;
		margin-left: 38%;
		margin-right: 25%;
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
    margin-top: 300px;

}
</style>
<?php
session_start();
  include('head.php');
	error_reporting(0);
	$con_testing = mysqli_connect("localhost","root","","pdc");
	mysqli_select_db($con_testing,"pdc");
	$symp="select * from wait where p_username = '".$_SESSION['udid']."'";

	$symp_exe=mysqli_query($con_testing,$symp);
	$sel_disease = "select * from disease where symptom = '";
		while ($rowed=mysqli_fetch_array($symp_exe))	 {
			$sum=$rowed[1];
	}
	$symptoms_new = explode (",",$sum);
	$symptom_array = array();
	foreach ($symptoms_new as $keying)	{
		array_push($symptom_array, $keying);
	}
	$ginti1 = count($symptom_array);
	for ($i=1; $i < $ginti1 ; $i++) { 
		$sel_disease = $sel_disease.$symptom_array[$i];
		if($i != $ginti1 - 1)		{
			$sel_disease = $sel_disease."' OR symptom = '";
		}
		else		{
			$sel_disease = $sel_disease."'";
		}
	}
	$exe_sel=mysqli_query($con_testing,$sel_disease);
	$total_rows_op_test = mysqli_num_rows($exe_sel);
	if($total_rows_op_test == 0)
	{
		echo "<script>alert('No Disease Found for the Given SYMPTOMS. Please try Again.')</script>";
		echo "<script>document.getElementById('01').style.display='none';</script>";
	}
	else
	{
 	$my = '';
 	$test = array();
 	$counting = array();
	while ($row=mysqli_fetch_array($exe_sel))	 {
			$s=$row[2];
			$my = $my.$s;
			$my = $my.',';
	}
	$yo = explode (',',$my);
	foreach($yo as $key)	{
		array_push($test, $key);
	}
	$ginti2 = count($test);
	$ginti2 = $ginti2 -1;
	for ($j=0; $j < $ginti2 ; $j++)	{
		$gint = 0;
		for ($i=0; $i < $ginti2; $i++) { 
			if($i >= $j)
			{
				if(!strcmp($test[$j], $test[$i]))
					$gint = $gint+1;
			}
		}
		array_push($counting,$gint);
	}
	$max = 0;
	$index = 0;
	for ($i=0; $i < $ginti2; $i++) {
		if($max < $counting[$i])		{
			$index = $i;
			$max = $counting[$i];
		}
	}
	echo "<div class='beemari' id='01'><b>You are suffering from : </b>$test[$index]</div>";
	$sel="select * from cure where disease ='".$test[$index]."'";
	$exe=mysqli_query($con_testing,$sel);
	error_reporting(0);	
	while ($row=mysqli_fetch_array($exe))	 {
			$medication=$row[2];
			$precaution=$row[3];
	}
	echo "<div class='beemari' id='02' ><br><b>Medications for the Disease : </b></div>";
	echo "<div class='beemari' id='03'>$medication</div>";
	echo "<div class='beemari' id='04'><br><b>Precautions for the Disease :</b></div>";
	echo "<div class='beemari' id='05'>$precaution</div>";
}
?>	
<div class="col-md-12 footer">
    © 2017 PatientDoctorConnect Pvt. Ltd. All rights reserved
</div>