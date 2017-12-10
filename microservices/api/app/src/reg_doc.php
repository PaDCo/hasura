
<?php
error_reporting(0);
    //if(isset($_POST["reg"]))
    {
        $con_r_doc = mysqli_connect("localhost","root","","pdc");
        mysqli_select_db($con_r_doc,"pdc");
        $querry_check_doc = "select * from doctor where d_username = '".$_POST["uname_doc"]."'";
        $exe_r_doc=mysqli_query($con_r_doc,$querry_check_doc);
        $total_rows_r_doc = mysqli_num_rows($exe_r_doc);

        if($total_rows_r_doc == 1)
        {
            echo "<script>alert('Already Exists...')</script>";
        }
        else
        {
            $usr_doc = $_POST["uname_doc"];
            $name_doc = $_POST["name_doc"];;
            $qualification_doc = $_POST["qualification_doc"];
            $number_doc = $_POST["number_doc"];
            $email_doc= $_POST["email_doc"];
            $district_doc = $_POST["distict_doc"];
            $pin_doc = $_POST["pin_doc"];
            $state_doc = $_POST["state_doc"];
            $country_doc = $_POST["country_doc"];
            $pss_doc = $_POST["psw_doc"];
            $testingnng = 0;
            $querry_insert_doc = "insert into doctor set d_username = '$usr_doc' ,
             name = '$name_doc', qualification  = '$qualification_doc', 
              phone = '$number_doc' , email = '$email_doc' , district = '$district_doc' ,
              pin  = '$pin_doc', state = '$state_doc' , country = '$country_doc', rating = '$testingnng' ,
               patients_treated = '$testingnng', password  = '$pss_doc'";
            $exe_r1_doc=mysqli_query($con_r_doc,$querry_insert_doc);
            echo '<script>window.location="doctor.php"</script>';
        }
    }
?>