<?php include ("../classes/Controller.php");
$obj=new Controller;
$obj->login_check();
$date=$obj->current_date();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Patient's List</title>
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/6059b49d0e.js"></script>
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
</head>
<body>

<div class="container">
	<h1 class="text-center">List of Patient's on <?=$date?></h1>
	<div class="row">
		<div class="col-md-4 marg">
		    <div class="input-group">
		      <input type="text" class="form-control" placeholder="Search for Patient ID...">
		      <span class="input-group-btn">
		        <button class="btn btn-secondary" type="button">Go!</button>
		      </span>
		    </div>
		</div>
	</div>
	<div class="row">
        <div class="col-md-12">
            <div class="table-responsive">  
                <table class="display nowrap" id="example">
                            <thead>
                              <tr>
                                <th>Appointment ID</th>
                                <th>Patient Name</th>
                                <th>Gen</th>
                                <th>Age</th>
                                <th>Father's Name</th>
                                <th>Contact No</th>
                                <th>Presence</th>
                                <th>Follow-up Date</th> 
                                <th>View</th>                                   
                               </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $result=$obj->fetch_all_data("patient");
                            if(isset($result)){
                            $i=1;
                            foreach($result as $row){?>
                                <tr>
                                    <td><?=$row->patient_id?></td>
                                    <td><?=$row->name?></td>
                                    <td><?=$row->gender?></td>
                                    <td><?=$row->age?></td>
                                    <td><?=$row->fathers_name?></td>
                                    <td><?=$row->no?></td>
                                    <td><?=$row->presence?></td>
                                    <td><?=$row->follow_date?></td>
                                    <td><button style="padding:0 5px 0 5px;" class="btn btn-info btn-xs"><a href="patientDetails.php?patient_id=<?php echo base64_encode($row->patient_id)?>"><i class="fa fa-eye" aria-hidden="true" style="color:#F0F0F0;"></i></a></button></td>
                                    
                                </tr>
                             <?php }}else{?>
                                 <tr>
                                    <th colspan="9">Data not available !!!</th>
                                 </tr>
                                 <?php }?>   
                            </tbody>
                        </table>
            </div>           
        </div>
	</div>
</div>
<?php include ("footer.php");?>