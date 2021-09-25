<?php
include('db_config.php');
include 'only-Ip.php';
require 'PHPMailer/PHPMailerAutoload.php';
include 'sendsms.php';


$projectName = '';
$project = '';
$name = '';
$phone = '';
$email = '';
$to  = 'leads.osshomes@gmail.com'; //can't be empty
$subject  = '';

if (isset($_POST['submit_inquiry'])) {
	$projectID = $_POST['project_id'];
	if (!empty($projectID)) {
		$selectProjectDetail = mysqli_query($db_connect, "SELECT * FROM project_detail WHERE project_id = '$projectID' ");
		$row = mysqli_fetch_array($selectProjectDetail);
		$projectName = $row['project_name'];
		$project = $row['project_id'];
		$city = $row['city_id'];
		if ($city == 3) {
			$to = 'hyderabad.osshomes@gmail.com'; //hyderabad.osshomes@gmail.com
		}
	}
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$subject = 'Mr/Mrs: ' . $name . ' Enqiured about : ' . $projectName;
}

if (isset($_POST['btnSortList'])) {
	$projectID = $_POST['project_id'];
	if (!empty($projectID)) {
		$selectProjectDetail = mysqli_query($db_connect, "SELECT * FROM project_detail WHERE project_id = '$projectID' ");
		$row = mysqli_fetch_array($selectProjectDetail);
		$projectName = $row['project_name'];
		$project = $row['project_id'];
		$city = $row['city_id'];
		if ($city == 3) {
			$to = 'hyderabad.osshomes@gmail.com'; //hyderabad.osshomes@gmail.com
		}
	}
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$subject = 'Mr/Mrs: ' . $name . ' is Short Listed : ' . $projectName;
}

if (isset($_POST['btnBookSiteVisit'])) {
	$projectID = $_POST['project_id'];
	if (!empty($projectID)) {
		$selectProjectDetail = mysqli_query($db_connect, "SELECT * FROM project_detail WHERE project_id = '$projectID' ");
		$row = mysqli_fetch_array($selectProjectDetail);
		$projectName = $row['project_name'];
		$project = $row['project_id'];
		$city = $row['city_id'];
		if ($city == 3) {
			$to = 'hyderabad.osshomes@gmail.com'; //hyderabad.osshomes@gmail.com
		}
	}
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$subject = 'Mr/Mrs: ' . $name . ' is Intrested to Site Visit for : ' . $projectName;
}

if (isset($_POST['btnHomeLoan'])) {
	$projectID = $_POST['project_id'];
	if (!empty($projectID)) {
		$selectProjectDetail = mysqli_query($db_connect, "SELECT * FROM project_detail WHERE project_id = '$projectID' ");
		$row = mysqli_fetch_array($selectProjectDetail);
		$projectName = $row['project_name'];
		$project = $row['project_id'];
		$city = $row['city_id'];
		if ($city == 3) {
			$to = 'hyderabad.osshomes@gmail.com'; //hyderabad.osshomes@gmail.com
		}
	}
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$subject = 'Mr/Mrs: ' . $name . ' is Applying Home Loan for : ' . $projectName;
}

if (isset($_POST['btnLegalAdvice'])) {
	$projectID = '';
	if (!empty($projectID)) {
		$selectProjectDetail = mysqli_query($db_connect, "SELECT * FROM project_detail WHERE project_id = '$projectID' ");
		$row = mysqli_fetch_array($selectProjectDetail);
		$projectName = $row['project_name'];
		$project = $row['project_id'];
		$city = $row['city_id'];
		if ($city == 3) {
			$to = 'hyderabad.osshomes@gmail.com'; //hyderabad.osshomes@gmail.com
		}
	}
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$subject = 'Mr/Mrs: ' . $name . ' is Contacting for Legal Advices ' . $projectName;
}

if (isset($_POST['btnUnitBook'])) {
	$projectID = $_POST['project_id'];
	if (!empty($projectID)) {
		$selectProjectDetail = mysqli_query($db_connect, "SELECT * FROM project_detail WHERE project_id = '$projectID' ");
		$row = mysqli_fetch_array($selectProjectDetail);
		$projectName = $row['project_name'];
		$project = $row['project_id'];
		$city = $row['city_id'];
		if ($city == 3) {
			$to = 'hyderabad.osshomes@gmail.com'; //hyderabad.osshomes@gmail.com
		}
	}
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$subject = 'Mr/Mrs: ' . $name . ' is Unit Booking for ' . $projectName;
}


// @@@@@ Property Single Page
if (isset($_POST['btn_dload_floor'])) {
	$projectID = $_POST['project_id'];
	if (!empty($projectID)) {
		$selectProjectDetail = mysqli_query($db_connect, "SELECT * FROM project_detail WHERE project_id = '$projectID' ");
		$row = mysqli_fetch_array($selectProjectDetail);
		$projectName = $row['project_name'];
		$project = $row['project_id'];
		$city = $row['city_id'];
		if ($city == 3) {
			$to = 'hyderabad.osshomes@gmail.com';
			//hyderabad.osshomes@gmail.com
		}
	}
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];

	$subject = 'Mr/Mrs: ' . $name . ' Downloading ' . $projectName . ' Floor plans and Master Plan';
}

if (isset($_POST['btnRequestPrice'])) {
	$projectID = $_POST['project_id'];
	if (!empty($projectID)) {
		$selectProjectDetail = mysqli_query($db_connect, "SELECT * FROM project_detail WHERE project_id = '$projectID' ");
		$row = mysqli_fetch_array($selectProjectDetail);
		$projectName = $row['project_name'];
		$project = $row['project_id'];
		$city = $row['city_id'];
		if ($city == 3) {
			$to = 'hyderabad.osshomes@gmail.com';
			//hyderabad.osshomes@gmail.com
		}
	}
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];

	$subject = 'Mr/Mrs: ' . $name . ' Downloading ' . $projectName . ' Price Sheet';
}

if (isset($_POST['contact-us'])) {
	$projectID = $_POST['project_id'];
	if (!empty($projectID)) {
		$selectProjectDetail = mysqli_query($db_connect, "SELECT * FROM project_detail WHERE project_id = '$projectID' ");
		$row = mysqli_fetch_array($selectProjectDetail);
		$projectName = $row['project_name'];
		$project = $row['project_id'];
		$city = $row['city_id'];
		if ($city == 3) {
			$to = 'hyderabad.osshomes@gmail.com';
			//hyderabad.osshomes@gmail.com
		}
	}
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];

	$subject = 'Mr/Mrs: ' . $name . ' Contacting ' . $projectName;
}

// @@@@@ ./ Property Single Page


$from     = $email;
$to       = $to;
$subject  = $subject;

$message  = '
<html>
<head>
<title>Sending Leads</title>
<style>
table {
	font-family: arial, sans-serif;
	border-collapse: collapse;
	width: 100%;
}

td, th {
	border: 1px solid #dddddd;
	text-align: center;
	padding: 8px;
	color: #091e42;
	font-weight: 700;font-size: 16px;
	line-height: 28px;
}
td{
	font-weight: 600;font-size: 14px;
}

tr:nth-child(even) {
	background-color: #dddddd;
}
</style>
</head>
<body>

<table>
<tr>
<th colspan="5" style="color: #F23B3B;font-weight: 700;font-size: 20px;">' . $subject . '</th>
</tr>
<tr>
<th>Name</th>
<th>Phone</th>
<th>Email</th>
<th>Project</th>
<th>Source</th>
</tr>
<tr>
<td>' . $name . '</td>
<td>' . $phone . '</td>
<td>' . $email . '</td>
<td>' . $projectName . '</td>
<td><a href="' . $source . '" target="_blank">' . $source . '</a></td>
</tr>
<tr>
<td colspan="4" style="text-align:left;font-weight: 700;font-size: 12px;">IP : ' . $ip_address . '</td>
<td style="text-align:left;font-weight: 700;font-size: 12px;">Date : ' . $leadDate . '</td>
</tr>
</table>
</body>
</html>
';



if(!empty($name) AND !empty($phone)){
  sendmail($to, $subject, $message, $from);
  $reciever = $phone;
  $smsmessage = "Dear " . ucfirst($name) . ", %0aThank you for enquiring for " . $projectName . ". %0aOur relationship manager will get in touch with you shortly. You can reach us on 9986219795 for more details.";
  sendmsg($reciever, $smsmessage);
  include 'leads_api.php';
  insertQuery($db_connect, $project, $name, $email, $phone, $source, $now);
}

function insertQuery($db_connect, $project, $name, $email, $phone, $source, $now)
{
	$insert_query = mysqli_query($db_connect, "INSERT INTO customer_detail(project_id, customer_name,email, phone, lead_source, created_date_time)VALUES('$project','$name','$email','$phone', '$source', '$now')");
	if ($insert_query) {
		echo "<script>parent.location='thank_you'</script>";
	} else {
		echo "Error" . mysqli_error($db_connect);
	}
}
function sendmail($to, $subject, $message, $from)
{
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->SMTPSecure = 'ssl';
	$mail->SMTPAuth = true;
	$mail->Host = 'osshomes.com';
	$mail->Port = 465;
	$mail->Username = 'leads@osshomes.com';
	$mail->Password = 'leads@ossomes';
	$mail->setFrom('leads@osshomes.com');
	$mail->addAddress($to);
	$mail->addReplyTo($from);
	$mail->isHTML(true);
	$mail->Subject = strip_tags($subject);
	$mail->Body = $message;

	if (!$mail->send()) {
		echo "ERROR: " . $mail->ErrorInfo;
	} else {
		// echo "SUCCESS ";
	}
}
