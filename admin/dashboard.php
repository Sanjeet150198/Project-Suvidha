<?php include ("../classes/Controller.php");
$obj=new Controller;
$obj->login_check();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Patient's List</title>
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">
  
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
	
	.primary_bg_color{
	background-color:#785B5C/*#041e54*/ !important;}
	
  </style>
</head>
<body>

<div class="clear"></div>

<div class="container-fluid">
<h1 align="center" style="font-family:lobster; font-variant:small-caps;">List Of Patients</h1>
    <div id="result" style="margin-left:3%;">
        <div class="row">
        <!--result coding-->
        <div class="col-md-12 col-sm-12 table-responsive" style="border-radius:3%;">
         
            <!-- ... Your content goes here ... -->
                        <table class="display nowrap" id="example">
                            <thead>
                              <tr>
                                <th>Appointment ID</th>
                                <th>Patient Name</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Father Name</th>
                                <th>Contact No</th>
                                <th>Appointment Date</th>
                                <th>Follow-up Date</th>                                    
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
                                    <td><?=$row->appt_date?></td>
                                    <td><?=$row->follow_date?></td>
                                </tr>
                             <?php }}else{?>
                                 <tr>
                                    <th colspan="8">Data not available !!!</th>
                                 </tr>
                                 <?php }?>   
                            </tbody>
                        </table>
            <!--/Content End--> 
        
        </div>
        <!--/result coding-->
        </div>
    </div> 
</div>
<div class="clear"></div>
    
<?php include ("footer.php");?>