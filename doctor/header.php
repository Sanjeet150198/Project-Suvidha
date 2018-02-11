<!doctype html>
<html><head>
<meta charset="utf-8">
<title>SDC</title>

<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../assets/fonts/font-awesome.min.css">
<link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
<link rel="stylesheet" type="text/css" href="../assets/css/pannel.css">

<style>
/*.affix {
      top:0;
      width: 100%;
      z-index: 9999 !important;
  }*/
  .navbar {
      margin-bottom: 0px;
	  width: 100%;
	  background-color:#041e54 !important;
  }

  /*.affix ~ .container-fluid {
     position: relative;
     top: 50px;
  }*/
  .clear{
		clear:both !important;	
	}
</style>

</head>

<body>
<!--starting nav bar coding-->
    <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid" style="margin-left:7%; font-size:10px;">
    <div class="navbar-header"> 
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#" style="color:#E7B011; font-size:18px; font-variant:small-caps;"><span></span>Project Suvidha</a>
      
    </div>
    <div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right" style="margin-right:8%;">
          <li><a href="dashboard.php" style="color:#E7B011; font-size:17px; font-variant:small-caps; font-weight:lighter;"> <span class="glyphicon glyphicon-home" > </span> View Patients </a></li>
         <li><a href="students_sdc.php" style="color:#E7B011; font-size:17px;font-variant:small-caps; font-weight:lighter;"> <i class="fa fa-users"></i> Students</a>
         </li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:#E7B011; font-size:17px;font-variant:small-caps; font-weight:lighter;">Guidelines<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="new_project.php" style="color:#E7B011; font-size:17px;font-variant:small-caps; font-weight:lighter;">For New Project</a></li>
              <li><a href="software_update.php" style="color:#E7B011; font-size:17px;font-variant:small-caps; font-weight:lighter;">For Software</a></li>
            </ul>
          </li>
          <li><button type="submit" class="btn btn-primary"><a href="log_out.php"><font color="#E8E8E8" size="+1"><strong>Log Out</strong></font></a></button></li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<!--end of nav bar coding-->

<style>
.clear{clear:both !important;}
</style>