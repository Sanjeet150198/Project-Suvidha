<?php include ("classes/Controller.php");
$obj=new Controller;
?>

<?php
session_start();

$rno=$_SESSION['otp'];
$urno=$_POST['otpvalue'];
if(!strcmp($rno,$urno))
{
$name=$_SESSION['name'];
$email=$_SESSION['email'];
$phone=$_SESSION['phone'];
// Create connection
$sql = "INSERT INTO patient (name, email, no)
VALUES ('$name', '$email', '$phone')";
if (mysql_query($obj, $sql)) {
$authKey = "197672A0Ulf4nRB55a7f867b";
$mobileNumber = $phone;
//Sender ID,While using route4 sender id should be 6 characters long.
$senderId = "";
//Your message to send, Add URL encoding here.
$message = urlencode("Thank u for register with us. we will get back to u shortly.");
//Define route 
$route = "route=4";
//Prepare you post parameters
$postData = array(
'authkey' => $authKey,
'mobiles' => $mobileNumber,
'message' => $message,
'sender' => $senderId,
'route' => $route
);
//API URL
$url="https://control.msg91.com/api/sendhttp.php";
// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => $url,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_POST => true,
CURLOPT_POSTFIELDS => $postData
//,CURLOPT_FOLLOWLOCATION => true
));
//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//get response
$output = curl_exec($ch);
//Print error if any
if(curl_errno($ch))
{
echo 'error:' . curl_error($ch);
}
curl_close($ch);
header( "Location: sucess.php" );
} else {
echo "Error: ";
}
return true;
}
else
{
echo "failure";
return false;
}
?>