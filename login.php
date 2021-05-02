<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="css/empty.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<?php
require_once 'functions.php';

session_start();
if (!empty($_SESSION['auth'])&& $_SESSION['auth'] == true) {
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = "index.php";
	header("Location: http://$host$uri/$extra");
}

if (empty($_SESSION['auth']) or $_SESSION['auth'] == false) {
	if (!empty($_COOKIE['login']) and !empty($_COOKIE['key'])) {
		$login = $_COOKIE['login'];
		$key = $_COOKIE['key'];
		$result = check_user($login, $key);
		if (!empty($result)) {
			$_SESSION['auth'] = true;
			$host  = $_SERVER['HTTP_HOST'];
			$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = "index.php";
			header("Location: http://$host$uri/$extra");
		} else {
			setcookie('login', null, time()); 
			setcookie('key', null, time()); 
		}
	}
}
if (!empty($_POST['password']) and !empty($_POST['login'])) {

	$login = $_POST['login'];
	$password = $_POST['password'];

	$user = login($login, $password);

	if (!empty($user)) {

		$key = generateSalt();
		echo $key;
		setcookie('login', $user['login'], time() + 60 * 60 * 24 * 30);
		setcookie('key', $key, time() + 60 * 60 * 24 * 30); 
		set_cookie_db($login, $key);
		$_SESSION['auth'] = true;
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = "index.php";
		header("Location: http://$host$uri/$extra");
	} else {
		echo "Неверный логин или пароль";
	}
}
?>

<body>
	<div class="empty-layout">
		<div class="login">
			<form class="login__form empty-form" action="" method="post">
				<div class="empty-form__content"><span class="empty-form__title">Вход</span>
					<div class="empty-form__input"><input id="login" name="login" type="text" class=""><label for="login">Логин</label>
					</div>
					<div class="empty-form__input"><input id="password" type="password" name="password" class=""><label for="password">Пароль</label>
					</div>
				</div>
				<div class="empty-form__action">
					<div class="empty-form__btn"><button type="submit" class="btn btn_c">Войти</button></div>
					<div class="empty-form__hrefs"><a href="register.php" class="">Зарегистрироваться</a></div>
				</div>
			</form>
		</div>
	</div>
</body>

</html>