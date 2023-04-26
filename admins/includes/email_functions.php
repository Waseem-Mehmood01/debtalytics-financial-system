<?php

?><?php

function sendBillingInvoice($invoice_id, $email, $amount)
{
    $subject = 'New invoice ' . $invoice_id . ' from Metal Business Cards';

    $message = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>
  <table width="600" align="center" cellpadding="0" cellspacing="0" style="background-color: #fff;">
<tbody>
<tr style="height: 9px;">
<td style="height: 9px;"></td>
</tr>
<tr style="height: 353px;">
<td style="border-left: 1px solid #cccccc; border-right: 1px solid #cccccc; height: 353px;">
<table cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td style="padding: 10px 20px 10px 20px;">
<table width="100%" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td width="388" valign="bottom">
<h2 style="font-family: Arial,Helvetica,sans-serif; font-size: 22px; color: #000!important; margin: 0; padding: 0px;">Metal Business Cards</h2>
</td>
<td width="170" valign="bottom" align="right"><img src="https://luxurymetalcards.com/images/logo-footer.png" width="150" alt="Metal Business Cards" style="display: block;" class="CToWUd" /></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table width="100%" cellpadding="0" cellspacing="0" style="background-color: #d4ac35;">
<tbody>
<tr>
<td height="5" style="font-size: 1px; line-height: 1px;">&nbsp;</td>
</tr>
</tbody>
</table>
<br />
<table cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td style="padding-left: 20px; padding-right: 20px; font-family: Arial,Helvetica,sans-serif; font-size: 14px; color: #000; line-height: 20px;">To view your invoice from Metal Business Cards for ' . $amount . ', or to download a PDF copy for your records, click the link below:<br /><br />
<a href="https://luxurymetalcards.com/myinvoice/' . base64_encode($invoice_id) . '"><strong>View & Pay My Invoice</strong></a><br /><br />
 <br /><table class="data">
                    <tr>
                        <td>Frank Urbano</td>
                    </tr>
                    <tr>
                        <td>Founder</td>
                    </tr>
                    <tr>
                        <td>Metal Business Cards</td>
                    </tr>
                    <tr>
                        <td>Mobile:(949)573-7226</td>
                    </tr>
                    <tr>
                        <td><a href="#" style="color:blue">frank@metalcardguy.com</a></td>
                    </tr>
                    <tr>
                        <td><a href="https://luxurymetalcards.com/" style="color:blue">luxurymetalcards.com</a></td>
                    </tr>
                </table></td>
</tr>
</tbody>
</table>
&nbsp;</td>
</tr>
    
</tbody>
</table></body></html>';

    $mail = new email();

    $mail->BCCAdmin();

    $mail->Send($email, $subject, $message);

    // $mail->smtpmailer($email, $subject, $message);
}

function send_email_for_no_logo($email, $password)
{
    $subject = 'We still have not received your logo for your Metal business card';
    $message = '<html lang="en"><body>';
    $message .= '
    <table>
        
        <tr>
            <td>
                <b>Boss,</b><br>
                <p>
                    &nbsp;&nbsp;&nbsp;We are ready for you. <b>You will be able to communicate directly with the design team.
<br>Here is your panel,<br>
<a href="https://luxurymetalcards.com/customers">luxurymetalcards.com/customers</a>   to review/upload your designs/logo.<br>
Your login details:<br>
Email: <u>' . $email . '</u>
Password: <u>' . $password . '</u>
</b>
<br>
                    Did you get our last email about the logo and the information needed for metal card design proccess?
                    Our in-house design team will draft 10-15 design for free.Once the balls in our court the proccess
                    should take 2-3 hours.
                    Anything longer than this and you will receive 10% off!
                    Send us over the logo and the information, including anything you need to go on the business cards and
                    we all then be good to go to create and design the business cards for you. If its easier for you to text
                    your current card verse sending the files, shoot me the image to 949-573-7226.
  </p>
            </td>
        </tr>
           <tr>
          <td>&nbsp;<br></td>
        </tr>
         <tr>
          <td>
            <table>
              <tr>
                 <td style="width: 50%;">
                <img  style="max-width: 100%" src="https://luxurymetalcards.com/images/logo-footer.png"/>
            </td>
            <td style="width: 50%;">
                <table>
                    <tr>
                        <td><b>Frank Urbano</b></td>
                    </tr>
                    <tr>
                        <td><b>Founder</b></td>
                    </tr>
                    <tr>
                        <td><b>Metal Business Cards</b></td>
                    </tr>
                    <tr>
                        <td><b>Mobile:(949)573-7226</b></td>
                    </tr>
                    <tr>
                        <td><b><u>frank@metalcardguy.com</u></b></td>
                    </tr>
                    <tr>
                        <td><a href="https://luxurymetalcards.com">luxurymetalcards.com</a></td>
              </tr>
            </table>
        
          </td>
        
                    </tr>
        
    </table>';

    $message .= '</body></html>';

    $mail = new email();

    $mail->BCCAdmin();

    $mail->Send($email, $subject, $message);
}

function send_email_design_ready($email, $passwrd)
{
    $subject = 'Your Card Design is Ready';
    $message = '<html lang="en"><body>';
    $message .= '<table>
        
        <tr>
            <td>
                <b>Boss,</b><br>
                <p>
                    &nbsp;&nbsp;&nbsp;We are ready for you. <b>You will be able to communicate directly with the design team.
<br>Here is your panel,<br>
<a href="https://luxurymetalcards.com/customers">luxurymetalcards.com/customers</a>   to review/upload your designs/logo.<br>
Your login details:<br>
Email: <u>' . $email . '</u>
Password: <u>' . $passwrd . '</u>
</b>
<br>
Did you get our last email about the logo and the information needed for metal card design proccess?
                    Our in-house design team will draft 10-15 design for free.Once the balls in our court the proccess
                    should take 2-3 hours.
                    Anything longer than this and you will receive 10% off!
                    Send us over the logo and the information, including anything you need to go on the business cards and
                    we all then be good to go to create and design the business cards for you. If its easier for you to text
                    your current card verse sending the files, shoot me the image to 949-573-7226.

                </p>
            </td>
        </tr>
        <tr>
          <td>&nbsp;<br></td>
        </tr>
         <tr>
          <td>
            <table>
              <tr>
                 <td style="width: 50%;">
                <img  style="max-width: 100%" src="https://luxurymetalcards.com/images/logo-footer.png"/>
            </td>
            <td style="width: 50%;">
                <table>
                    <tr>
                        <td><b>Frank Urbano</b></td>
                    </tr>
                    <tr>
                        <td><b>Founder</b></td>
                    </tr>
                    <tr>
                        <td><b>Metal Business Cards</b></td>
                    </tr>
                    <tr>
                        <td><b>Mobile:(949)573-7226</b></td>
                    </tr>
                    <tr>
                        <td><b><u>frank@metalcardguy.com</u></b></td>
                    </tr>
                    <tr>
                        <td><a href="https://luxurymetalcards.com">luxurymetalcards.com</a></td>
              </tr>
            </table>
    
          </td>
    
                    </tr>
    
    </table>';
    $message .= '</body></html>';

    $mail = new email();

    $mail->BCCAdmin();

    $mail->Send($email, $subject, $message);
}

function send_email_password_foreget($email, $retrivepassword)
{
    $subject = 'Forget Password - Metal Business Cards';
    $message = '<html lang="en"><body>';
    $message .= '<table>
        
        <tr>
            <td>
                <b>Dear Customer,</b><br>
                <p>
                    &nbsp;&nbsp;&nbsp;Your password has been reset.
<br><b>You will be able to communicate directly with the design team.
<br>Here is your panel,<br>
<a href="https://luxurymetalcards.com/customers">luxurymetalcards.com/customers</a>   to review/upload your designs/logo.<br>
Your login details:<br>
Email: <u>' . $email . '</u>
<br>Password: <u>' . $retrivepassword . '</u>
</b>
                </p>
            </td>
        </tr>
        <tr>
          <td>&nbsp;<br></td>
        </tr>
         <tr>
          <td>
            <table>
              <tr>
                 <td style="width: 50%;">
                <img  style="max-width: 100%" src="https://luxurymetalcards.com/images/logo-footer.png"/>
            </td>
            <td style="width: 50%;">
                <table>
                    <tr>
                        <td><b>Frank Urbano</b></td>
                    </tr>
                    <tr>
                        <td><b>Founder</b></td>
                    </tr>
                    <tr>
                        <td><b>Metal Business Cards</b></td>
                    </tr>
                    <tr>
                        <td><b>Mobile:(949)573-7226</b></td>
                    </tr>
                    <tr>
                        <td><b><u>frank@metalcardguy.com</u></b></td>
                    </tr>
                    <tr>
                        <td><a href="https://luxurymetalcards.com">luxurymetalcards.com</a></td>
              </tr>
            </table>
    
          </td>
    
                    </tr>
    
    </table>';
    $message .= '</body></html>';
    $mail = new email();

    $mail->BCCAdmin();

    $mail->Send($email, $subject, $message);
}

function email_notify_design_approved($lead_id)
{
    $email = 'professionalcreative01@gmail.com';

    $subject = 'Metal Business Cards-Design Approved-' . $lead_id;
    $message = '<html lang="en"><body>';
    $message .= '<table>
        
        <tr>
            <td>
                <b>Thankyou Creative Designer,</b><br>
                <p>
                    &nbsp;&nbsp;&nbsp;Your uploaded design has been approved by customer.
<br><b>Lead ID: ' . $lead_id . '</b>
                </p>
            </td>
        </tr>
        <tr>
          <td>&nbsp;<br></td>
        </tr>
         <tr>
          <td>
            <table>
              <tr>
                 <td style="width: 50%;">
                <img  style="max-width: 100%" src="https://luxurymetalcards.com/images/logo-footer.png"/>
            </td>
            <td style="width: 50%;">
                <table>
                    <tr>
                        <td><b>Frank Urbano</b></td>
                    </tr>
                    <tr>
                        <td><b>Founder</b></td>
                    </tr>
                    <tr>
                        <td><b>Metal Business Cards</b></td>
                    </tr>
                    <tr>
                        <td><b>Mobile:(949)573-7226</b></td>
                    </tr>
                    <tr>
                        <td><b><u>frank@metalcardguy.com</u></b></td>
                    </tr>
                    <tr>
                        <td><a href="https://luxurymetalcards.com">luxurymetalcards.com</a></td>
              </tr>
            </table>
    
          </td>
    
                    </tr>
    
    </table>';
    $message .= '</body></html>';
    $mail = new email();

    $mail->BCCAdmin();

    $mail->Send($email, $subject, $message);
}

function email_notify_design_revision($lead_id)
{
    $email = 'professionalcreative01@gmail.com';
    $mail = new email();
    $subject = 'Metal Business Cards-Design Revision-' . $lead_id;
    $message = '<html lang="en"><body>';
    $message .= '<table>
        
        <tr>
            <td>
                <b>Dear Creative Designer,</b><br>
                <p>
                    &nbsp;&nbsp;&nbsp;Customer needs some modifications in your uploaded design.
<br><b>Lead ID: ' . $lead_id . '</b>
                </p>
            </td>
        </tr>
        <tr>
          <td>&nbsp;<br></td>
        </tr>
         <tr>
          <td>
            <table>
              <tr>
                 <td style="width: 50%;">
                <img  style="max-width: 100%" src="https://luxurymetalcards.com/images/logo-footer.png"/>
            </td>
            <td style="width: 50%;">
                <table>
                    <tr>
                        <td><b>Frank Urbano</b></td>
                    </tr>
                    <tr>
                        <td><b>Founder</b></td>
                    </tr>
                    <tr>
                        <td><b>Metal Business Cards</b></td>
                    </tr>
                    <tr>
                        <td><b>Mobile:(949)573-7226</b></td>
                    </tr>
                    <tr>
                        <td><b><u>frank@metalcardguy.com</u></b></td>
                    </tr>
                    <tr>
                        <td><a href="https://luxurymetalcards.com">luxurymetalcards.com</a></td>
              </tr>
            </table>
    
          </td>
    
                    </tr>
    
    </table>';

    $message .= '</body></html>';

    $mail = new email();

    $mail->BCCAdmin();

    $mail->Send($email, $subject, $message);
}

function send_email_production($card_info_id)
{
    $sql = 'SELECT CONCAT(c.`fname`," ", c.`lname`) AS `name`,c.`email` FROM `quote_card_info_timline` q
JOIN `quote_customers` c ON q.quote_card_info_id=c.`quote_card_info_id`
WHERE q.quote_card_info_id=' . $card_info_id;
    $customer = DB::queryFirstRow($sql);

    $subject = 'Production Stage - Metal Business Cards';
    $message = '<html lang="en"><body>';
    $message .= '<table>
        
        <tr>
            <td>
                    <b>' . ucwords($customer['name']) . ',</b><br>
                    <p>
                        Your Metal Business cards is now in the next stage of its journey - the productioon stage. Your designs
                        have been filed and production will begin. As artisans, we spend a great amount of time on
                        attention to details and high quality production. With that being said we would like to reaffirm what
                        our previous email stated in terms of expected production timing.
                        on average, production may take up to 3 weeks to complete the entire process, this is depending
                        on the intricacy and details in your card.
                        if you have questions on the production process or would like to know more about how we process
                        our cards, please do not hesitate to get ahold of us
                    </p>
                </td>
        </tr>
        <tr>
          <td>&nbsp;<br></td>
        </tr>
         <tr>
          <td>
            <table>
              <tr>
                 <td style="width: 50%;">
                <img  style="max-width: 100%" src="https://luxurymetalcards.com/images/logo-footer.png"/>
            </td>
            <td style="width: 50%;">
                <table>
                    <tr>
                        <td><b>Frank Urbano</b></td>
                    </tr>
                    <tr>
                        <td><b>Founder</b></td>
                    </tr>
                    <tr>
                        <td><b>Metal Business Cards</b></td>
                    </tr>
                    <tr>
                        <td><b>Mobile:(949)573-7226</b></td>
                    </tr>
                    <tr>
                        <td><b><u>frank@metalcardguy.com</u></b></td>
                    </tr>
                    <tr>
                        <td><a href="https://luxurymetalcards.com">luxurymetalcards.com</a></td>
              </tr>
            </table>
    
          </td>
    
                    </tr>
    
    </table>';
    $message .= '</body></html>';
    $email = $customer['email'];

    // die(1);
    // sleep(86400);
    // sleep(1800000);

    $mail = new email();

    $mail->BCCAdmin();

    if ($mail->Send($email, $subject, $message))
        echo 1;
    else
        echo 0;
}

function send_email_payment_recieved($card_info_id)
{
    $sql = 'SELECT CONCAT(c.`fname`," ", c.`lname`) AS `name`,c.`email` FROM `quote_card_info_timline` q
JOIN `quote_customers` c ON q.quote_card_info_id=c.`quote_card_info_id`
WHERE q.quote_card_info_id=' . $card_info_id;
    $results = DB::queryFirstRow($sql);

    $subject = 'Received your Payment - Metal Business Cards';
    $message = '<html lang="en"><body>';
    $message .= '
    <table>
        
        <tr>
            <td>
                <b>' . ucwords($results['name']) . ',</b><br>
               
                    <p>
                        We received your payment. Next confirmation to be on the look for will be (In production email). Confirmation your order is being produced. That does not mean the order will be shipping in the next 3-5 days,unless other wise agreed.
Whenever printing ink onto Metal each color per side could take up to 72 hours per color per side. Your order is in good hands! Thank you for your payment.
                    </p>
                </td>
        </tr>
           <tr>
          <td>&nbsp;<br></td>
        </tr>
         <tr>
          <td>
            <table>
              <tr>
                 <td style="width: 50%;">
                <img  style="max-width: 100%" src="https://luxurymetalcards.com/images/logo-footer.png"/>
            </td>
            <td style="width: 50%;">
                <table>
                    <tr>
                        <td><b>Frank Urbano</b></td>
                    </tr>
                    <tr>
                        <td><b>Founder</b></td>
                    </tr>
                    <tr>
                        <td><b>Metal Business Cards</b></td>
                    </tr>
                    <tr>
                        <td><b>Mobile:(949)573-7226</b></td>
                    </tr>
                    <tr>
                        <td><b><u>frank@metalcardguy.com</u></b></td>
                    </tr>
                    <tr>
                        <td><a href="https://luxurymetalcards.com">luxurymetalcards.com</a></td>
              </tr>
            </table>
        
          </td>
        
                    </tr>
        
    </table>';
    $message .= '</body></html>';
    $email = $results['email'];
    // die(1);
    // sleep(86400);
    // sleep(1800000);

    $mail = new email();

    $mail->BCCAdmin();

    if ($mail->Send($email, $subject, $message))
        echo 1;
    else
        echo 0;
    // foreach($results as $res){
    // if ($mail->smtpmailer($res['email'], $subject, $message))
    // echo "email send";
    // else
    // echo "email failed";
    // }
}

function send_email_shipping_confirmation($card_info_id, $shipping_no, $courier)
{
    $sql = 'SELECT CONCAT(c.`fname`," ", c.`lname`) AS `name`,c.`email` FROM `quote_card_info_timline` q
JOIN `quote_customers` c ON q.quote_card_info_id=c.`quote_card_info_id`
WHERE q.quote_card_info_id=' . $card_info_id;
    $results = DB::queryFirstRow($sql);

    $subject = 'Shipping Confirmation - Metal Business Cards';
    $message = '<html lang="en"><body  style="background: #f2f3f7">';
    $message .= '
    <table>
        
        <tr>
            <td>
                <b>Hey ' . ucwords($results['name']) . ',</b><br>
                    <h3 style="text-align: center;color:#662625">Your order is on its way.</h3>
                  
<p>
<span style="color:#8bbe3f;">Details:</span><hr><br>
<b>Courier: </b>' . $courier . '<br>
<b>Shipment Number: </b> ' . $shipping_no . '
                    <p>
           <hr><br>           
                </p>
                  <p>
                   Thankyou for your trust on Metal Business Cards
                    </p>
                </td>
        </tr>
           <tr>
          <td>&nbsp;<br></td>
        </tr>
         <tr>
          <td>
            <table>
              <tr>
                 <td style="width: 50%;">
                <img  style="max-width: 100%" src="https://luxurymetalcards.com/images/logo-footer.png"/>
            </td>
            <td style="width: 50%;">
                <table>
                    <tr>
                        <td><b>Frank Urbano</b></td>
                    </tr>
                    <tr>
                        <td><b>Founder</b></td>
                    </tr>
                    <tr>
                        <td><b>Metal Business Cards</b></td>
                    </tr>
                    <tr>
                        <td><b>Mobile:(949)573-7226</b></td>
                    </tr>
                    <tr>
                        <td><b><u>frank@metalcardguy.com</u></b></td>
                    </tr>
                    <tr>
                        <td><a href="https://luxurymetalcards.com">luxurymetalcards.com</a></td>
              </tr>
            </table>
                    
          </td>
                    
                    </tr>
                    
    </table>';
    $message .= '</body></html>';
    $email = $results['email'];
    // die(1);
    // sleep(86400);
    // sleep(1800000);
    $mail = new email();

    $mail->BCCAdmin();

    if ($mail->Send($email, $subject, $message))
        echo 1;
    else
        echo 0;
    // foreach($results as $res){
    // if ($mail->smtpmailer($res['email'], $subject, $message))
    // echo "email send";
    // else
    // echo "email failed";
    // }
}

function send_email_custom($email, $password, $remarks, $attachment = '')
{
    $subject = 'Metal Business Cards';
    if ($attachment != '' && $attachment != '#') {
        $attachment = '<br>---------------<br><b><a href="' . $attachment . '">View Attachment</a></b><br>---------------<br>';
    }
    $message = '<html lang="en"><body>';
    $message .= '
    <table>
        
        <tr>
            <td>
                <b>Hey Boss,</b><br>
                    
                  ' . $remarks . '

<br><b>You can also communicate directly with the design team.
<br>Here is your panel,<br>
<a href="https://luxurymetalcards.com/customers">luxurymetalcards.com/customers</a>   to review/upload your designs/logo.<br>
Your login details:<br>
Email: <u>' . $email . '</u>
<br>Password: <u>' . $password . '</u>
</b>

' . $attachment . '


                </td>
        </tr>
           <tr>
          <td>&nbsp;<br></td>
        </tr>
         <tr>
          <td>
            <table>
              <tr>
                 <td style="width: 50%;">
                <img  style="max-width: 100%" src="https://luxurymetalcards.com/images/logo-footer.png"/>
            </td>
            <td style="width: 50%;">
                <table>
                    <tr>
                        <td><b>Frank Urbano</b></td>
                    </tr>
                    <tr>
                        <td><b>Founder</b></td>
                    </tr>
                    <tr>
                        <td><b>Metal Business Cards</b></td>
                    </tr>
                    <tr>
                        <td><b>Mobile:(949)573-7226</b></td>
                    </tr>
                    <tr>
                        <td><b><u>frank@metalcardguy.com</u></b></td>
                    </tr>
                    <tr>
                        <td><a href="https://luxurymetalcards.com">luxurymetalcards.com</a></td>
              </tr>
            </table>
                    
          </td>
                    
                    </tr>
                    
    </table>';
    $message .= '</body></html>';

    $mail = new email();

    $mail->BCCAdmin();

    if ($mail->Send($email, $subject, $message))
        echo 1;
    else
        echo 0;
}

function email_designer_request_upload_again($lead_id)
{
    $email = 'professionalcreative01@gmail.com';

    $subject = 'Metal Business Cards - More Design Request' . $lead_id;
    $message = '<html lang="en"><body>';
    $message .= '<table>
        
        <tr>
            <td>
                <b>Dear Creative Designer,</b><br>
                <p>
                    &nbsp;&nbsp;&nbsp;Customer needs some more creative designs. The last designs you uploaded, customer did not check.
 <br><b>Please upload some more designs.</b>
<br><br><b>Lead ID: ' . $lead_id . '</b>
                </p>
            </td>
        </tr>
        <tr>
          <td>&nbsp;<br></td>
        </tr>
         <tr>
          <td>
              <table>
              <tr>
                 <td style="width: 50%;">
                <img  style="max-width: 100%" src="https://luxurymetalcards.com/images/logo-footer.png"/>
            </td>
            <td style="width: 50%;">
                <table>
                    <tr>
                        <td><b>Frank Urbano</b></td>
                    </tr>
                    <tr>
                        <td><b>Founder</b></td>
                    </tr>
                    <tr>
                        <td><b>Metal Business Cards</b></td>
                    </tr>
                    <tr>
                        <td><b>Mobile:(949)573-7226</b></td>
                    </tr>
                    <tr>
                        <td><b><u>frank@metalcardguy.com</u></b></td>
                    </tr>
                    <tr>
                        <td><a href="https://luxurymetalcards.com">luxurymetalcards.com</a></td>
              </tr>
            </table>
    
          </td>
    
                    </tr>
    
    </table>';
    $message .= '</body></html>';
    $mail = new email();

    $mail->BCCAdmin();

    if ($mail->Send($email, $subject, $message))
        echo 1;
    else
        echo 0;
}

?>