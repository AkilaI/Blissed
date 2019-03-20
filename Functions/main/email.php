<?php
// the message


$subject = 'Bid Notification';
$header = 'From: blissedbid@gmail.com';

// use wordwrap() if lines are longer than 70 characters
$message = wordwrap($msg,70);

// send email
mail($to,$subject,$message,$header);


?>
