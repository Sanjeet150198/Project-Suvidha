<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Doctor fillUp form</title>
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

  <script>
    function check() {
        document.getElementById("ifYes").style.display = "block";
    }
  </script>
</head>
<body>
	<div class="container">
		<h1 class="text-center marg">Mobile Number Verification</h1>
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<div class="form-group">
		            <label for="contactNo">Contact No.</label>
		            <input type="tel" class="form-control" id="contactNo" placeholder="Enter your Phone Number" maxlength="10" min="10">
		            </input>
          		</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6" id="ifYes" style="display: none;">
				<div class="form-group">
		            <label for="otp">OTP</label>
		            <input type="text" class="form-control" id="otp" palceholder="Enter your OTP Number">
          		</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6" >
				<button type="submit" class="btn btn-primary" onclick="check()">Submit</button>
			</div>
		</div>
		
	</div>

</body>
</html>