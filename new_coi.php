<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Form1</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include "resource.php" ?>
        <script>
            $( function() {
                $( ".datepicker" ).datepicker();
            } );
        </script>

    </head>
    <body>



<?php include "header.php" ?>

        <div id="form_title">
            <em>Form.1 : (New Entry for Court of Inquiry)</em><br>
            <small>Please enter relevant information and press Save button</small>
            <br><br>
        </div>


        <div class="container">
            <div class="row">
                <div class="container col-sm-4">
                    <form class="" method="post" action="save_coi.php">


		<div class="form-group">
                            <label for="erp_no" class="cols-sm-2 control-label">ERP No</label>
                            <div class="cols-sm-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="erp_no" id="erp_no"  placeholder="Enter ERP #"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="emp_name" class="cols-sm-2 control-label">Employee Name</label>
                            <div class="cols-sm-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="emp_name" id="emp_name"  placeholder="Enter Employee Name"/>
                                </div>
                            </div>
                        </div>



                    <div class="form-group">
                        <label for="coi_letter_suffix">Select Letter Base</label>
                        <select name="coi_letter_suffix" class="form-control" id="sel1">
                            <?php 
                                require_once('hrpdao.php');
                                $hd = new HrpDao;
                                echo "this is test debug\n";
                                $arr = $hd->getEnumStatus();
 
                                foreach ($arr as $value) {
                                    echo "<option>".$value."</option>";
                                }
                            ?>
                            
                        </select>
                    </div> 
                
                
                             <div class="form-group">
                            <label for="coi_letter_no" class="cols-sm-2 control-label">Inquiry No:</label>
                            <div class="cols-sm-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="coi_letter_no" id="coi_letter_no"  placeholder="Letter No without Suffix"/>
                                </div>
                            </div>
                        </div>
                        
                        </div>
                
                

                <div class="container col-sm-4">

		  <div class="form-group">
                            <label for="coi_letter_date" class="cols-sm-2 control-label">Office Order Date</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="coi_letter_date" id="coi_letter_date"  placeholder="Date of Office Order (yyyy-mm-dd)"/>
                                </div>
                            </div>
                        </div>

                    


			<div class="form-group">
                            <label for="coi_current_status" class="cols-sm-2 control-label">Current Status</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="coi_current_status" id="coi_current_status"  placeholder="Current Status" value="INITIATED" disabled/>
                                </div>
                            </div>
                        </div>

		   

                   

                    <label for="coi_remarks" class="cols-sm-2 control-label">
                        Additional Information Recieved<br>
                        <small>Additional Information / Remarks if any (Short Information)</small>
                    </label>
                    <textarea class="form-control" name="coi_remarks">
                    </textarea>
                    
                    <br><br>
                        <div class="form-group ">
                            <Button type="submit" id="button" class="btn btn-primary btn-lg">Save</button>
			    <?php
				$msg = $_GET['m']; 
				echo $msg;
			    ?>
                        </div>
                </div>

		</form>


            </div>
        </div>


    </body>
</html>
