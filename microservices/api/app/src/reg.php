
<?php
error_reporting(0);
    //if(isset($_POST["reg"]))
    {
        $con_r = mysqli_connect("localhost","root","","pdc");
        mysqli_select_db($con_r,"pdc");
        $querry_check = "select * from patient where p_username = '".$_POST["uname"]."'";
        $exe_r=mysqli_query($con_r,$querry_check);
        $total_rows_r = mysqli_num_rows($exe_r);

        if($total_rows_r == 1)
        {
            echo "<script>alert('Already Exists...')</script>";
        }
        else
        {
            $usr_r = $_POST["uname"];
            $name_r = $_POST["name"];;
            $age_r = $_POST["age"];
            $number_r = $_POST["number"];
            $email_r = $_POST["email"];
            $district_r = $_POST["distict"];
            $pin_r = $_POST["pin"];
            $state_r = $_POST["state"];
            $country_r = $_POST["country"];
            $pss_r = $_POST["psw"];
            $querry_insert_r = "insert into patient set p_username = '$usr_r' ,
             name = '$name_r', age  = '$age_r', district = '$district_r' ,
              pin  = '$pin_r', state = '$state_r' , country = '$country_r' , 
              phone = '$number_r' , email = '$email_r' , password  = '$pss_r'";
            $exe_r1=mysqli_query($con_r,$querry_insert_r);
            echo '<script>window.location="patient.php"</script>';
        }
    }
?>