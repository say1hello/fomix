<?php
//utm
$c_url = explode("?", $_SERVER['REQUEST_URI']);
$q_url = (isset($c_url[1])) ? $c_url[1] : "";

$utms = "";
$d_labels = "";
$g_labels = "";
//direct data
$dtype = array('search' => 'поисковая площадка', 'context' => 'тематическая');
$dadded = array('yes' => 'показ по одной из дополнительных фраз', 'no' => 'показ по одной из исходных фраз');
$dblock = array('premium' => 'спецразмещение', 'other' => 'блок внизу', 'none' => 'блок не на поиске Яндекса');
//adwords data
$gnetwork = array('g' => 'поиск Google', 's' => 'поисковые партнеры Google', 'c' => 'контекстно-медийная сеть Google', 'd' => 'клик из контекстно-медийной сети (таргетинг на место размещения)');
$gmatchtype = array('b' => 'точное', 'p' => 'фразовое', 'e' => 'широкое');

if(!empty($q_url)) {
	$q_p = explode("&", $q_url);
	foreach($q_p as $p) {
		$k_v = explode("=", $p);
		if($k_v[0] == "utm_source") { $utm['utm_source'] = $k_v[1]; }
		if($k_v[0] == "utm_medium") { $utm['utm_medium'] = $k_v[1]; }
		if($k_v[0] == "utm_campaign") { $utm['utm_campaign'] = $k_v[1]; }
		if($k_v[0] == "utm_term") { $utm['utm_term'] = rawurldecode($k_v[1]); }
		//direct
		if($k_v[0] == "type") { $dl['type'] = $dtype[$k_v[1]]; }
		if($k_v[0] == "source") { $dl['source'] = rawurldecode($k_v[1]); }
		if($k_v[0] == "added") { $dl['added'] = $dadded[$k_v[1]]; }
		if($k_v[0] == "block") { $dl['block'] = $dblock[$k_v[1]]; }
		if($k_v[0] == "pos") { $dl['pos'] = $k_v[1]; }
		if($k_v[0] == "key") { $dl['key'] = str_replace("+", " ", rawurldecode($k_v[1])); }
		if($k_v[0] == "campaign") { $dl['campaign'] = $k_v[1]; }
		if($k_v[0] == "ad") { $dl['ad'] = $k_v[1]; }
		if($k_v[0] == "phrase") { $dl['phrase'] = $k_v[1]; }
		//adwords
		if($k_v[0] == "network") { $gl['network'] = $gnetwork[$k_v[1]]; }
		if($k_v[0] == "placement") { $gl['placement'] = rawurldecode($k_v[1]); }
		if($k_v[0] == "adposition") { $gl['adposition'] = $k_v[1]; }
		if($k_v[0] == "creative") { $gl['creative'] = $k_v[1]; }
		if($k_v[0] == "matchtype") { $gl['matchtype'] = $gmatchtype[$k_v[1]]; }
		if($k_v[0] == "keyword") { $gl['keyword'] = str_replace("+", " ", rawurldecode($k_v[1])); }
	}
	if(isset($utm['utm_source'])) {
		setcookie("cookie_utm_source", $utm['utm_source'], time() + 31*86400);
	}
	if(isset($utm['utm_medium'])) {
		setcookie("cookie_utm_medium", $utm['utm_medium'], time() + 31*86400);
	}
	if(isset($utm['utm_campaign'])) {
		setcookie("cookie_utm_campaign", $utm['utm_campaign'], time() + 31*86400);
	}
	if(isset($utm['utm_term'])) {
		setcookie("cookie_utm_term", $utm['utm_term'], time() + 31*86400);
	}
	//direct
	if(isset($dl['type'])) {
		setcookie("dl_type", $dl['type'], time() + 31*86400);
	}
	if(isset($dl['source'])) {
		setcookie("dl_source", $dl['source'], time() + 31*86400);
	}
	if(isset($dl['added'])) {
		setcookie("dl_added", $dl['added'], time() + 31*86400);
	}
	if(isset($dl['block'])) {
		setcookie("dl_block", $dl['block'], time() + 31*86400);
	}
	if(isset($dl['pos'])) {
		setcookie("dl_pos", $dl['pos'], time() + 31*86400);
	}
	if(isset($dl['key'])) {
		setcookie("dl_key", $dl['key'], time() + 31*86400);
	}
	if(isset($dl['campaign'])) {
		setcookie("dl_campaign", $dl['campaign'], time() + 31*86400);
	}
	if(isset($dl['ad'])) {
		setcookie("dl_ad", $dl['ad'], time() + 31*86400);
	}
	if(isset($dl['phrase'])) {
		setcookie("dl_phrase", $dl['phrase'], time() + 31*86400);
	}
	//adwords
	if(isset($gl['network'])) {
		setcookie("gl_network", $gl['network'], time() + 31*86400);
	}
	if(isset($gl['placement'])) {
		setcookie("gl_placement", $gl['placement'], time() + 31*86400);
	}
	if(isset($gl['adposition'])) {
		setcookie("gl_adposition", $gl['adposition'], time() + 31*86400);
	}
	if(isset($gl['creative'])) {
		setcookie("gl_creative", $gl['creative'], time() + 31*86400);
	}
	if(isset($gl['matchtype'])) {
		setcookie("gl_matchtype", $gl['matchtype'], time() + 31*86400);
	}
	if(isset($gl['keyword'])) {
		setcookie("gl_keyword", $gl['keyword'], time() + 31*86400);
	}
}
?>