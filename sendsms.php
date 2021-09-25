<?php
//include 'db_config.php';

function sendmsg($reciever,$smsmessage)
{
$smsmessage=str_replace(' ','%20',$smsmessage);
$ch = curl_init();
$url="http://prodnd.bulkssms.com/httpapi/smsapi?uname=osshomes&password=osshomes123&sender=OSSHOM&receiver=$reciever&group=&route=TA&msgtype=1&sms=$smsmessage";
// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_HEADER, 0);
// grab URL and pass it to the browser
curl_exec($ch);
// close cURL resource, and free up system resources
curl_close($ch);
}
