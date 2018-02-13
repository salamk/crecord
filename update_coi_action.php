<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>COI Assignment</title>
        <?php include "resource.php"; ?>
        
        <script>
            $( function() {
                $( ".datepicker" ).datepicker();
            } );
        </script>

    </head>
    <body>

        <?php include "header.php"; ?>


        <div id="form_title">
            <em>Form.4 : (Update Inquiry Status)</em><br>
            <small>Chec name and erp_no to ensure correct entry</small>
            <br><br>
        </div>

	


        <div class="container">
            <div class="row">
                <div class="container col-sm-4">
                    <form class="" method="post" action="save_action_coi.php">


           
 		<div class="form-group">
                        <label for="sel1">Current Status</label>
                        <select name="coi_current_status" class="form-control" id="sel1">
				<option>--select status--</option>
                            <?php 
                                require_once('hrpdao.php');
                                $hd = new HrpDao;
                                echo "this is test debug\n";
                                $arr = $hd->getEnumStatus2();
 
                                foreach ($arr as $value) {
                                    echo "<option>".$value."</option>";
                                }
                            ?>
                            
                        </select>
                    </div> 




		<div class="form-group">
                            <label for="coi_action_description" class="cols-sm-2 control-label">Action Description:</label>
                            <div class="cols-sm-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="coi_action_description" id="coi_action_description"  placeholder="Action Description"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="coi_action_date" class="cols-sm-2 control-label">Action Date:</label>
                            <div class="cols-sm-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="coi_action_date" id="coi_action_date"  placeholder="Action Date: (yyyy-mm-dd)"/>
                                </div>
                            </div>
                        </div>
                        
                        

                        <div class="form-group ">
                            <Button type="submit" id="button" class="btn btn-primary btn-lg">Save</button>
			    <?php
				$msg = $_GET['m']; 
				echo $msg;
			    ?>
                        </div>
                        
                        </div>

		<div class="col-sm-5">
			<div id="fetched_data">
				<?php 
                                require_once('hrpdao.php');
				$coi_letter_suffix = $_POST['coi_letter_suffix'];
				$coi_letter_no = $_POST['coi_letter_no'];

                                $hd = new HrpDao;

                                $arr = $hd->getInquiryBasicDetails($coi_letter_suffix, $coi_letter_no);

				if (empty($arr)) {
     					echo "<STRONG>WARNING: NO RECORD FOUND ABOUT THIS COI</STRONG>";
				}else{
				echo "<input type=text class='fdata' value='$arr[0]' disabled /><br>";
				echo "<input type=text class='fdata' value='$arr[1]' disabled /><br>";
				echo "<input type=text name='coi_letter_suffix' class='fdata' value='$arr[4]' disabled />";
				echo "&nbsp;<input type=text name='coi_letter_no' class='fdata' value='$arr[5]' disabled /><br>";
				}

				$arr2 = $hd->getCurrentStatus($coi_letter_suffix, $coi_letter_no);
				if (empty($arr2)) {
    					 echo "No updates found";
				}else{
					echo "<input type=text class='fdata' value='$arr2[0]' disabled /><br>";
					echo "<input type=text class='fdata' value='$arr2[1]' disabled /><br>";
					echo "<input type=text class='fdata' value='$arr2[2]' disabled /><br>";
                                }
                         ?>
			</div>
		</div>
                
		</form>
            </div>
        </div>


    </body>
</html>
