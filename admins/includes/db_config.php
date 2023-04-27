<?php
ini_set('display_errors',1); 
error_reporting(E_ALL);
if(session_id() == '') {
    session_start();
}  
// SEND GRID API 
//define('SENDGRID_API_KEY','');
    			/*
    	$apiKey = SENDGRID_API_KEY;
		$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("mansoor@brownbag.pk", "Example User");
$email->setSubject("Sending with SendGrid is Fun");
$email->addTo("rmak@sutlej.net", "Example User");
$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent(
    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
);
$sendgrid = new \SendGrid($apiKey);
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
*/
 
 
$username = "dashboard";
$password = "Delta@7788";
$hostname = "localhost"; 
$dbName = "dashboard";
 

DB::$user = $username;
DB::$password = $password;
DB::$dbName = $dbName;
DB::$host = $hostname; //defaults to localhost if omitted


//connection to the database
$con = mysqli_connect($hostname,$username,$password,$dbName);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
