<?php
$project_name = trim($_POST["project_name"]);
$admin_email  = trim($_POST["admin_email"]);
$form_subject = trim($_POST["form_subject"]);
$name = trim($_POST["Имя"]);

foreach ( $_POST as $key => $value ) {
	if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
		$message = "
		<html>
		<head>
		<title>Данные из формы</title>
		</head>
		<body>
		<table style='width: 100%;'>
		<tr style='background-color: #f8f8f8;'>
		<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Имя</b></td>
		<td style='padding: 10px; border: #e9e9e9 1px solid;'>$name</td>
		</tr>
		<tr style='background-color: #f8f8f8;'>
		<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>phone</b></td>
		<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
		</tr>
		</table>
		</body>
		</html>
		";
	}
}


$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: info@video-sochi.ru' . "\r\n";

if (mail($admin_email, $form_subject, $message, $headers)) {
	echo "Письмо успешно отправлено";
} else {
	echo "Ошибка при отправке письма";
}
?>