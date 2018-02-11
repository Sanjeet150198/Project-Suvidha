<?php include ("../classes/Controller.php");
$obj=new Controller;
?>
<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
	$appt_date=$obj->cleaner($_POST['dat']);
	$phno=$obj->cleaner($_POST['no']);
	
	if($obj->update("patient",array("appt_date"=>$appt_date),array("no"=>$phno))){
			echo '<div class="alert alert-success">
                   		<span><b>Updated Successfully!</b></span>
                        <a href="patient_form.php" class="close" data-dismiss="alert">&times;</a>
                   </div>';
			}
		else{
			  echo '<div class="alert alert-danger">
                   		<span><b>Something Error!</b></span>
                        <a href="book_appointment.php" class="close" data-dismiss="alert">&times;</a>
                   </div>';
			}	
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Book Appointment</title>
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
  		margin: 50px 0;
  	}
  </style>

</head>
<body>
	<div class="container">
		<h1 class="text-center marg">Book appointment</h1>
        <form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" role="form" autocomplete="off" enctype="multipart/form-data">
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<div class="form-group">
		            <label for="contactNo">Contact No.</label>
		            <input type="tel" class="form-control" name="no" placeholder="Enter your Phone Number" maxlength="10">
		            </input>
          		</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<div class="form-group">
		            <label for="dat">appointment date</label>
		            <input type="date" class="form-control" name="dat" palceholder="Enter your appoint. date">
          		</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6" >
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
        </form>
		
	</div>

</body>
</html>