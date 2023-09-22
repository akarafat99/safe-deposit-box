<?php
session_start();
include("smtp/PHPMailerAutoload.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'TLS';
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->IsHTML(true);
$mail->CharSet = 'UTF-8';
$mail->Username = "hr3989012@gmail.com";
$mail->Password = "xohaisghypnzkmyc";
$mail->SetFrom("hr3989012@gmail.com");
function smtp_mailer($to, $subject, $msg)
{
	global $counter, $mail;
	$counter += 1;
	$mail->Subject = $subject;
	$mail->Body = $msg;
	// echo $counter . "<br>";
	$mail->ClearAddresses();
	$mail->AddAddress($to);
	// echo $counter . "<br>";
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => false
		)
	);
	if (!$mail->Send()) {
		echo $mail->ErrorInfo;
	} else {
		// return 'Sent';
	}
}



?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Title Page-->
	<title>First National Bank</title>

	<link rel="stylesheet" href="../css/profile.css">
	<link href="../css/signup.css" rel="stylesheet" media="all">
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"> -->
</head>

<body>
	<div style="background: rgb(0, 0, 0, 0.3);">
		<h1 style="text-align: center; padding:10px 0 10px 0; color: black;">Confirm email sending | Rent due notice (reminder system)</h1>
	</div>

	<!-- Nav Bar 0 -->

	<!-- home -->
	<div class="container">
		<a href="../menu/home.php" class="btn">Back to home</a>
	</div>

	<?php
	if (isset($_POST['sendBills'])) {
		echo
		'<div class="container">
			<div class="profile pad-10-0 bg-white-1 bord-rad-10">
				<div class="section grid-col-1">
					<div>
						<div class="mid-sec-2 no-marg-bord m-t-10">
							<h1>Status:</h1>';
		$var1 = sizeof($_SESSION['t_email']) + 0;
		for ($i = 0; $i < sizeof($_SESSION['t_email']); $i++) {
			$to = $_SESSION["t_email"][$i];
			if ($to == '0') {
			} else {
				$now = date("Y-m-d");
				$subject = "Safe deposit box #" . $_SESSION['t_box_id'][$i] . " bill due notice (Pre)";
				$subject1 = "Safe deposit box #" . $_SESSION['t_box_id'][$i] . " bill due notice (Post)";
				$subject2 = "First National bank account registration successful - " . $now . " - " . $_SESSION['t_box_owner_id'][$i];
				$message = "Dear customer, <br>
							Greetings. Your safe deposit box ID #" . $_SESSION['t_box_id'][$i] . " validity will expire this month. 
							Please pay " . $_SESSION['t_box_price'][$i] . "$ to complete renew. <br>-First National Bank.";
				$message1 = "Dear customer, <br>
							Greetings. Your safe deposit box ID #" . $_SESSION['t_box_id'][$i] . " validity expired. 
							Please pay " . $_SESSION['t_box_price'][$i] . "$. <br>-First National Bank.";

				$message2 = "Dear customer, <br>
							Thank you for registration. Customer ID: FNB-SDB-" . $_SESSION['t_box_owner_id'][$i] . ". 
							Do not share your ID with anyone for safety purpose.<br>-First National Bank";


				// echo $message1 . '<br>';
				// echo '<p>Completed ' . ($i + 1) . ' / ' . $var1 . '</p>';
				// echo $to .' '. $subject. ' '. $message. '<br>';
				if ($_SESSION['newprepost'] == 1) {
					smtp_mailer($to, $subject, $message);
				} else if ($_SESSION['newprepost'] == 2) {
					smtp_mailer($to, $subject1, $message1);
				} else if ($_SESSION['newprepost'] == 0) {
					smtp_mailer($to, $subject2, $message2);
				}
			}
		}
		echo 'All mail send successfully.';

		echo '
							</div>
						</div>
					</div>
				</div>
		</div>';
	} else {
		echo
		'<!-- form start -->
		<div class="page-wrapper p-t-130 p-b-100 font-poppins" style="min-height: auto;">
			<div class="wrapper wrapper--w680">
				<div class="card card-4" style="background: rgb(228, 228, 228, 0.9);">
					<div class="card-body">
						<h2 class="title">Warning: </h2>
						<!-- <p><i>Field marked with red <b style="color: red;">*</b> sign must fillup</i></p><br><br> -->
						<form action="#" method="POST" enctype="multipart/form-data">
							<div class="input-group">
								<label style="color: black; font-size: 18px;">
									Are you sure to send email(s)?<br>
									Press the <i>send mail</i> button can not be undone!<br><br>
									<blank style="color: red;">**After pressing <i>send mail</i> button, do not close window.</blank>
								</label>
							</div>
	
							<div style="text-align: center;">
								<button class="btn btn--radius-2 btn--blue" type="submit" name="sendBills">Send mail</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- form finish -->';
	}
	?>







</body>

</html>