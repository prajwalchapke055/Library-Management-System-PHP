<?php

//echo(rand(111111,999999));
$code=(rand(111111,999999));
$a="govindambade28@gmail.com";

// $to_email = "govindambade28@gmail.com";
$to_email = $a;
$subject = "Simple Email Test via PHP";
$body = "Hi, This is test email send by PHP Script code :- $code";
$headers = "From: asd";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to hhh $to_email....";
} else {
    echo "Email sending failed...";
}