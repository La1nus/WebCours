<?php
session_start();
require_once 'functions.php';


if (empty($_SESSION['auth']) or $_SESSION['auth'] == false) {
	if (!empty($_COOKIE['login']) and !empty($_COOKIE['key'])) {
		$login = $_COOKIE['login'];
		$key = $_COOKIE['key'];
		$result = check_user($login, $key);
		if (!empty($result)) {
			if ($result['is_admin'] == 't') {
				$_SESSION['admin'] = true;
			} else $_SESSION['admin'] = false;
			$_SESSION['auth'] = true;
		} else {
			setcookie('login', null, time());
			setcookie('key', null, time());
			$host  = $_SERVER['HTTP_HOST'];
			$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = "index.php";
			header("Location: http://$host$uri/$extra");
		}
	} else {
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = "index.php";
		header("Location: http://$host$uri/$extra");
	}
}

$id = 0;
$tab = 0;

$t1 = "dsssl_xsl";
$t2 = "css";
$t3 = "web_docs";
$t4 = "docs";


if (isset($_GET['id'])) {
	global $id;
	$id = $_GET['id'];
	$tab = $_GET['tab'];
	switch ($tab) {
		case 1:
			$current_article = select_current($t1, $id);
			break;
		case 2:
			$current_article = select_current($t2, $id);
			break;
		case 3:
			$current_article = select_current($t3, $id);
			break;
		case 4:
			$current_article = select_current($t4, $id);
			break;
	}
	if (isset($current_article) && $current_article) {
		$date = substr($current_article["date"], 0, 10);
		$article = $current_article["article"];
		$ar_name = $current_article["ar_name"];
	}
}

?>
<!DOCTYPE html>
<html lang="ru">

<head>
	<title> <?php
				if (isset($article))
					echo $ar_name;
				?></title>
	<meta charset="UTF-8">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" href="favicon.ico">
	<!-- <meta name="robots" content="noindex, nofollow"> -->
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/fb87bba3af.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.2/styles/default.min.css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.2/highlight.min.js"></script>
	<script>
		hljs.highlightAll();
	</script>



</head>

<body>
	<div class="wrapper">
		<header class="header header__gray">
			<div class="header__content _container">
				<div class="icon-menu">
					<span></span>
					<span></span>
					<span></span>
				</div>
				<a href="index.php" class="header__logo">??????????????</a>
				<nav class="header__menu menu__body">
					<ul class="menu__list">
						<li class="menu__item"><a href="content.php?tab=1" class="menu__link <?php if (isset($_GET['tab']) && ($_GET['tab'] == 1)) echo "menu__link_active" ?>">?????????? DSSSL ?? XSL</a></li>
						<li class="menu__item"><a href="content.php?tab=2" class="menu__link <?php if (isset($_GET['tab']) && ($_GET['tab'] == 2)) echo "menu__link_active" ?>">?????????????????? ?????????????? ???????????? CSS</a></li>
						<li class="menu__item"><a href="content.php?tab=3" class="menu__link <?php if (isset($_GET['tab']) && ($_GET['tab'] == 3)) echo "menu__link_active" ?>">?????? ???????????????? - ??????????????????????</a></li>
						<li class="menu__item"><a href="content.php?tab=4" class="menu__link <?php if (isset($_GET['tab']) && ($_GET['tab'] == 4)) echo "menu__link_active" ?>">????????????????</a></li>
					</ul>
				</nav>
				<?php
				if (!empty($_SESSION["auth"]) and $_SESSION['auth'])
					echo "<a href='logout.php' class='header__in'>??????????</a>";
				else echo "<a href='login.php' class='header__in'>??????????</a>";
				?>
			</div>
		</header>
		<main class="page page__info">
			<section class="article">
				<?php
				if (isset($article))
					echo <<<HTML
				<div class="article__content _container">
					<div class="article__title">$ar_name
					</div>
					<div class="article__date">???????? ????????????????????: $date</div>
					<div class="article__text">
					$article
					</div>
				</div>
				<a class="article__back" href='content.php?tab=$tab' >
					?????????????????? ?? ?????????????????? ??????????????
				</a>
				HTML;
				?>
			</section>
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