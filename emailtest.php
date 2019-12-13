<?php
$test = "fbartoli@monaco.edu";
$uniqid = uniqid();
$from    = 'bartoli.florent@gmail.com';
$subject = 'Account Activation Required';
$headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
$activate_link = 'localhost:8000/phplogin/activate.php?email=' . $test . '&code=' . $uniqid;
$message = '<p>Please click the following link to activate your account: <a href="' . $activate_link . '">' . $activate_link . '</a></p>';
$lol = mail($test, $subject, $message, $headers);
echo ($lol);
