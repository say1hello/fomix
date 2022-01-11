<?php

session_start();

if (isset($_GET['logout'])) {
	unset($_SESSION['auth']);
	header('Location: ./');
	exit;
}

if (isset($_POST['login'])) {
	$name = isset($_POST['login']) ? $_POST['login'] : null;
	$pass = isset($_POST['pass']) ? $_POST['pass'] : null;
	
	$res = loginUser($name, $pass);
	
	echo json_encode($res);
	exit;
}

/**
 * Авторизация пользователя
 * 
 * @param string $name логин
 * @param string $pass пароль
 * 
 * @return array массив данных пользователя
 */
function loginUser($name, $pass)
{
	$name = trim($name);
	$pass = md5(trim($pass));
	
	if ($name == 'admin' && $pass == '21232f297a57a5a743894a0e4a801fc3') {
		$_SESSION['auth'] = '1';
		$res['status'] = 'OK';
	} else {
		$res['status'] = 'ERROR';
		$res['message'] = 'Неверный логин или пароль';
	}
	
	return $res;
}