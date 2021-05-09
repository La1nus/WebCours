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

$tab = 0;

$t1 = "dsssl_xsl";
$t2 = "css";
$t3 = "web_docs";
$t4 = "docs";


if (isset($_GET['tab'])) {
	$tab = $_GET['tab'];
	switch ($tab) {
		case 1:
			$table = select_all($t1);
			$table_name = $t1;
			break;
		case 2:
			$table = select_all($t2);
			$table_name = $t2;
			break;
		case 3:
			$table = select_all($t3);
			$table_name = $t3;
			break;
		case 4:
			$table = select_all($t4);
			$table_name = $t4;
			break;
		default:
			$table = [];
			$table_name = "404";
			break;
	}
}

?>
<!DOCTYPE html>
<html lang="ru">

<head>
	<title><?php
				if (isset($_GET['tab'])) {
					$tab = $_GET['tab'];
					switch ($tab) {
						case 1:
							echo "Языки DSSSL и XSL";
							break;
						case 2:
							echo "Каскадные таблицы стилей CSS";
							break;
						case 3:
							echo "Веб документ - подключение";
							break;
						case 4:
							echo "Документ";
							break;
						default:
							$table = [];
							$table_name = "404";
							break;
					}
				} ?></title>
	<meta charset="UTF-8">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" href="favicon.ico">
	<!-- <meta name="robots" content="noindex, nofollow"> -->
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/fb87bba3af.js" crossorigin="anonymous"></script>

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
				<a href="index.php" class="header__logo">Главная</a>
				<nav class="header__menu menu__body">
					<ul class="menu__list">
						<li class="menu__item"><a href="content.php?tab=1" class="menu__link <?php if (isset($_GET['tab']) && ($_GET['tab'] == 1)) echo "menu__link_active" ?>">Языки DSSSL и XSL</a></li>
						<li class="menu__item"><a href="content.php?tab=2" class="menu__link <?php if (isset($_GET['tab']) && ($_GET['tab'] == 2)) echo "menu__link_active" ?>">Каскадные таблицы стилей CSS</a></li>
						<li class="menu__item"><a href="content.php?tab=3" class="menu__link <?php if (isset($_GET['tab']) && ($_GET['tab'] == 3)) echo "menu__link_active" ?>">Веб документ - подключение</a></li>
						<li class="menu__item"><a href="content.php?tab=4" class="menu__link <?php if (isset($_GET['tab']) && ($_GET['tab'] == 4)) echo "menu__link_active" ?>">Документ</a></li>
					</ul>
				</nav>
				<?php
				if (!empty($_SESSION["auth"]) and $_SESSION['auth'])
					echo "<a href='logout.php' class='header__in'>Выйти</a>";
				else echo "<a href='login.php' class='header__in'>Войти</a>";
				?>
			</div>
		</header>
		<main class="page page__info">
			<section class="news">
				<div class="news__content _container">
					<div class="news__title">Статьи</div>
					<?php
					if (isset($table))
						for ($i = 0; $i < count($table); $i++) {
							echo <<<CARD
					<div class="news__card card-news">
						<div class="card-news__text">
							<a href="article.php?tab=$tab&id={$table[$i]["id"]}" class="card-news__title">{$table[$i]["ar_name"]}</a>
							<div class="card-news__date">
								Дата публикации: {$table[$i]["date"]}
							</div>
							<div class="card-news__description">
							{$table[$i]["description"]}
							</div>
						</div>
					</div>
					CARD;
						}
					?>
					<?php
					if (!empty($_SESSION['admin']) and $_SESSION['admin'] && $table_name != '404') {
					?>
						<form action="editor.php" method="post">
							<div class="edit-form">
								<div class="edit__btn edit-btn" id="edit">Редактировать</div>
								<div class="edit__open open-edit">
									<div class="open-edit__row">
										<button class="open-edit__btn edit-btn" <?php echo "name=add_{$table_name}" ?>> Добавить статью</button>
										<div class="open-edit__btn edit-btn" id="update_btn" <?php echo "name=update_{$table_name}" ?>> Обновить статью</div>
										<div class="open-edit__btn edit-btn" id="delete_btn" <?php echo "name=delete_{$table_name}" ?>> Удалить статью</div>
										<div class="edit-update-delete">
											<select name="id" id="" class="edit__select">
												<?php
												for ($i = 0; $i < count($table); $i++) {
													echo "<option value='{$table[$i]["id"]}'>{$table[$i]["ar_name"]}</option>";
												}
												?>
											</select>
											<button class="open-edit__btn edit-btn" id="update_article" <?php echo "name=update_{$table_name}" ?>> Обновить</button>
											<button class="open-edit__btn edit-btn" id="delete_article" <?php echo "name=delete_{$table_name}" ?>> Удалить</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					<?php
					}
					?>
				</div>
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

	<!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->
	<script src="js/app.js"></script>
</body>


</html>