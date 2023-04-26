<?php
//set_time_limit(0);
// please uncomment this line when you want to send email using mail server login credentials
require_once ('class.phpmailer.php');
//echo "file called";
class email {
    function smtpmailer($emailTo, $subject, $body) { 
    global $error;
    $smtpSecurity       = "tls";//ssl
    $smtpHost           = 'smtp.gmail.com';
    $smtpPort           = 587;//465
    $smtpAuth           = true;
    $smtpDebug          = false;
   // $user               = "sales@luxurymetalcards.com";
   // $password           = 'Pizza17195!';

    $mail = new PHPMailer();  			//	create a new object
    $mail->IsSMTP(); 				//	enable SMTP
    $mail->CharSet	= "utf-8";		//	$mail->CharSet="windows-1251";
    $mail->SMTPDebug 	= $smtpDebug;		//      debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth 	= $smtpAuth;		//      authentication enabled
    $mail->SMTPSecure 	= $smtpSecurity; 	// 	secure transfer enabled REQUIRED for Gmail
    $mail->Host 	= $smtpHost;		//	$smtpHost;
    $mail->Port 	= $smtpPort;		//	$smtpPort;
    $mail->Username 	= $user;		//	$smtpUser;
    $mail->Password 	= $password;		//	$smtpPassword;

    $mail->IsHTML(true);
    $mail->AddReplyTo('frank@metalcardguy.com',"Luxury Metal Cards");
    $mail->SetFrom('frank@metalcardguy.com',"Luxury Metal Cards");
    $mail->Subject = $subject;  
    $mail->Body = $body;  
    $mail->AddAddress($emailTo);

    $mail->AddBCC('frank@metalcardguy.com');
	$mail->AddBCC('waseem.mehmood01@gmail.com');
	$mail->AddBCC('professionalcreative01@gmail.com');

    /*$mail->AddBCC('shoref@gmail.com');
    */
    //$mail->AddBCC('sahil44588@gmail.com');
    if(!$mail->Send()){
	echo $mail->ErrorInfo;
	return false;
    }else{
        echo $mail->ErrorInfo;
	return true;
    }
   }// function smtpmailer
}//class email
//list($subject, $message) = GetSignupMessageNew($fname, $lname, $email, $password, $ani, $spassword);
//                $mail = new email();
//                if ($mail->smtpmailer($email, $subject, $message))
//                    $email_status = EMAIL_SEND;
//                else
//                    $email_status = EMAIL_SENDING_FAIL;
//            }
?>