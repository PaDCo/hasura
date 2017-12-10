<style>
	.beemari{
		width: 800px;
		font-size: 25px;
		margin-left: 38%;
		margin-right: 25%;
	}
	.xyz
	{
		text-align: center;
	}
</style>
<?php
	error_reporting(0);
	$con = mysqli_connect("localhost","root","","pdc");
	mysqli_select_db($con,"pdc");
	$sel="select * from disease where symptom = '";
	$area = $_POST["txtarea"];
	$symptom = explode ("\r\n",$area);
	$sym_array = array();
	foreach ($symptom as $keyed)	{
		array_push($sym_array, $keyed);
		$testing = $testing.','.$keyed;
	}
	$ginti = count($sym_array);
	for ($i=0; $i < $ginti ; $i++) { 
		$sel = $sel.$sym_array[$i];
		if($i != $ginti - 1)		{
			$sel = $sel."' OR symptom = '";
		}
		else		{
			$sel = $sel."'";
		}
	}
	$exe=mysqli_query($con,$sel);
	$total_rows_op = mysqli_num_rows($exe);
	if($total_rows_op == 0)
	{
		echo "<script>alert('No Disease Found for the Given SYMPTOMS. Please try Again.')</script>";
		echo "<script>document.getElementById('01').style.display='none';</script>";
	}
	else
	{
		?>
		<div class="xyz">
			<h1 >Waiting for Doctor Response...</h1>
		</div>	
		<?php
			$zero = 0;
			$wait = "insert into wait set p_username = '".$_SESSION['udid']."' , symptom = '$testing' , flag= $zero ";
			$wait_exe=mysqli_query($con,$wait);
			echo '<script>window.location="doctor_resp.php"</script>';
			?>
		</div>
		<?php
	}
?>

