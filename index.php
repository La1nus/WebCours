<!DOCTYPE html>
<html lang="ru">

<head>
	<title>Главная</title>
	<meta charset="UTF-8">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" href="favicon.ico">
	<!-- <meta name="robots" content="noindex, nofollow"> -->
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/fb87bba3af.js" crossorigin="anonymous"></script>


</head>

<?php
require_once 'functions.php';
session_start();
if (empty($_SESSION['auth']) or $_SESSION['auth'] == false) {
	if (!empty($_COOKIE['login']) and !empty($_COOKIE['key'])) {
		$login = $_COOKIE['login'];
		$key = $_COOKIE['key'];
		$result = check_user($login, $key);
		if (!empty($result)) {
			if ($result['is_admin']=='t') {
				$_SESSION['admin'] = true;
			} else $_SESSION['admin'] = false;
			$_SESSION['auth'] = true;
		} else {
			setcookie('login', null, time()); 
			setcookie('key', null, time()); 
		}
	}
}
?>

<body>

	<div class="wrapper">
		<header class="header">
			<div class="header__content _container">
				<div class="icon-menu">
					<span></span>
					<span></span>
					<span></span>
				</div>
				<a href="index.php" class="header__logo">Главная</a>
				<nav class="header__menu menu__body">
					<ul class="menu__list">
						<li class="menu__item"><a href="content.php?tab=1" class="menu__link">Языки DSSSL и XSL</a></li>
						<li class="menu__item"><a href="content.php?tab=2" class="menu__link">Каскадные таблицы стилей CSS</a></li>
						<li class="menu__item"><a href="content.php?tab=3" class="menu__link">Веб документ - подключение</a></li>
						<li class="menu__item"><a href="content.php?tab=4" class="menu__link">Документ</a></li>
					</ul>
				</nav>
				<?php
				if (!empty($_SESSION["auth"]) and $_SESSION['auth'])
					echo "<a href='logout.php' class='header__in'>Выйти</a>";
				else echo "<a href='login.php' class='header__in'>Войти</a>";
				?>
			</div>
		</header>
		<main class="page">
			<div class="main-screen">
				<div class="main-screen__content _container main-content">
					<div class="main-content__head">Учебный портал по курсу 'WEB - технологии'</div>
					<div class="main-content__text">Сайт разработан с использованием стека технологий WAMP.
						В качестве текстового редактора был использован CKEditor.</div>
				</div>
			</div>
			<div class="page__bg _ibg">
				<picture>
					<source srcset="img/main.webp" type="image/webp"><img src="img/main.jpg" alt="">
				</picture>
			</div>
		</main>
		<footer class="footer">
			<div class="footer__content _container">
				<div class="footer__socials socials-footer">
					<a href="https://vk.com/" class="socials-footer__link"><i class="fab fa-vk"></i></a>
					<a href="https://www.instagram.com/" class="socials-footer__link"><i class="fab fa-instagram"></i></a>
					<a href="https://www.facebook.com/" class="socials-footer__link"><i class="fab fa-facebook"></i></a>
					<a href="https://twitter.com/?lang=ru" class="socials-footer__link"><i class="fab fa-twitter"></i></a>
				</div>
			</div>
		</footer>
	</div>

	<script src="js/app.js"></script>
</body>

</html>