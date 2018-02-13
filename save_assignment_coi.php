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
   $coi_president_name = $_POST['coi_president_name'];
   $coi_member1_name=$_POST['coi_member1_name'];
   $coi_member2_name=$_POST['coi_member2_name'];
   $coi_dispatch_date = $_POST['coi_dispatch_date'];
   $coi_uid = $coi_letter_suffix."-".$coi_letter_no;

$query = "INSERT INTO `coi_members` 
         (`coi_letter_suffix`,`coi_letter_no`,`coi_president_name`,`coi_member1_name`, `coi_member2_name`, `coi_dispatch_date`,`coi_uid`)
         VALUES
         ('$coi_letter_suffix','$coi_letter_no','$coi_president_name','$coi_member1_name','$coi_member2_name', '$coi_dispatch_date','$coi_uid')";

	if (mysqli_query($conn, $query)) {
      header("Location: http://coolmarch.000webhostapp.com/devtest/assign_coi.php?m=Saved"); /* Redirect browser */
} else {
      echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>
