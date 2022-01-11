<?php

session_start();

if (isset($_SESSION['auth'])) {
	header('Location: ../');
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>FOMIX - Бухгалтерские услуги</title>
	<base href="http://landings/fomix.loc/">
	<!-- <base href="http://works.fresh-landing.ru/fomix/"> -->
	<link rel="shortcut icon" href="images/favicon.ico" type="images/x-icon">

	<link href="css/normalize-2.1.2.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="js/arcticmodal/jquery.arcticmodal.css" rel="stylesheet">
	<link href="js/arcticmodal/themes/simple.css" rel="stylesheet">

	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="js/arcticmodal/jquery.arcticmodal.js"></script>
	<script>
		$(function(){
			var baseUrl = $('base').attr('href');

			$('#auth-modal').arcticmodal({
				closeOnOverlayClick: false,
				afterOpen: function(){
					$('#auth-modal [name=login]').focus();
				},
				afterClose: function(){
					window.location.replace(baseUrl);
				}
			});

			$('#auth-modal form').submit(function(){
				var data = $(this).serialize();

				$.ajax({
					url: 'login.php',
					type: 'POST',
					dataType: 'json',
					data: data,
				})
				.done(function(response) {
					if (response.status == 'OK') {
						window.location.replace(baseUrl);
					} else {
						$('#auth-modal .tip').text(response.message);
					}
				});
				return false;
			});
		});
	</script>
</head>
<body>
	<!-- auth popup -->
	<div style="display: none;">
		<div id="auth-modal" class="form box-modal">
			<div class="box-modal_close arcticmodal-close"></div>
			<h3 class="caption text-center">Авторизация</h3>
			<p class="tip red text-center"></p>
			<form method="post">
				<div class="form-row text-center">
					<input class="input-text" type="text" name="login" required placeholder="Введите имя">
				</div>
				<div class="form-row text-center">
					<input class="input-text" type="password" name="pass" required placeholder="Введите пароль">
				</div>
				<div class="form-row text-center">
					<input class="button submit button-bg-orange" type="submit" name="submit" value="Войти">
				</div>
			</form>
		</div>
	</div>
</body>