<?php include ("../classes/Controller.php");
$obj=new Controller;
$obj->login_check();
?>
<?php 
//update pwd panel
$msg="";
if($_SERVER['REQUEST_METHOD']=="POST"){
	$old_pwd=$_POST["oldpwd"];
	$new_pwd=$_POST["newpwd"];
	$cnew_pwd=$_POST["cnewpwd"];
	if(!empty($old_pwd) && !empty($new_pwd) && !empty($cnew_pwd)){
			$msg=$obj->reset_pwd("doctor",$old_pwd,$new_pwd,$cnew_pwd);
		}else{
			$msg="Field should not empty";
			}
	}
?>

<!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Profile Page</h1>
                </div>
            </div>

            <div class="row">
	
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <h1>Password change</h1>
                    </div>
		    </div>
				<div class="row">
                    <div class="col-sm-6">
                    <div id="msg"></div>
                    <?php 
                    $access=$obj->fetch_data_user("doctor",array("name","email","department","specialization"),$_SESSION["id"]);
                    if(!empty($access)):
                    foreach($access as $row):?>
                    <form id="update_profile_form">
                        <div class="form-group">
                        <input type="text" name="name" value="<?= $row->name?>" placeholder="Enter your name" class="form-control">
                        </div>
                        <div class="form-group">
                        <input type="email" name="email" value="<?= $row->email?>" placeholder="Email Id" class="form-control">
                        </div>
                        <div class="form-group">
                        <input type="text" name="depart" value="<?= $row->department?>" placeholder="Department" class="form-control">
                        </div>
                        <div class="form-group">
                        <input type="text" name="spec" value="<?= $row->specialization?>" placeholder="Specialization" class="form-control">
                        </div>
                        </form>
                        <?php endforeach;endif;?>
                    </div>
        
                    <!-- password change coading-->
                    <div class="col-sm-6">
                    <span class="err"><?=$msg?></span>
                    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="form-group">
                        <input type="text" name="oldpwd" placeholder="Enter Old Pwd" class="form-control">
                        </div>
                        <div class="form-group">
                        <input type="text" name="newpwd" placeholder="Enter Password" class="form-control">
                        </div>
                        
                        <div class="form-group">
                        <input type="text" name="cnewpwd" placeholder="Confirm Password" class="form-control">
                        </div>
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
        
             </div>
        </div>
    </div>