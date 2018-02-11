<?php include ("../classes/Controller.php");
$obj=new Controller;
?>
<?php
$name_err=$age_err=$gen_err=$fa_name_err=$email_err=$addr_err=$no_err=$doc_name_err="";
if($_SERVER['REQUEST_METHOD']=="POST"){

	$name=$obj->cleaner($_POST['name']);
	$age=$obj->cleaner($_POST['age']);
	$gender=$obj->cleaner($_POST['gen']);
	$email=$obj->cleaner($_POST['email']);
	$fa_name=$obj->cleaner($_POST['fa_name']);
	$addr=$obj->cleaner($_POST['addr']);
	$depart=$obj->cleaner($_POST['depart']);
	$spec=$obj->cleaner($_POST['spec']);
	$no=$obj->cleaner($_POST['no']);
	$doc_name=$obj->cleaner($_POST['doc_name']);
	
	if(!preg_match("/^[a-z A-Z]+$/",$name)){
				$name_err= "*only alphabetic letters allowed";
		}
	if(!preg_match("/^[a-z A-Z]+$/",$fa_name)){
				$fa_name_err= "*only alphabetic letters allowed";
		}
	if(!preg_match("/^[a-z A-Z]+$/",$doc_name)){
				$doc_name_err= "*only alphabetic letters allowed";
		}
	if((!preg_match("/^[0-9]+$/",$age)) && (strlen($age)<=3)){
			    $age_err="please mention your correct age";
			}
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			$email_err="Enter correct Email Id";
		 }
		//insert data
		if(empty($name_err) && empty($age_err) && empty($doc_name_err) && empty($fa_name_err) && empty($no_err) && empty($addr_err)){
			if($obj->patient_existance("patient",$no)){
				if($obj->bind_insert("patient",array("",$name,$no,$email,$age,$gender,$addr,$fa_name,$depart,$spec,$doc_name,"","",""))){
					echo '<div class="alert alert-success">
                   		<span><b>Added Successfully!</b></span>
                        <a href="verification.php" class="close" data-dismiss="alert">&times;</a>
                   </div>';
				}
				}
			else{
				$no_err="Patient already exists";
				 echo '<div class="alert alert-warning">
                   		<span><b>Already Exist! You can proceed to book an Appointment</b></span>
                        <a href="verification.php" class="close" data-dismiss="alert">&times;</a>
                   </div>';
				}	
			}

}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Project Suvidha</title>
<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
</head>

<body>
<div class="clear"></div>
<br>
<div class="container-fluid">
	<div class="row">
    <!--Patient Form-->
        <div class="col-md-6 col-xs-offset-6" style="margin-left:15% !important;">
       		<div class="well">
            
            <form method="post" role="form" autocomplete="off" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
             
             <div class="form-header">
                <h3 class="form-title"><i class="fa fa-pencil"></i>Appointment Form</h3><hr>
             </div>
                      
             <div class="form-body">
                                 
                  <div class="form-group">
                       <div class="input-group">
                       <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                      <input name="name" type="text" class="form-control" required placeholder="Patient Name">
                       </div>
                       <span class="help-block" id="error" style="color:#FF0004;"><?= $name_err?></span>
                  </div>
                        
                  <div class="row">
                            
                       <div class="form-group col-md-4">
                            <div class="input-group">
                            <div class="input-group-addon"><span></span></div>
                            <input name="age" type="tel" maxlength="3" required class="form-control" placeholder="Age">
                            </div>  
                            <span class="help-block" id="error" style="color:#FF0004;"><?= $age_err?></span>                    
                       </div>
                                
                       <div class="form-group col-md-4">
                            <div class="input-group">
                   			    <div class="input-group-addon"><i class="fa fa-male"></i> / <i class="fa fa-female"></i></div>
                   	   <select name="gen" class="form-control">
                         <option value="Male">Male</option>   
					     <option value="Female">Female</option>
                         <option value="Others">Other's</option>
                       </select>
                    </div> 
                   <span class="help-block" id="error" style="color:#FF0004;"><?= $gen_err?></span>                     
              </div>
              		</div>
              
              		<div class="form-group">
                       <div class="input-group">
                       <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                      <input name="fa_name" type="text" class="form-control" required placeholder="Father's Name">
                       </div>
                       <span class="help-block" id="error" style="color:#FF0004;"><?= $fa_name_err?></span>
                  </div>
                  
                  <div class="form-group">
                       <div class="input-group">
                       <div class="input-group-addon"><span class="glyphicon glyphicon-home"></span></div>
                      <input name="addr" type="text" class="form-control" required placeholder="Patient Address">
                       </div>
                       <span class="help-block" id="error" style="color:#FF0004;"><?= $addr_err?></span>
                  </div>
                <!---Email & Phone no.-->  
                  	<div class="row">
                            
                       <div class="form-group col-md-6">
                            <div class="input-group">
                             <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                       		  <input name="email" type="email" class="form-control" required placeholder="Patient Email-Id(example@domain.com)">
                       		</div> 
                       		<span class="help-block" id="error" style="color:#FF0004;"><?= $email_err?></span>         
                       </div>
                                
                       <div class="form-group col-md-5">
                            <div class="input-group">
                               <div class="input-group-addon"><span class="glyphicon glyphicon-earphone"></span></div>
                                 <input name="no" type="tel" min="10" maxlength="10" required class="form-control" placeholder="phone no.">
                                </div> 
                   			<span class="help-block" id="error" style="color:#FF0004;"><?= $no_err?></span>                     
              			</div>         
                  
                  </div>          
                <!---/Email & Phone no.-->
                    <div class="row">
                    <!--Department-->
                           <div class="form-group col-md-6">
                                <div class="input-group">
                                  <label for="depart">Select Department:</label>
                                   <select class="form-control" name="depart">
                                   		<option>--Select Department--</option>
                                        <option value="Neurology">Neurology</option>   
                                        <option value="Ophthalmology">Ophthalmology</option>
                                        <option value="Orthopaedics">Orthopaedics</option>
                                        <option value="Urology">Urology</option>
                                        <option value="Nephrology ">Nephrology </option>
                                        <option value="Gynaecology">Gynaecology</option>
                                   </select> 
                                </div>          
                           </div>
                    
                    <!--/Department-->
                    <!--Specialization-->
                        <div class="form-group col-md-5">
                                <div class="input-group">
                                  <label for="spec">Select Specialist:</label>
                                   <select class="form-control" name="spec">
                                   		<option>--Select Specialist--</option>
                                        <option value="Neurologist">Neurologist</option>   
                                        <option value="Obstetrician">Obstetrician</option>
                                        <option value="Ophthalmologist">Ophthalmologist</option>
                                        <option value="Orthopaedic Surgeon">Orthopaedic Surgeon</option>
                                        <option value="Nephrologist">Nephrologist </option>
                                        <option value="Gynecologist">Gynecologist</option>
                                   </select> 
                                </div>          
                           </div>
                    
                    <!--/Specialization-->
                        </div>
                 <!--/Depart. & spec.-->
                <!--Doctor name-->
                	<div class="form-group">
                       <div class="input-group">
                       <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                      <input name="doc_name" type="text" class="form-control" required placeholder="Doctor Name">
                       </div>
                       <span class="help-block" id="error" style="color:#FF0004;"><?= $doc_name_err?></span>
                  </div>
                <!--/Doctor name-->                
                            
                </div>
                
                <div class="form-footer">
                	<div class="row">
                     <button type="submit" class="btn btn-info">
                     <span class="glyphicon glyphicon-send"> </span> Submit
                     </button>
                     <button type="reset" class="btn btn-default" style="margin-left:2%;">
                      <span class="glyphicon glyphicon-refresh"></span> Reset
                      </button>
                    </div>
                </div>
    
    
                </form>
            
            </div>
        </div>

    <!--/Patient Form-->
    </div>
</div>
<div class="clear"></div>

</body>
</html>
