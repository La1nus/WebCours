<?php
		session_start();
	if (!empty($_SESSION['auth']) and $_SESSION['auth']) {
		session_destroy();
	}
	setcookie('login', null, time()); 
	setcookie('key', null, time()); 
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = "login.php";
	header("Location: http://$host$uri/$extra");
