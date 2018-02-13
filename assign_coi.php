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
            <em>Form.2 : (Assignment of Inquiry)</em><br>
            <small>Please enter relevant info and members to this inquiry</small>
            <br><br>
        </div>


        <div class="container">
            <div class="row">
                <div class="container col-sm-4">
                    <form class="" method="post" action="save_assignment_coi.php">



                    <div class="form-group">
                        <label for="sel1">Select Letter Base</label>
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
                            <label for="coi_letter_no" class="cols-sm-2 control-label">Letter No:</label>
                            <div class="cols-sm-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="coi_letter_no" id="coi_letter_no"  placeholder="Letter No without Suffix"/>
                                </div>
                            </div>
                        </div>                


		<div class="form-group">
                            <label for="coi_president_name" class="cols-sm-2 control-label">President:</label>
                            <div class="cols-sm-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="coi_president_name" id="coi_president_name"  placeholder="ERP-Name (Example: 9682-Pars Ali"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="coi_member1_name" class="cols-sm-2 control-label">Member-1:</label>
                            <div class="cols-sm-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="coi_member1_name" id="coi_member1_name"  placeholder="ERP-Name (Example: 9682-Pars Ali"/>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="coi_member2_name" class="cols-sm-2 control-label">Member-2:</label>
                            <div class="cols-sm-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="coi_member2_name" id="coi_member2_name"  placeholder="ERP-Name (Example: 9682-Pars Ali"/>
                                </div>
                            </div>
                        </div>
                        

		  <div class="form-group">
                            <label for="coi_dispatch_date" class="cols-sm-2 control-label">Assignment Date</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="coi_dispatch_date" id="coi_dispatch_date"  placeholder="Assignment Date: (yyyy-mm-dd)"/>
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
                
		</form>

                
            </div>
        </div>


    </body>
</html>
