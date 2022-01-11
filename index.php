<?php

session_start();
error_reporting (0);
include 'utm.php';
include 'editor.php';

?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>FOMIX - Бухгалтерские услуги</title>
	<base href="http://landings/fomix.loc/">
	<!-- <base href="http://works.fresh-landing.ru/fomix/"> -->
	<meta name="keywords" content="FOMIX - Бухгалтерские услуги">
	<meta name="description" content="FOMIX - Бухгалтерские услуги">
	<link rel="shortcut icon" href="images/favicon.ico" type="images/x-icon">

	<link href="css/normalize-2.1.2.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/icons.css" rel="stylesheet">
	<link href="js/arcticmodal/jquery.arcticmodal.css" rel="stylesheet">
	<link href="js/arcticmodal/themes/simple.css" rel="stylesheet">
	<link href="js/fancybox/jquery.fancybox.css" rel="stylesheet">
	<link href="js/timer/timer.css" rel="stylesheet">

	<?php if (!isset($_SESSION['auth'])):?>
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/animation.css" rel="stylesheet">
	<?php endif;?>

	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

	<script src="js/waypoints.min.js"></script>
	<script src="js/jquery.scrollTo.min.js"></script>
	<script src="js/jquery.localScroll.min.js"></script>
	<script src="js/arcticmodal/jquery.arcticmodal.js"></script>
	<script src="js/fancybox/jquery.fancybox.pack.js"></script>
	<script src="js/jquery.maskedinput.min.js"></script>
	<script src="js/timer/timer.js"></script>
	<script src="js/jquery.animateNumber.min.js"></script>
	<script src="js/jquery.cookie.js"></script>
	<script src="js/main.js"></script>

	<?php if (!isset($_SESSION['auth'])):?>
	<script src="js/animation.js"></script>
	<?php endif;?>

	<?php if (isset($_SESSION['auth'])):?>
	<script src="js/ckeditor/ckeditor.js"></script>
	<script>
		$(function(){
			$('.editable').attr('contenteditable', true);

			// The "instanceCreated" event is fired for every editor instance created.
			CKEDITOR.on( 'instanceCreated', function ( event ) {
				var editor = event.editor,
					element = editor.element;

				editor.on( 'configLoaded', function () {
					// Remove redundant plugins to make the editor simpler.
					/*editor.config.removePlugins = 'colorbutton,find,flash,font,' +
							'forms,iframe,image,newpage,removeformat,' +
							'smiley,specialchar,stylescombo,templates';*/
					editor.config.removePlugins = 'find, forms, newpage, templates';

					// Rearrange the toolbar layout.
					editor.config.toolbarGroups = [
						{ name: 'others' },
						{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
						{ name: 'editing', groups: [ 'selection' ] },
						{ name: 'links' },
						{ name: 'insert' },
						'/',
						{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
						{ name: 'paragraph', groups: [ 'list', 'indent', 'align' ] },
						'/',
						{ name: 'styles' },
						{ name: 'colors' }
					];

					editor.config.extraPlugins = 'inlinesave';
				} );
			} );
		});
	</script>
	<?php endif;?>
</head>

<body>
	<?php if (isset($_SESSION['auth'])):?>
	<div id="admin-panel">
		Вы вошли как Администратор <a class="right" href="login.php?logout=1">Выйти</a>
	</div>
	<?php endif;?>

	<div id="header">
		<div class="container">
			<a href="#home" class="logo">
				Бухгалтерские<br>
				услуги
			</a>
			<div class="callback">
				<div id="header-phone" class="phone editable"><?=getEditable('header-phone');?></div>
				<div class="text-center">
					<button type="button" class="button button-bg-orange callback-btn" onclick="yaTarget='callback1'">Заказать обратный звонок</button>
				</div>
			</div>
			<ul class="nav items-list">
				<li><a href="#services">Услуги</a></li>
				<li><a href="#results">Результаты</a></li>
				<li><a href="#advantages">Преимущества</a></li>
				<li><a href="#contacts">Контакты</a></li>
			</ul>
		</div>
	</div>

	<div id="home" class="section section-bg-black home">
		<div class="container clearfix">
			<div id="home-left" class="left editable" data-os-animation="pulse" data-os-animation-delay="2s">
				<?=getEditable('home-left');?>
			</div>
			<div class="right">
				<h2 id="home-header" class="header editable">
					<?=getEditable('home-header');?>
				</h2>
				<div class="form" data-os-animation="bounceIn" data-os-animation-delay="3s">
					<div class="caption">Узнайте стоимость<br>за 2 минуты</div>
					<div class="body">
						<form class="request-form" method="post">
							<input type="hidden" name="subject" value="Первый экран">
							<div class="form-row">
								<input class="input-text" type="text" name="name" placeholder="Введите имя">
							</div>
							<div class="form-row">
								<input class="input-text" type="text" name="phone" placeholder="Введите телефон" required>
							</div>
							<div class="form-row">
								<input type="submit" class="button submit button-bg-orange" name="submit" value="Узнайте стоимость" onclick="yaTarget='requestCost1'">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="benefits" class="section benefits">
		<div class="container">
			<h2 id="benefits-header" class="header editable">
				<?=getEditable('benefits-header');?>
			</h2>
			<ul class="items-list">
				<li class="first" data-os-animation="bounceInLeft" data-os-animation-delay="1s">
					<div class="icon"></div>
					<div id="benefits1" class="text editable">
						<?=getEditable('benefits1');?>
					</div>
				</li><li class="second" data-os-animation="bounceInLeft" data-os-animation-delay="0.8s">
					<div class="icon"></div>
					<div id="benefits2" class="text editable">
						<?=getEditable('benefits2');?>
					</div>
				</li><li class="third" data-os-animation="bounceInLeft" data-os-animation-delay="0.6s">
					<div class="icon"></div>
					<div id="benefits3" class="text editable">
						<?=getEditable('benefits3');?>
					</div>
				</li><li class="four" data-os-animation="bounceInLeft" data-os-animation-delay="0.4s">
					<div class="icon"></div>
					<div id="benefits4" class="text editable">
						<?=getEditable('benefits4');?>
					</div>
				</li><li class="five" data-os-animation="bounceInLeft" data-os-animation-delay="0.2s">
					<div class="icon"></div>
					<div id="benefits5" class="text editable">
						<?=getEditable('benefits5');?>
					</div>
				</li>
			</ul>
		</div>
	</div>

	<div id="clients" class="section section-bg-black clients">
		<div class="container">
			<h2 id="clients-header" class="header editable">
				<?=getEditable('clients-header');?>
			</h2>
			<ul class="items-list">
				<li class="first" data-os-animation="bounceInLeft" data-os-animation-delay="1s">
					<div class="icon"></div>
					<div id="clients1" class="text editable">
						<?=getEditable('clients1');?>
					</div>
				</li><li class="second" data-os-animation="bounceInLeft" data-os-animation-delay="0.8s">
					<div class="icon"></div>
					<div id="clients2" class="text editable">
						<?=getEditable('clients2');?>
					</div>
				</li><li class="third" data-os-animation="bounceInLeft" data-os-animation-delay="0.6s">
					<div class="icon"></div>
					<div id="clients3" class="text editable">
						<?=getEditable('clients3');?>
					</div>
				</li><li class="four" data-os-animation="bounceInLeft" data-os-animation-delay="0.4s">
					<div class="icon"></div>
					<div id="clients4" class="text editable">
						<?=getEditable('clients4');?>
					</div>
				</li><li class="five" data-os-animation="bounceInLeft" data-os-animation-delay="0.2s">
					<div class="icon"></div>
					<div id="clients5" class="text editable">
						<?=getEditable('clients5');?>
					</div>
				</li>
			</ul>
		</div>
	</div>

	<div id="services" class="section services">
		<div class="container">
			<h2 id="services-header" class="header editable">
				<?=getEditable('services-header');?>
			</h2>
			<ul class="items-list">
				<li class="first" data-os-animation="fadeInDown" data-os-animation-delay="0.2s">
					<div class="icon"></div>
					<div id="services1" class="text editable">
						<?=getEditable('services1');?>
					</div>
				</li><li class="second" data-os-animation="fadeInDown" data-os-animation-delay="0.4s">
					<div class="icon"></div>
					<div id="services2" class="text editable">
						<?=getEditable('services2');?>
					</div>
				</li><li class="third" data-os-animation="fadeInDown" data-os-animation-delay="0.6s">
					<div class="icon"></div>
					<div id="services3" class="text editable">
						<?=getEditable('services3');?>
					</div>
				</li><li class="four" data-os-animation="fadeInDown" data-os-animation-delay="0.8s">
					<div class="icon"></div>
					<div id="services4" class="text editable">
						<?=getEditable('services4');?>
					</div>
				</li><li class="five" data-os-animation="fadeInDown" data-os-animation-delay="1s">
					<div class="icon"></div>
					<div id="services5" class="text editable">
						<?=getEditable('services5');?>
					</div>
				</li><li class="six" data-os-animation="fadeInDown" data-os-animation-delay="1.2s">
					<div class="icon"></div>
					<div id="services6" class="text editable">
						<?=getEditable('services6');?>
					</div>
				</li>
			</ul>
			<div class="text-center">
				<button type="button" class="button button-bg-orange button-size-big callback-btn" data-os-animation="rubberBand" data-os-animation-delay="0.5s" onclick="yaTarget='callback2'">Узнайте стоимость</button>
			</div>
		</div>
	</div>

	<div id="action" class="section section-bg-black action">
		<div class="container">
			<div class="girl" data-os-animation="fadeInLeft"></div>
			<div class="discount">
				<div id="action1-discount-text" class="text editable">
					<?=getEditable('action1-discount-text');?>
				</div>
				<div id="action1-discount-stick" class="stick editable" data-os-animation="rotateIn" data-os-animation-delay="1s">
					<?=getEditable('action1-discount-stick');?>
				</div>
			</div>
			<div class="countdown clearfix">
				<div class="text">
					<div id="action1-countdown" class="caption editable">
						<?=getEditable('action1-countdown');?>
					</div>
					<div class="date"></div>
				</div>
				<div class="counter">
					<div id="timer1" class="timer timer-with-text">
						<div class="count-group count-days">
							<div class="flip day1Play"></div>
							<div class="flip dayPlay"></div>
						</div>
						<div class="count-group count-hours">
							<div class="flip hour2Play"></div>
							<div class="flip hourPlay"></div>
						</div>
						<div class="count-group count-minutes">
							<div class="flip minute6Play"></div>
							<div class="flip minutePlay"></div>
						</div>
						<div class="count-group count-seconds">
							<div class="flip second6Play"></div>
							<div class="flip secondPlay"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="inline-form">
				<form class="request-form" method="post">
					<input type="hidden" name="subject" value="Раздел акция 1"><input class="input-text" type="text" name="name" placeholder="Введите имя"><input class="input-text" type="text" name="phone" placeholder="Введите телефон" required><input type="submit" class="button submit button-bg-orange" name="submit" value="Забронировать" onclick="yaTarget='action1'">
				</form>
			</div>
		</div>
	</div>

	<div id="results" class="section results">
		<div class="container">
			<h2 id="results-header" class="header editable" data-os-animation="bounceIn">
				<?=getEditable('results-header')?>
			</h2>
			<div class="item">
				<div class="person clearfix" data-os-animation="fadeInLeft" data-os-animation-delay="0s">
					<img class="photo" src="files/reviews/review1-person.jpg" alt="person1">
					<div class="text">
						<div id="results1-person-company" class="company editable">
							<?=getEditable('results1-person-company')?>
						</div>
						<div id="results1-person-quote" class="quote editable">
							<?=getEditable('results1-person-quote')?>
						</div>
					</div>
				</div>
				<div class="description" data-os-animation="fadeIn" data-os-animation-delay="0.5s">
					<div id="results1-desc-caption" class="caption editable">
						<?=getEditable('results1-desc-caption')?>
					</div>
					<div id="results1-desc-params" class="params editable">
						<?=getEditable('results1-desc-params')?>
					</div>
				</div>
				<div class="result" data-os-animation="fadeIn" data-os-animation-delay="1s">
					<h3 class="caption">Результат</h3>
					<div id="results1-result" class="editable">
						<?=getEditable('results1-result')?>
					</div>
				</div>
				<a class="certificate fancybox" href="files/reviews/review1-certificate.jpg" data-os-animation="bounceIn" data-os-animation-delay="1s"><span class="zoom-icon"></span><img src="files/reviews/review1-certificate-thumb.jpg" alt="certificate"></a>
			</div>
		</div>
	</div>

	<div class="section section-bg-black results">
		<div class="container">
			<div class="item">
				<div class="person clearfix" data-os-animation="fadeInLeft" data-os-animation-delay="0s">
					<img class="photo" src="files/reviews/review2-person.jpg" alt="person2">
					<div class="text">
						<div id="results2-person-company" class="company editable">
							<?=getEditable('results2-person-company')?>
						</div>
						<div id="results2-person-quote" class="quote editable">
							<?=getEditable('results2-person-quote')?>
						</div>
					</div>
				</div>
				<div class="description" data-os-animation="fadeIn" data-os-animation-delay="0.5s">
					<div id="results2-desc-caption" class="caption editable">
						<?=getEditable('results2-desc-caption')?>
					</div>
					<div id="results2-desc-params" class="params editable">
						<?=getEditable('results2-desc-params')?>
					</div>
				</div>
				<div class="result" data-os-animation="fadeIn" data-os-animation-delay="1s">
					<h3 class="caption">Результат</h3>
					<div id="results2-result" class="editable">
						<?=getEditable('results2-result')?>
					</div>
				</div>
				<a class="certificate fancybox" href="files/reviews/review2-certificate.jpg" data-os-animation="bounceIn" data-os-animation-delay="1s"><span class="zoom-icon"></span><img src="files/reviews/review2-certificate-thumb.jpg" alt="certificate"></a>
			</div>
		</div>
	</div>

	<div class="section results">
		<div class="container">
			<div class="item">
				<div class="person clearfix" data-os-animation="fadeInLeft" data-os-animation-delay="0s">
					<img class="photo" src="files/reviews/review3-person.jpg" alt="person3">
					<div class="text">
						<div id="results3-person-company" class="company editable">
							<?=getEditable('results3-person-company')?>
						</div>
						<div id="results3-person-quote" class="quote editable">
							<?=getEditable('results3-person-quote')?>
						</div>
					</div>
				</div>
				<div class="description" data-os-animation="fadeIn" data-os-animation-delay="0.5s">
					<div id="results3-desc-caption" class="caption editable">
						<?=getEditable('results3-desc-caption')?>
					</div>
					<div id="results3-desc-params" class="params editable">
						<?=getEditable('results3-desc-params')?>
					</div>
				</div>
				<div class="result" data-os-animation="fadeIn" data-os-animation-delay="1s">
					<h3 class="caption">Результат</h3>
					<div id="results3-result" class="editable">
						<?=getEditable('results3-result')?>
					</div>
				</div>
				<a class="certificate fancybox" href="files/reviews/review3-certificate.jpg" data-os-animation="bounceIn" data-os-animation-delay="1s"><span class="zoom-icon"></span><img src="files/reviews/review3-certificate-thumb.jpg" alt="certificate"></a>
			</div>
		</div>
	</div>

	<div class="section section-bg-black results">
		<div class="container">
			<div class="item">
				<div class="person clearfix" data-os-animation="fadeInLeft" data-os-animation-delay="0s">
					<img class="photo" src="files/reviews/review4-person.jpg" alt="person4">
					<div class="text">
						<div id="results4-person-company" class="company editable">
							<?=getEditable('results4-person-company')?>
						</div>
						<div id="results4-person-quote" class="quote editable">
							<?=getEditable('results4-person-quote')?>
						</div>
					</div>
				</div>
				<div class="description" data-os-animation="fadeIn" data-os-animation-delay="0.5s">
					<div id="results4-desc-caption" class="caption editable">
						<?=getEditable('results4-desc-caption')?>
					</div>
					<div id="results4-desc-params" class="params editable">
						<?=getEditable('results4-desc-params')?>
					</div>
				</div>
				<div class="result" data-os-animation="fadeIn" data-os-animation-delay="1s">
					<h3 class="caption">Результат</h3>
					<div id="results4-result" class="editable">
						<?=getEditable('results4-result')?>
					</div>
				</div>
				<a class="certificate fancybox" href="files/reviews/review4-certificate.jpg" data-os-animation="bounceIn" data-os-animation-delay="1s"><span class="zoom-icon"></span><img src="files/reviews/review4-certificate-thumb.jpg" alt="certificate"></a>
			</div>
		</div>
	</div>

	<div class="section results">
		<div class="container">
			<div class="item">
				<div class="person clearfix" data-os-animation="fadeInLeft" data-os-animation-delay="0s">
					<img class="photo" src="files/reviews/review5-person.jpg" alt="person5">
					<div class="text">
						<div id="results5-person-company" class="company editable">
							<?=getEditable('results5-person-company')?>
						</div>
						<div id="results5-person-quote" class="quote editable">
							<?=getEditable('results5-person-quote')?>
						</div>
					</div>
				</div>
				<div class="description" data-os-animation="fadeIn" data-os-animation-delay="0.5s">
					<div id="results5-desc-caption" class="caption editable">
						<?=getEditable('results5-desc-caption')?>
					</div>
					<div id="results5-desc-params" class="params editable">
						<?=getEditable('results5-desc-params')?>
					</div>
				</div>
				<div class="result" data-os-animation="fadeIn" data-os-animation-delay="1s">
					<h3 class="caption">Результат</h3>
					<div id="results5-result" class="editable">
						<?=getEditable('results5-result')?>
					</div>
				</div>
				<a class="certificate fancybox" href="files/reviews/review5-certificate.jpg" data-os-animation="bounceIn" data-os-animation-delay="1s"><span class="zoom-icon"></span><img src="files/reviews/review5-certificate-thumb.jpg" alt="certificate"></a>
			</div>
		</div>
	</div>

	<div id="digits" class="section section-bg-black digits">
		<div class="container">
			<ul class="items-list">
				<li class="first">
					<div id="digits1-animation" class="digit" data-os-animation="zoomIn">7</div>
					<div id="digits1-text" class="text editable">
						<?=getEditable('digits1-text');?>
					</div>
				</li><li class="second">
					<div id="digits2-animation" class="digit" data-os-animation="zoomIn">100%</div>
					<div id="digits2-text" class="text editable">
						<?=getEditable('digits2-text');?>
					</div>
				</li><li class="third">
					<div id="digits3-animation" class="digit" data-os-animation="zoomIn">5 000 000</div>
					<div id="digits3-text" class="text editable">
						<?=getEditable('digits3-text');?>
					</div>
				</li><li class="four">
					<div id="digits4-animation" class="digit" data-os-animation="zoomIn">250</div>
					<div id="digits4-text" class="text editable">
						<?=getEditable('digits4-text');?>
					</div>
				</li>
			</ul>
		</div>
	</div>

	<div id="action2" class="section action action2">
		<div class="container">
			<div class="girl" data-os-animation="fadeInLeft"></div>
			<div class="discount">
				<div id="action2-discount-text" class="text editable">
					<?=getEditable('action2-discount-text');?>
				</div>
				<div id="action2-discount-stick" class="stick editable" data-os-animation="rotateIn" data-os-animation-delay="1s">
					<?=getEditable('action2-discount-stick');?>
				</div>
			</div>
			<div class="countdown clearfix">
				<div class="text">
					<div id="action2-countdown" class="caption editable">
						<?=getEditable('action2-countdown');?>
					</div>
					<div class="date"></div>
				</div>
				<div class="counter">
					<div id="timer2" class="timer timer-with-text">
						<div class="count-group count-days">
							<div class="flip day1Play"></div>
							<div class="flip dayPlay"></div>
						</div>
						<div class="count-group count-hours">
							<div class="flip hour2Play"></div>
							<div class="flip hourPlay"></div>
						</div>
						<div class="count-group count-minutes">
							<div class="flip minute6Play"></div>
							<div class="flip minutePlay"></div>
						</div>
						<div class="count-group count-seconds">
							<div class="flip second6Play"></div>
							<div class="flip secondPlay"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="inline-form">
				<form class="request-form" method="post">
					<input type="hidden" name="subject" value="Раздел акция 2"><input class="input-text" type="text" name="name" placeholder="Введите имя"><input class="input-text" type="text" name="phone" placeholder="Введите телефон" required><input type="submit" class="button submit button-bg-orange" name="submit" value="Забронировать" onclick="yaTarget='action2'">
				</form>
			</div>
		</div>
	</div>

	<div id="how-we-work" class="section section-bg-black how-we-work">
		<div class="container">
			<h2 id="how-we-work-header" class="header editable">
				<?=getEditable('how-we-work-header');?>
				Как мы работаем:
			</h2>
			<ul class="items-list">
				<li class="first" data-os-animation="fadeInLeft" data-os-animation-delay="1s">
					<div class="icon"></div>
					<div id="how-we-work1-text" class="text editable">
						<?=getEditable('how-we-work1-text');?>
					</div>
				</li><li class="second" data-os-animation="fadeInLeft" data-os-animation-delay="0.8s">
					<div class="icon"></div>
					<div id="how-we-work2-text" class="text editable">
						<?=getEditable('how-we-work2-text');?>
					</div>
				</li><li class="third" data-os-animation="fadeInLeft" data-os-animation-delay="0.6s">
					<div class="icon"></div>
					<div id="how-we-work3-text" class="text editable">
						<?=getEditable('how-we-work3-text');?>
					</div>
				</li><li class="four" data-os-animation="fadeInLeft" data-os-animation-delay="0.4s">
					<div class="icon"></div>
					<div id="how-we-work4-text" class="text editable">
						<?=getEditable('how-we-work4-text');?>
					</div>
				</li><li class="five" data-os-animation="fadeInLeft" data-os-animation-delay="0.2s">
					<div class="icon"></div>
					<div id="how-we-work5-text" class="text editable">
						<?=getEditable('how-we-work5-text');?>
					</div>
				</li>
			</ul>
		</div>
	</div>

	<div id="advantages" class="section advantages">
		<div class="container">
			<h2 id="advantages-header" class="header editable">
				<?=getEditable('advantages-header');?>
			</h2>
			<ul class="items-list">
				<li class="first">
					<div class="icon"></div>
					<div id="advantages1-text" class="text editable">
						<?=getEditable('advantages1-text');?>
					</div>
				</li><li class="second" data-os-animation="flash" data-os-animation-delay="1.5s">
					<div class="icon"></div>
					<div id="advantages2-text" class="text editable">
						<?=getEditable('advantages2-text');?>
					</div>
				</li><li class="third">
					<div class="icon"></div>
					<div id="advantages3-text" class="text editable">
						<?=getEditable('advantages3-text');?>
					</div>
				</li><li class="four">
					<div class="icon"></div>
					<div id="advantages4-text" class="text editable">
						<?=getEditable('advantages4-text');?>
					</div>
				</li><li class="five" data-os-animation="flash" data-os-animation-delay="2.5s">
					<div class="icon"></div>
					<div id="advantages5-text" class="text editable">
						<?=getEditable('advantages5-text');?>
					</div>
				</li><li class="six">
					<div class="icon"></div>
					<div id="advantages6-text" class="text editable">
						<?=getEditable('advantages6-text');?>
					</div>
				</li><li class="seven">
					<div class="icon"></div>
					<div id="advantages7-text" class="text editable">
						<?=getEditable('advantages7-text');?>
					</div>
				</li><li class="eight">
					<div class="icon"></div>
					<div id="advantages8-text" class="text editable">
						<?=getEditable('advantages8-text');?>
					</div>
				</li><li class="nine" data-os-animation="flash" data-os-animation-delay="3.5s">
					<div class="icon"></div>
					<div id="advantages9-text" class="text editable">
						<?=getEditable('advantages9-text');?>
					</div>
				</li>
			</ul>
			<div class="text-center">
				<button type="button" class="button button-bg-orange button-size-big callback-btn" data-os-animation="rubberBand" data-os-animation-delay="0.5s" onclick="yaTarget='callback4'">РассчИтать стоимость</button>
			</div>
		</div>
	</div>

	<div id="compare" class="section section-bg-black compare">
		<div class="container clearfix">
			<div class="left-column column2" data-os-animation="bounceInLeft">
				<h2 id="compare-left-column-header" class="section-header editable">
					<?=getEditable('compare-left-column-header');?>
				</h2>
				<div id="compare-left-column-text" class="editable">
					<?=getEditable('compare-left-column-text');?>
				</div>
			</div>
			<div class="right-column column2" data-os-animation="bounceInRight" data-os-animation-delay="0.5s">
				<h2 id="compare-right-column-header" class="section-header editable">
					<?=getEditable('compare-right-column-header');?>
				</h2>
				<div id="compare-right-column-text" class="editable">
					<?=getEditable('compare-right-column-text');?>
				</div>
			</div>
		</div>
	</div>

	<div id="action3" class="section action action3">
		<div class="container">
			<div class="girl" data-os-animation="fadeInLeft"></div>
			<div class="discount">
				<div id="action3-discount-text" class="text editable">
					<?=getEditable('action3-discount-text');?>
				</div>
				<div id="action3-discount-stick" class="stick editable" data-os-animation="rotateIn" data-os-animation-delay="1s">
					<?=getEditable('action3-discount-stick');?>
				</div>
			</div>
			<div class="countdown clearfix">
				<div class="text">
					<div id="action3-countdown" class="caption editable">
						<?=getEditable('action3-countdown');?>
					</div>
					<div class="date"></div>
				</div>
				<div class="counter">
					<div id="timer3" class="timer timer-with-text">
						<div class="count-group count-days">
							<div class="flip day1Play"></div>
							<div class="flip dayPlay"></div>
						</div>
						<div class="count-group count-hours">
							<div class="flip hour2Play"></div>
							<div class="flip hourPlay"></div>
						</div>
						<div class="count-group count-minutes">
							<div class="flip minute6Play"></div>
							<div class="flip minutePlay"></div>
						</div>
						<div class="count-group count-seconds">
							<div class="flip second6Play"></div>
							<div class="flip secondPlay"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="inline-form">
				<form class="request-form" method="post">
					<input type="hidden" name="subject" value="Раздел акция 3"><input class="input-text" type="text" name="name" placeholder="Введите имя"><input class="input-text" type="text" name="phone" placeholder="Введите телефон" required><input type="submit" class="button submit button-bg-orange" name="submit" value="Забронировать" onclick="yaTarget='action3'">
				</form>
			</div>
		</div>
	</div>

	<div id="contacts" class="section contacts">
		<script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=pVOaWSjx3cHzrKzR4OLXmV4fhGLyT3OA"></script>
		<div class="text">
			<h2 id="contacts-header" class="section-header editable">
				<?=getEditable('contacts-header');?>
			</h2>
			<div id="contacts-body" class="editable">
				<?=getEditable('contacts-body');?>
			</div>
		</div>
	</div>

	<div id="have-a-question" class="section have-a-question">
		<div class="container" data-os-animation="rubberBand" data-os-animation-delay="0.5s">
			<div class="text-center">
				<h2 id="have-a-question-header" class="section-header editable">
					<?=getEditable('have-a-question-header');?>
				</h2>&nbsp;&nbsp;
				<button type="button" class="button button-bg-orange button-size-big callback-btn" onclick="yaTarget='callback5'">Зайдайте их нашему менеджеру</button>
			</div>
		</div>
	</div>

	<div id="footer" class="section footer">
		<div class="container clearfix">
			<div class="right">
				<div class="developer">
					<p><img src="images/develoder-logo.png" height="27" width="27" alt="FRESH LANDING">&nbsp;&nbsp;Разработка сайта: <a href="http://fresh-landing.ru/" target="_blank">Fresh-landing.ru</a></p>
				</div>
			</div>
		</div>
	</div>

	<!-- POPUP WINDOWS -->
	<!-- Callback popup -->
	<div style="display: none;">
		<div id="callback-modal" class="form box-modal">
			<div class="box-modal_close arcticmodal-close"></div>
			<h3 class="caption text-center"></h3>
			<form method="post">
				<input type="hidden" name="subject" value="Заказ звонка">
				<div class="form-row">
					<input class="input-text" type="text" name="name" placeholder="Введите имя">
				</div>
				<div class="form-row">
					<input class="input-text" type="text" name="phone" placeholder="Введите телефон" required>
				</div>
				<div class="form-row text-center">
					<input class="button submit button-bg-orange" type="submit" name="submit" value="Отправить"/>
				</div>
			</form>
			<p class="text-center"><button type="button" id="callback-modal-btn-ok" class="button button_size_med button-bg-orange arcticmodal-close">Ok</button></p>
		</div>
	</div>
	<!-- /POPUP WINDOWS -->

	<!-- Yandex.Metrika counter --><script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter27092204 = new Ya.Metrika({id:27092204, webvisor:true, clickmap:true, trackLinks:true, accurateTrackBounce:true}); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/27092204" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->

</body>
</html>