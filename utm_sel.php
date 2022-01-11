<?php
$utms = "";
$d_labels = "";
$g_labels = "";

//utm
	if(isset($_COOKIE['cookie_utm_source'])) {
		$utms .= "Источник (utm_source): ".$_COOKIE['cookie_utm_source']."\n";
	}
	if(isset($_COOKIE['cookie_utm_medium'])) {
		$utms .= "Тип рекламы (utm_medium): ".$_COOKIE['cookie_utm_medium']."\n";
	}
	if(isset($_COOKIE['cookie_utm_campaign'])) {
		$utms .= "Кампания (utm_campaign): ".$_COOKIE['cookie_utm_campaign']."\n";
	}
	if(isset($_COOKIE['cookie_utm_term'])) {
		$utms .= "Запрос (utm_term): ".$_COOKIE['cookie_utm_term']."\n";
	}
//direct
	if(isset($_COOKIE['dl_type'])) {
		$d_labels .= "Тип площадки, на которой произведён показ объявления: ".$_COOKIE['dl_type']."\n";
	}
	if(isset($_COOKIE['dl_source'])) {
		$d_labels .= "Название площадки РСЯ: ".$_COOKIE['dl_source']."\n";
	}
	if(isset($_COOKIE['dl_added'])) {
		$d_labels .= "Инициирован ли этот показ «дополнительными релевантными фразами»: ".$_COOKIE['dl_added']."\n";
	}
	if(isset($_COOKIE['dl_block'])) {
		$d_labels .= "Тип блока, если показ произошёл на странице с результатами поиска Яндекса: ".$_COOKIE['dl_block']."\n";
	}
	if(isset($_COOKIE['dl_pos'])) {
		$d_labels .= "Точная позиция объявления в блоке: ".$_COOKIE['dl_pos']."\n";
	}
	if(isset($_COOKIE['dl_key'])) {
		$d_labels .= "Ключевая фраза, по которой было показано объявление: ".$_COOKIE['dl_key']."\n";
	}
	if(isset($_COOKIE['dl_campaign'])) {
		$d_labels .= "Номер (ID) рекламной кампании: ".$_COOKIE['dl_campaign']."\n";
	}
	if(isset($_COOKIE['dl_ad'])) {
		$d_labels .= "Номер (ID) объявления: ".$_COOKIE['dl_ad']."\n";
	}
	if(isset($_COOKIE['dl_phrase'])) {
		$d_labels .= "Номер (ID) ключевой фразы: ".$_COOKIE['dl_phrase']."\n";
	}
//adwords
	if(isset($_COOKIE['gl_network'])) {
		$g_labels .= "Тип площадки, с которой поступил клик: ".$_COOKIE['gl_network']."\n";
	}
	if(isset($_COOKIE['gl_placement'])) {
		$g_labels .= "Название площадки: ".$_COOKIE['gl_placement']."\n";
	}
	if(isset($_COOKIE['gl_adposition'])) {
		$g_labels .= "Позиция объявления, блок страница: ".$_COOKIE['gl_adposition']."\n";
	}
	if(isset($_COOKIE['gl_creative'])) {
		$g_labels .= "Уникальный идентификатор объявления: ".$_COOKIE['gl_creative']."\n";
	}
	if(isset($_COOKIE['gl_matchtype'])) {
		$g_labels .= "Тип соответствия ключевого слова: ".$_COOKIE['gl_matchtype']."\n";
	}
	if(isset($_COOKIE['gl_keyword'])) {
		$g_labels .= "Ключевое слово: ".$_COOKIE['gl_keyword']."\n";
	}

$utms = $utms."\n<strong>Яндекс.Директ метки:</strong>\n".$d_labels."\n<strong>Google Adwords:</strong>\n".$g_labels;
?>