<?php
$servername = "localhost";
$username = "id4011164_cmarch";
$password = "3032-$@l@m";
$dbname = "id4011164_coolmarch";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}

   $coi_letter_suffix =$_POST['coi_letter_suffix'];
   $coi_letter_no =$_POST['coi_letter_no'];
   $coi_current_status = $_POST['coi_current_status'];
   $coi_action_description=$_POST['coi_action_description'];
   $coi_action_date=$_POST['coi_action_date'];


$query = "INSERT INTO `actions_coi` 
         (`coi_letter_suffix`,`coi_letter_no`,`coi_current_status`,`coi_action_description`, `coi_action_date`)
         VALUES
         ('$coi_letter_suffix','$coi_letter_no','$coi_current_status','$coi_action_description','$coi_action_date')";

	if (mysqli_query($conn, $query)) {

		$query = "INSERT INTO `actions_coi_history` 
         		(`coi_letter_suffix`,`coi_letter_no`,`coi_current_status`,`coi_action_description`, `coi_action_date`)
        		 VALUES
         		('$coi_letter_suffix','$coi_letter_no','$coi_current_status','$coi_action_description','$coi_action_date')";

		if(mysqli_query($conn, $query)){

      			header("Location: http://coolmarch.000webhostapp.com/devtest/action_coi.php"); /* Redirect browser */

		}else{
     			 echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}
} else {
      echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>
