<?php 
$contact_message="455";
$errpage = "55555";
$ip=$_SERVER['REMOTE_ADDR'];
$message = "$contact_message -SENT FROM THIS IP: $ip";
//mail("maxgee@me.com", "$Error Reported on: $errpage", $message);
debug_print_backtrace();
echo "We have documented the web address of the problem and thank you for helping us    improve our site!"
?>