<?php
$tosend = "iiiapoklak@gmail.com"; //To:
$subject = "Заказ звонка с fomix.ru"; //Subject:
$from_name = "SelfiStick.ru"; //From:
$from_email = "email@email.com"; //From:

if(empty($_POST['phone'])) {
	exit();
}

$name = $_POST['name'];
$phone = $_POST['phone'];
$color = $_POST['color'];
$form_subject = $_POST['subject'];

$msg  = "<p><strong>".$form_subject."</strong></p>\r\n";
$msg .= "<p><strong>Имя:</strong> ".$name."</p>\r\n";
$msg .= "<p><strong>Телефон:</strong> ".$phone."</p>\r\n";
$msg .= "<p><strong>Город через Яндекс:</strong> ".$_POST['yacity']."</p>\r\n";

//geo_ip
/*$ip = $_SERVER['REMOTE_ADDR'];
$geo_info = "IP: ".$ip."\n";
include('geo.php');
$o = array();
$o['ip'] = $ip;
$o['charset'] = 'utf-8';
$geo = new Geo($o);
$gdata = $geo->get_value(false, false);
$geo_info .= "Страна: ".$gdata['country']."\n";
$geo_info .= "Город: ".$gdata['city']."\n";
$geo_info .= "Регион: ".$gdata['region']."\n";
$geo_info .= "Район: ".$gdata['district']."\n";*/

//utm
include('utm_sel.php');
$msg .= "<p><strong>UTM:</strong><br>\r\n ".nl2br($utms)."</p>\r\n<p>ГЕО:\n ".$geo_info."</p>";

$headers = "MIME-Version: 1.0\r\nContent-type: text/html; charset=utf-8\r\n";
$headers .= "From: =?UTF-8?B?".base64_encode($from_name)."?= <".$from_email.">\r\n";

if(mail($tosend, "=?UTF-8?B?".base64_encode($subject)."?=", $msg, $headers)) {
	echo json_encode(array('status' => 'OK'));
} else {
	echo json_encode(array('result' => 'ERROR'));
}

?>