<?php
$sender = 'store-manager@brownbag.pk';
$recipient = 'mansoor@brownabag.pk';

$subject = "php mail test";
$message = "php test message";
$headers = 'From:' . $sender;

if (mail($recipient, $subject, $message, $headers))
{
    echo "Message accepted";
}
else
{
    echo "Error: Message not accepted";
}
?>
