<?php
$ip_address='';
//whether ip is from share internet
if (!empty($_SERVER['HTTP_CLIENT_IP']))   
{
  $ip_address = $_SERVER['HTTP_CLIENT_IP'];
}
//whether ip is from proxy
else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
{
  $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
}
elseif (!empty($_SERVER['HTTP_X_FORWARDED'])) {
  $ip_address=$_SERVER['HTTP_X_FORWARDED'];
}
else if (!empty($_SERVER['HTTP_FORWARDED'])) {
  $ip_address=$_SERVER['HTTP_FORWARDED'];
}
//whether ip is from remote address
else
{
  $ip_address = $_SERVER['REMOTE_ADDR'];
}
$ip_address;

?>