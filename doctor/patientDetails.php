<?php 
if(!isset($_GET['patient_id']) || empty($_GET['patient_id'])){
	die("Programe error try<br><a href='dashboard.php'>try again</a>");
	}
	
require_once("../classes/Controller.php");
$obj=new Controller;
$obj->login_check();
$decode_id=base64_decode($_GET['patient_id']);
?>
<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
	$presence=$obj->cleaner($_POST['presence']);
	$follow=$obj->cleaner($_POST['follow_date']);
	
	if($obj->update("patient",array("presence"=>$presence,"follow_date"=>$follow),array("patient_id"=>$decode_id))){
			echo '<div class="alert alert-success">
                   		<span><b>Updated Successfully!</b></span>
                        <a href="dashboard.php" class="close" data-dismiss="alert">&times;</a>
                   </div>';
			}
		else{
			  echo '<div class="alert alert-danger">
                   		<span><b>Something Error!</b></span>
                        <a href="patientDetails.php" class="close" data-dismiss="alert">&times;</a>
                   </div>';
			}	
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Patient Detail's</title>
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
  	body {
  		font-family: lato;
  	}

  	h1 {
  		font-weight: 700;
  	}
  	.marg {
  		margin: 20px 0;
  	}
  </style>

  <script>
    function check(x) {
        if (x.value == "Yes") {
            alert("Do you want this Patient to come for Follow Up");
            document.getElementById("ifYes").style.display = "block";
        } else {
            document.getElementById("ifYes").style.display = "none";
        }
    }
  </script>
</head>
<body>
	<div class="container">
		<h1 class="text-center">Patient Information</h1>
		<div class="row">
			<div class="col-md-12 marg">
				<div class="text-center">
				  <img src="https://image.flaticon.com/icons/png/128/149/149071.png" class="img-fluid" width="120" height="150" alt="Patient Image">
				</div>
			</div>
		</div>
		<form method="post" role="form" autocomplete="off" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">
        	<?php 
				    $result=$obj->fetch_pat("patient",array("patient_id","name","age","fathers_name","addr","gender","email","no","department","doctor_name"),$decode_id);
				  foreach($result as $row){ ?>
        
		<div class="row">
          
			<div class="col-sm-5">
				<div class="form-group">
		            <label for="patientID">Appointment No</label>
		            <input type="text" class="form-control" name="patientID" value="<?=$row->patient_id?>">
          		</div>
			</div>
			<div class="col-sm-5">
				<div class="form-group">
		            <label for="name">Name</label>
		            <input type="text" class="form-control" name="name" value="<?=$row->name?>">
          		</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group">
		            <label for="age">Age</label>
		            <input type="text" class="form-control" name="age" value="<?=$row->age?>">
          		</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-5">
				<div class="form-group">
		            <label for="fname">Father Name</label>
		            <input type="text" class="form-control" name="fname" value="<?=$row->fathers_name?>">
          		</div>
			</div>
			<div class="col-sm-5">
				<div class="form-group">
		            <label for="address">Address</label>
		            <input type="text" class="form-control" name="address" value="<?=$row->addr?>">
          		</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group">
		            <label for="gender">Gender</label>
		            <input type="text" class="form-control" name="gender" value="<?=$row->gender?>">
          		</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				<div class="form-group">
		            <label for="email">Email Id</label>
		            <input type="text" class="form-control" name="email" value="<?=$row->email?>">
          		</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
		            <label for="contact">Contact No</label>
		            <input type="text" class="form-control" name="contact" value="<?=$row->no?>">
          		</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
		            <label for="department">Department</label>
		            <input type="text" class="form-control" name="department" value="<?=$row->department?>">
          		</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
		            <label for="doctor">Doctor Name</label>
		            <input type="text" class="form-control" name="doctor" value="<?=$row->doctor_name?>">
          		</div>
			</div>
		</div>
        <?php }?>
		<div class="row">
			<div class="col-sm-1">
				<div class="form-group">
		            <label for="presence">Presence</label>
		            <select class="form-control" name="presence">
		              <option>No</option>
		              <option>Yes</option>
		            </select>
          		</div>
			</div>
			<div class="col-sm-6"></div>
			<div class="col-sm-2">
				<div class="form-group">
		            <label for="followUp">Follow Up</label>
		            <select class="form-control" name="followUp" onchange="check(this);">
		              <option>No</option>
		              <option>Yes</option>
		            </select>
          		</div>
			</div>
			<div class="col-sm-3" id="ifYes" style="display: none;">
				<div class="form-group">
		            <label for="follow_date">Follow-up Date</label>
		            <input type="date" class="form-control" name="follow_date">
          		</div>
			</div>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>

</body>
</html>