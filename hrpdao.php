<?php
   class HrpDao {
      /* Member variables */
      private $database = "id4011164_coolmarch";
      private $dbuser = "id4011164_cmarch";
      private $dbpassword = "3032-$@l@m";
      private $dbserver = "localhost";
      
      public function getEnumStatus(){
          $arr_status = Array();
          $conn = mysqli_connect($this->dbserver, $this->dbuser, $this->dbpassword);
   
         if(! $conn ) {
            die('Could not connect: ' . mysql_error());
         }
   
        $sql = 'SELECT letter_suffix FROM enum_letter_suffix';
        mysqli_select_db($conn, $this->database);
        $retval = mysqli_query( $conn, $sql );
   
        if(! $retval ) {
            die('Could not get data: ' . mysql_error());
        }
   
        $i = 0;
        while($row = mysqli_fetch_array($retval,MYSQLI_ASSOC)) {
            $arr_status[$i]=$row['letter_suffix'];
            $i++;
        }
   
        mysqli_free_result($retval);

   
        mysqli_close($conn);
        
        return $arr_status;
          
    }



 public function getEnumStatus2(){
          $arr_status = Array();
          $conn = mysqli_connect($this->dbserver, $this->dbuser, $this->dbpassword);
   
         if(! $conn ) {
            die('Could not connect: ' . mysql_error());
         }
   
        $sql = 'SELECT status_msg FROM enum_status';
        mysqli_select_db($conn, $this->database);
        $retval = mysqli_query( $conn, $sql );
   
        if(! $retval ) {
            die('Could not get data: ' . mysql_error());
        }
   
        $i = 0;
        while($row = mysqli_fetch_array($retval,MYSQLI_ASSOC)) {
            $arr_status[$i]=$row['status_msg'];
            $i++;
        }
   
        mysqli_free_result($retval);
   
        mysqli_close($conn);
        
        return $arr_status;
          
    }


public function getInquiryBasicDetails($coi_letter_suffix, $coi_letter_no){
          $arr_status = Array();
          $conn = mysqli_connect($this->dbserver, $this->dbuser, $this->dbpassword);
   
         if(! $conn ) {
            die('Could not connect: ' . mysql_error());
         }
   
        $sql = "SELECT coi_erp_no, coi_emp_name, coi_remarks, coi_letter_date FROM coi where coi_letter_suffix like '$coi_letter_suffix' and 
		coi_letter_no like '$coi_letter_no'";

        mysqli_select_db($conn, $this->database);
        $retval = mysqli_query( $conn, $sql );
   
        if(! $retval ) {
            die('Could not get data: ' . mysql_error());
        }
   
        while($row = mysqli_fetch_array($retval,MYSQLI_ASSOC)) {
            $arr_status[0]=$row['coi_erp_no'];
            $arr_status[1]=$row['coi_emp_name'];
            $arr_status[2]=$row['coi_remarks'];
            $arr_status[3]=$row['coi_letter_date'];
            $arr_status[4]=$coi_letter_suffix;
            $arr_status[5]=$coi_letter_no;
            
        }
   
        mysqli_free_result($retval);

   
        mysqli_close($conn);
        
        return $arr_status;
          
    }


public function getCurrentStatus($coi_letter_suffix, $coi_letter_no){
          $arr_status = Array();
          $conn = mysqli_connect($this->dbserver, $this->dbuser, $this->dbpassword);
   
         if(! $conn ) {
            die('Could not connect: ' . mysql_error());
         }
   
        $sql = "SELECT coi_current_status, coi_action_description, coi_action_date FROM actions_coi where coi_letter_suffix like '$coi_letter_suffix' and 
		coi_letter_no like '$coi_letter_no'";

        mysqli_select_db($conn, $this->database);
        $retval = mysqli_query( $conn, $sql );
   
        if(! $retval ) {
            die('Could not get data: ' . mysql_error());
        }
   
        while($row = mysqli_fetch_array($retval,MYSQLI_ASSOC)) {
            $arr_status[0]=$row['coi_current_status'];
            $arr_status[1]=$row['coi_action_description'];
            $arr_status[2]=$row['coi_action_date'];
            $arr_status[3]=$coi_letter_suffix;
            $arr_status[4]=$coi_letter_no;
            
        }
   
        mysqli_free_result($retval);

   
        mysqli_close($conn);
        
        return $arr_status;
          
    }


public function updateStatus($coi_letter_suffix, $coi_letter_no, $coi_current_status, $coi_action_description, $coi_action_date){

          $conn = mysqli_connect($this->dbserver, $this->dbuser, $this->dbpassword);
	  $is_saved = "problem";
   
         if(! $conn ) {
            die('Could not connect: ' . mysql_error());
         }
   
       $query = "INSERT INTO `actions_coi` 
         (`coi_letter_suffix`,`coi_letter_no`,`coi_current_status`,`coi_action_description`, `coi_action_date`)
         VALUES
         ('$coi_letter_suffix','$coi_letter_no','$coi_current_status','$coi_action_description','$coi_action_date')";

	if (mysqli_query($conn, $query)) {
	    $is_saved = "OK";
            echo "record saved";
	} else {
	        $is_saved = "error";
      		echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);  
	return $is_saved;
    }


   }
?>
