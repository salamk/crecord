<?php
$servername = "localhost";
$username = "id4011164_cmarch";
$password = "3032-$@l@m";
$dbname = "id4011164_coolmarch";


$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}

    $erp_no = $_POST['erp_no'];
   $emp_name =$_POST['emp_name'];
   $coi_letter_suffix =$_POST['coi_letter_suffix'];
   $coi_letter_no =$_POST['coi_letter_no'];
   $coi_letter_date=$_POST['coi_letter_date'];
   $coi_remarks=$_POST['coi_remarks'];
   $coi_uid = $coi_letter_suffix."-".$coi_letter_no;

$query = "INSERT INTO `coi` 
         (`coi_erp_no`,`coi_emp_name`,`coi_letter_suffix`,`coi_letter_no`, `coi_letter_date`, `coi_uid`, `coi_remarks`)
         VALUES
         ('$erp_no','$emp_name','$coi_letter_suffix','$coi_letter_no','$coi_letter_date', '$coi_uid','$coi_remarks')";

	if (mysqli_query($conn, $query)) {
	 $coi_current_status = "INITIATED";
	 $coi_action_description = "Inquiry started";
	 $sql = "INSERT INTO `actions_coi`(`coi_letter_suffix`,`coi_letter_no`,`coi_current_status`,`coi_action_description`, `coi_action_date`)
         VALUES('$coi_letter_suffix','$coi_letter_no','$coi_current_status','$coi_action_description','$coi_letter_date')";

	if(mysqli_query($conn, $sql)){

	 $sql = "INSERT INTO `actions_coi_history`(`coi_letter_suffix`,`coi_letter_no`,`coi_current_status`,`coi_action_description`, `coi_action_date`)
         VALUES('$coi_letter_suffix','$coi_letter_no','$coi_current_status','$coi_action_description','$coi_letter_date')";

	if(mysqli_query($conn,$sql)){

	     header("Location: http://coolmarch.000webhostapp.com/devtest/new_coi.php?m=Saved");

	}else{

	      echo "Error: " . $query . "<br>" . mysqli_error($conn);

	}

	}else{

	      echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}
		

	} else {
	      echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
?>
