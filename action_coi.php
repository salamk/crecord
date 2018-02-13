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
            <em>Form.3 : (Actions & Updates on Inquiries)</em><br>
            <small>Enter information as per current status</small>
            <br><br>
        </div>


        <div class="container">
            <div class="row">
                <div class="container col-sm-4">
                    <form class="" method="post" action="update_coi_action.php?m=&nbsp;">



                    <div class="form-group">
                        <label for="sel1">Select Letter Base</label>
                        <select name="coi_letter_suffix" class="form-control" id="sel1">
                            <?php 
                                require_once('hrpdao.php');
                                $hd = new HrpDao;

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
		
		<div><button type="submit" class="btn btn-warning">Fetch</button></div>
	     </div>
        </div>


    </body>
</html>
