<?php
session_start();

function get_client_ip()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    } else if (isset($_SERVER['REMOTE_ADDR'])) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    } else {
        $ipaddress = 'UNKNOWN';
    }

    return $ipaddress;
}
$PublicIP = get_client_ip();
$json     = file_get_contents("http://ipinfo.io/$PublicIP/geo");
$json     = json_decode($json, true);

$country  = $json['country'];
$region   = $json['region'];
$city     = $json['city'];


$to = "info@webbeingdigital.com, garvkansal88@gmail.com";

    
$name = $_POST["name"];
$subject = $name;

$mail_from = $_POST["email"];
$email=$mail_from;
$mobile = $_POST["mobile"];
$msg = $_POST["message"];



$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<h2>This email is from <a href='https://www.webbeingdigital.com/'>webbeingdigital</a> website:</h2>
<table  border='2'  cellpadding='15'>
<tr><th colspan='4'>User Detail</th></tr>
<tr><td>Name</td><td>$name</td></tr>
<tr><td>Email</td><td>$email</td></tr>
<tr><td>Mobile</td><td>$mobile</td></tr>
<tr><td>Message</td><td>$msg</td></tr>
<tr><th colspan='4'>Location Detail</th></tr>
<tr><td>country</td><td>$country</td></tr>
<tr><td>region</td><td>$region</td></tr>
<tr><td>city</td><td>$city</td></tr>
<tr><td>IP</td><td>$PublicIP</td></tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
// $headers .= 'From: $email' ;
 $headers  .= "From: $mail_from \r\n"; 
// $headers .= 'Cc: myboss@example.com' . "\r\n";

if(mail($to,$subject,$message,$headers)){
    
@ $_SESSION["success"] = "Hi <b>$name....!</b> We've recived your information ";

header("Location: https://www.webbeingdigital.com/thankyou.php");    
    
}


?>