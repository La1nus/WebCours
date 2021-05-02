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
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

	<?php
	session_start();
	if (empty($_SESSION['auth']) || !$_SESSION['auth']) {
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = "index.php";
		header("Location: http://$host$uri/$extra");
	}

	require_once 'functions.php';
	$zag = "";
	$but = "";
	$ar_name = "";
	$ar_txt = "";
	$ar_desc = "";
	$ar_date = "";
	$table = "";

	if (isset($_POST['add_docs']) || isset($_POST['update_docs']) || isset($_POST['delete_docs'])) {
		$table = "docs";
		$id = $_POST['id'];
	}
	if (isset($_POST['add_dsssl_xsl']) || isset($_POST['update_dsssl_xsl']) || isset($_POST['delete_dsssl_xsl'])) {
		$table = "dsssl_xsl";
		$id = $_POST['id'];
	}
	if (isset($_POST['add_css']) || isset($_POST['update_css']) || isset($_POST['delete_css'])) {
		$table = "css";
		$id = $_POST['id'];
	}
	if (isset($_POST['add_web_docs']) || isset($_POST['update_web_docs']) || isset($_POST['delete_web_docs'])) {
		$table = "web_docs";
		$id = $_POST['id'];
	}

	if (isset($_POST['add_docs']) || isset($_POST['add_dsssl_xsl']) || isset($_POST['add_css']) || isset($_POST['add_web_docs'])) {
		$ar_desc = "";
		$ar_date = "";
		$ar_name = "";
		$ar_txt = "";
		$zag = "Добавление статьи";
		$but = "Добавить";
		$aft = 1;
	} else if (isset($_POST['update_docs']) || isset($_POST['update_dsssl_xsl']) || isset($_POST['update_css']) || isset($_POST['update_web_docs'])) {
		$zag = "Редактирование статьи";
		$but = "Сохранить";
		$str = select_current($table, $id);
		$ar_desc = $str["description"];
		$ar_date = $str["date"];
		$ar_name = $str["ar_name"];
		$ar_txt = $str["article"];
		$aft = 2;
	} else if (isset($_POST['delete_docs']) || isset($_POST['delete_dsssl_xsl']) || isset($_POST['delete_css']) || isset($_POST['delete_web_docs'])) {
		$zag = "Удаление статьи";
		$but = "Удалить";
		$str = select_current($table, $id);
		$ar_desc = $str["description"];
		$ar_date = $str["date"];
		$ar_name = $str["ar_name"];
		$ar_txt = $str["article"];
		$aft = 3;
	}

	if (isset($_POST['edit'])) {
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$table = $_POST['table'];
		switch ($table) {
			case "docs":
				$extra = 'content.php?tab=4';
				break;
			case "dsssl_xsl":
				$extra = 'content.php?tab=1';
				break;
			case "css":
				$extra = 'content.php?tab=2';
				break;
			case "web_docs":
				$extra = 'content.php?tab=3';
				break;
		}
		switch ($_POST['aft']) {
			case 1:
				add($_POST['new_date'], $_POST['new_name'], $_POST['new_description'], $_POST['new_article'], $_POST["table"]);
				header("Location: http://$host$uri/$extra");
				break;
			case 2:
				update($_POST['new_date'], $_POST['new_name'], $_POST['new_description'], $_POST['new_article'], $_POST["table"], $_POST["id"]);
				header("Location: http://$host$uri/$extra");
				break;
			case 3:
				delete($_POST['id'], $_POST['table']);
				header("Location: http://$host$uri/$extra");
				break;
		}
	}

	?>
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
						<li class="menu__item"><a href="content.php?tab=1" class="menu__link <?php if (isset($table) && ($table == "dsssl_xsl")) echo "menu__link_active" ?>">Языки DSSSL и XSL</a></li>
						<li class="menu__item"><a href="content.php?tab=2" class="menu__link <?php if (isset($table) && ($table == "css")) echo "menu__link_active" ?>">Каскадные таблицы стилей CSS</a></li>
						<li class="menu__item"><a href="content.php?tab=3" class="menu__link <?php if (isset($table) && ($table == "web_docs")) echo "menu__link_active" ?>">Веб документ</a></li>
						<li class="menu__item"><a href="content.php?tab=4" class="menu__link <?php if (isset($table) && ($table == "docs")) echo "menu__link_active" ?>">Документ</a></li>
					</ul>
				</nav>
				<a href="#" class="header__in">Войти</a>
			</div>
		</header>
		<main class="page page__info">
			<section class="edit">
				<div class="edit__content _container">
					<form id="AddForm" class="open-edit__add-form add-form-open-edit edit-form edit-form__news" method="post" action="editor.php">
						<div class="add-form-open-edit__title edit-form__title"> <?php echo $zag;
																									if (isset($_POST['edit'])) echo $_POST['zag'] ?> </div>
						<div class="edit-form__text add-form-open-edit__text"><label for="new_date">Дата новости :</label>
							<div class="edit-form__input add-form-open-edit__input edit-form__input_news"><input type="date" name="new_date" id="new_date" class="" <?php echo "value='$ar_date'" ?>>
							</div>
						</div>
						<div class="edit-form__text add-form-open-edit__text"><label for="new_title">Заголовок статьи :</label>
							<div class="edit-form__input add-form-open-edit__input edit-form__input_news"><input type="text" name="new_name" id="new_title" class="" <?php echo "value='$ar_name'" ?>>
							</div>
						</div>
						<div class="edit-form__сkeditor"><label for="">Краткое описание статьи:</label> <textarea name="new_description" id="ar_txt2" cols="30" rows="10"> <?php echo "$ar_desc" ?></textarea>
							<script type="text/javascript">
								CKEDITOR.replace('ar_txt2');
							</script>
						</div>
						<div class="edit-form__сkeditor"><label for="">Описание статьи:</label> <textarea name="new_article" id="ar_txt1" cols="30" rows="10"> <?php echo "$ar_txt" ?></textarea>
							<script type="text/javascript">
								CKEDITOR.replace('ar_txt1');
							</script>
						</div>
						<input type="submit" class="add-form-open-edit__btn edit-form__btn edit-btn" name="edit" value="<?php echo $but;
																																						if (isset($_POST['edit'])) echo $_POST['edit'] ?>" />
						<input type="hidden" name="zag" value="<?php echo $zag;
																			if (isset($_POST['edit'])) echo $_POST['zag'] ?>" />
						<input type="hidden" name="id" value="<?php if (isset($id)) {
																				echo $id;
																			} else echo ""; ?>" />
						<input type="hidden" name="aft" value="<?php echo $aft;
																			if (isset($_POST['edit'])) echo $_POST['aft'] ?>" />
						<input type="hidden" name="table" value="<?php echo $table;
																				if (isset($_POST['edit'])) echo $_POST['table'] ?>" />
					</form>
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