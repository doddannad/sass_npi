<?php
date_default_timezone_set("Asia/Kolkata");


$project = $project; // project id

$name = $name;
$email = $email;
$phone = $phone;
$projectName = "";
$state = "";
$city = "";
$area = "";
$source = $_SERVER['SERVER_NAME'];
$created = date('Y-m-d H:i:s');

if (!empty($project)) {
    $selectProjectDetail = mysqli_query($db_connect, "SELECT * FROM project_detail AS pd, country AS cr, state AS st, city AS ct,  area AS ar WHERE pd.country_id=cr.country_id AND pd.state_id=st.state_id AND pd.city_id=ct.city_id AND pd.area_id=ar.area_id AND project_id = '$project' ");
    $row = mysqli_fetch_array($selectProjectDetail);
    $projectName = $row['project_name'];
    $state = $row['state_name'];
    $city = $row['city_name'];
    $area = $row['area_name'];
}
$postFeildsForCRM = array('project_id' => $project, 'customer_name' => $name, 'email' => $email, 'phone' => $phone, 'lead_source' => $source, 'created_date_time' => $created);
$postFeildsForOSSLeads = array('lead_name' => $name, 'lead_phone' => $phone, 'lead_email' => $email, 'lead_project' => $projectName, 'lead_state' => $state, 'lead_city' => $city, 'lead_area' => $area, 'lead_source' => $source, 'lead_recived' => $created);

$remoteCRMURL = "";
$remoteOSSURL = "";
$localIpAddressArray = array('127.0.0.1', '::1');
if (in_array($_SERVER['REMOTE_ADDR'], $localIpAddressArray)) {
    $remoteCRMURL = "http://localhost/osscrm/leads_api.php";
    $remoteOSSURL = "http://localhost/osscrm/leads_oss.php";
} else {
    $remoteCRMURL = "https://mycrm.osshomes.com/leads_api.php";
    $remoteOSSURL = "https://mycrm.osshomes.com/leads_oss.php";
}

// start to send leads to crm
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $remoteCRMURL);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postFeildsForCRM);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
// end to send leads to crm

// start to send leads to all in one OSS DB
$ch1 = curl_init();
curl_setopt($ch1, CURLOPT_URL, $remoteOSSURL);
curl_setopt($ch1, CURLOPT_POST, 1);
curl_setopt($ch1, CURLOPT_POSTFIELDS, $postFeildsForOSSLeads);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch1);
// end to send leads to all in one OSS DB

// CLOSE CURL
curl_close($ch1);
