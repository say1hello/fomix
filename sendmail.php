<?php

session_start();

$name = '';
$phone = '';
$form_name = '';
$subject = 'Заказ звонка';

if (isset($_POST['name'])) {
	$name = $_SESSION['name'] = $_POST['name'];
} elseif (isset($_SESSION['name'])) {
	$name = $_SESSION['name'];
}
if (isset($_POST['phone'])) {
	$phone = $_SESSION['phone'] = $_POST['phone'];
} elseif (isset($_SESSION['phone'])) {
	$phone = $_SESSION['phone'];
}
if (is_array($phone)) {
	$phone = implode($phone);
}
if (isset($_POST['subject'])) {
	$subject = $_POST['subject'];
}
if (isset($_POST['got_action'])) {
	$got_action = $_POST['got_action'];
}

$location = array('yes' => 'да', 'no' => 'Нет');

if (isset($_POST['utm_source'])) {$utm_source = htmlspecialchars(strip_tags($_POST['utm_source']));}
if (isset($_POST['utm_medium'])) {$utm_medium = htmlspecialchars(strip_tags($_POST['utm_medium']));}
if (isset($_POST['utm_campaign'])) {$utm_campaign = htmlspecialchars(strip_tags($_POST['utm_campaign']));}
if (isset($_POST['utm_content'])) {$utm_content = htmlspecialchars(strip_tags($_POST['utm_content']));}
if (isset($_POST['utm_term'])) {$utm_term = htmlspecialchars(strip_tags($_POST['utm_term']));}
if (isset($_POST['utm_type'])) {$utm_type = htmlspecialchars(strip_tags($_POST['utm_type']));}

/* Message params */
$mailto = "vladivostok.amway@yandex.ru";

$message = "
	<p>
		<b>Имя отправителя:</b> $name<br>
		<b>Номер телефона:</b> $phone<br>
		<b>Источник:</b> $utm_source<br>
		<b>Среда:</b> $utm_medium<br>
		<b>Компания:</b> $utm_campaign<br>
		<b>Контент:</b> $utm_content<br>
		<b>Ключевое слово:</b> $utm_term<br>
		<b>Тип источника:</b> $utm_type
		<b>Успел по акции:</b> {$location[$got_action]}
	</p>
";

$header = "Content-type:text/html; charset = utf-8\r\nFrom:$phone";

/* Send email */
$send = mail ($mailto, $subject, $message, $header);
if ($send == 'true') {
	echo json_encode(array('status' => 'OK'));
}
