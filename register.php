<?php
	session_start();
	require_once 'functions.php';
if (!empty($_SESSION['auth']) && $_SESSION['auth'] == true) {
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
			if ($result['is_admin'] == 't') {
				$_SESSION['admin'] = true;
			} else $_SESSION['admin'] = false;
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
if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['check_password'])) {
	$login = $_POST['login'];
	$password = $_POST['password'];
	$check_password = $_POST['check_password'];
	if (!preg_match('/^[a-z0-9-]+$/i', $login)) {
		$login_error = true;
	}
	if (!preg_match('/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9]{6,16}$/', $password)) {
		$password_error = true;
	}
	if ($password !== $check_password) {
		$check_error = true;
	}
	if (!isset($login_error) && !isset($password_error) && !isset($check_error)) {
		$reg_result = register_user($login, $password);
		if ($reg_result === true) {
			$host  = $_SERVER['HTTP_HOST'];
			$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = "login.php";
			header("Location: http://$host$uri/$extra");
		} elseif (str_contains($reg_result, 'Duplicate entry')) {
			$dup_error = true;
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="css/empty.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Регистрация</title>
</head>



<body>
	<div class="empty-layout">
		<div class="register">
			<form class="register__form empty-form" action="register.php" method="post">
				<div class="empty-form__content"><span class="empty-form__title">Регистрация</span>
					<div class="empty-form__input"><input id="login" name="login" type="text" <?php if (isset($login_error)) echo "class= 'invalid'" ?>><label for="login">Логин</label>
						<?php if (isset($login_error)) echo "<span>Введите корректный логин</span>" ?>
						<div class="empty-form__prompt"> Ваш логин должен содержать только буквы латинского алфафита </div>
					</div>
					<div class="empty-form__input"><input id="password" name="password" type="password" <?php if (isset($password_error)) echo "class= 'invalid'" ?>><label for="password">Пароль</label>
						<?php if (isset($password_error)) echo "<span>Введите корректный пароль</span>" ?>
						<div class="empty-form__prompt"> Ваш пароль должен содержать хотя бы 1 заглавную букву латинского алфафита </div>
						<div class="empty-form__prompt"> Ваш пароль должен содержать хотя бы 1 строчную букву латинского алфафита </div>
						<div class="empty-form__prompt"> Ваш пароль должен содержать хотя бы 1 цифру </div>
					</div>
					<div class="empty-form__input"><input id="check_password" name="check_password" type="password" <?php if (isset($check_error)) echo "class= 'invalid'" ?>><label for="check_password">Повторите пароль</label>
						<?php if (isset($check_error)) echo "<span>Ваши пароли должны совпадать</span>" ?>
					</div>
					<?php
					if (isset($dup_error)) {
						echo '<div class="empty-form__error"> Пользователь с таким логином уже зарегистрирован </div>';
					}
					?>
				</div>
				<div class="empty-form__action">
					<div class="empty-form__btn"><button type="submit" class="btn btn_c">Зарегистрироваться</button></div>
					<div class="empty-form__hrefs"><a href="login.php" class="">Войти</a></div>
				</div>
			</form>
		</div>
	</div>
</body>

</html>