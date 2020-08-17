<?php
// the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
$r=mail("aravinthraj1972@gmail.com","My subject",$msg);
if($r!=TRUE){
    echo "hi";
}
?>