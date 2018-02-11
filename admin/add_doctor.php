<?php include ("../classes/Controller.php");
$obj=new Controller;
$obj->login_check();
?>
<?php
$name_err=$email_err=$depart_err=$spec_err=$pwd_err=$cpwd_err="";

if($_SERVER['REQUEST_METHOD']=="POST"){
		
	$name=$obj->cleaner($_POST['name']);
	$depart=$obj->cleaner($_POST['depart']);
	$email=$obj->cleaner($_POST['email']);
	$pwd=$obj->cleaner($_POST['pwd']);
	$cpwd=$obj->cleaner($_POST['cpwd']);
	$spec=$obj->cleaner($_POST['spec']);
	
		if(!preg_match("/^[a-z A-Z]+$/",$name)){
				$name_err= "*only alphabetic letters allowed";
		}
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			$email_err="Enter correct Email Id";
			}
			
		if(strlen($pwd)<6 || strlen($pwd)>15){
			$pwd_err="Passowrd should be of 6 to 15 characters";
			}
			
		if($pwd!=$cpwd){
			$cpwd_err="password doesn't match"; }
		else{
			$pwd=sha1(Controller::SALT.$cpwd); }
			
		//insert data
		if(empty($name_err) && empty($pwd_err) && empty($email_err)){
			if($obj->user_existance("doctor",$email)){
				if($obj->bind_insert("doctor",array("",$name,$email,$pwd,$depart,$spec))){
					echo '<div class="alert alert-success">
                   		<span><b>Added Successfully!</b></span>
                        <a href="viewDoctors.php" class="close" data-dismiss="alert">&times;</a>
                   </div>';
				}
				}
			else{
				$email_err="User already exists";
				   echo '<div class="alert alert-warning">
                   		<span><b>Already Exists!</b></span>
                        <a href="add_doctor.php" class="close" data-dismiss="alert">&times;</a>
                   </div>';
				}	
			}
	
}
?>

<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
<div class="clear"></div>
<br>
<div class="container-fluid">

    <!--Add Student-->
    <div class="col-md-5" style="margin-left:15%;">
    	<div class="well">
        
                <form method="post" role="form" autocomplete="off" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
                 
                 <div class="form-header">
                    <h3 class="form-title"><i class="fa fa-stethoscope"></i> Add Doctor</h3><hr>
                 </div>
                          
                 <div class="form-body">
                                     
                      <div class="form-group">
                           <div class="input-group">
                           <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                          <input name="name" type="text" class="form-control" required placeholder="Doctor Name">
                           </div>
                           <span class="help-block" id="error" style="color:#FF0004;"><?= $name_err?></span>
                      </div>
                                
                      <div class="form-group">
                           <div class="input-group">
                           <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                           <input name="email" type="email" class="form-control" required placeholder="Doctor Email-Id(example@domain.com)">
                           </div> 
                           <span class="help-block" id="error" style="color:#FF0004;"><?= $email_err?></span>                     
                      </div>
                      
                      <div class="form-group">
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
                           <span class="help-block" id="error" style="color:#FF0004;"><?= $depart_err?></span>                     
                      </div>
                      
                       <div class="form-group">
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
                           <span class="help-block" id="error" style="color:#FF0004;"><?= $spec_err?></span>                     
                      </div>
                      
                      <div class="row">
                      	<div class="col-md-5">
                        	<div class="form-group">
                            	<div class="input-group">
                                	<div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                                    <input name="pwd" type="password" required class="form-control" placeholder="Enter Password">
                                </div>
                             <span class="help-block" id="error" style="color:#FF0004;"><?= $pwd_err?></span>       
                            </div>
                        </div>
                        
                        <div class="col-md-5">
                        	<div class="form-group">
                            	<div class="input-group">
                                	<div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                                    <input name="cpwd" type="password" required class="form-control" placeholder="Confirm Password">
                                </div>
                            <span class="help-block" id="error" style="color:#FF0004;"><?= $cpwd_err?></span>       
                            </div>
                        </div>
                      </div>                     
                                
                    </div>
                    
                    <div class="form-footer">
                         <button type="submit" class="btn btn-info">
                         <span class="glyphicon glyphicon-send"> </span> Submit
                         </button>
                    </div>
        
        
                    </form>
		</div>
    <!--/Add Student-->
	</div>
</div>
<div class="clear"></div>