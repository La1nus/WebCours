<?php

require_once 'config.php';


function select_all($table)
{
	global $link;
	$rows = array();
	$query =	"SELECT id, ar_name, description, date FROM {$table} ORDER BY id";
	$result = mysqli_query($link, $query);


	for ($i = 0; $i < mysqli_num_rows($result); $i++) {
		mysqli_data_seek($result, $i);
		$rows[] = mysqli_fetch_assoc($result);
	}

	mysqli_free_result($result);
	return $rows;
}

function select_current($table, $id)
{
	global $link;
	$rows = array();
	$query = "SELECT id, ar_name, article, date, description FROM {$table} where id = $id;";
	$result = mysqli_query($link, $query);

	mysqli_data_seek($result, 0);
	$rows = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	return $rows;
}

function delete($id, $table)
{
	global $link;
	$query = "DELETE FROM " . db_name . "." . $table . " WHERE id=" . $id;
	mysqli_query($link, $query);
	//mysqli_close($link);
}


function add($date, $name, $description, $article, $table)
{
	global $link;
	$query = "INSERT INTO " . db_name . "." . $table . " (date,ar_name,article, description) VALUES ('" . $date . "','" . $name . "','" . $article . "','" . $description . "')";
	mysqli_query($link, $query);
	//mysqli_close($link);
}

function update($date, $name, $description, $article, $table, $id)
{
	global $link;
	$query = "UPDATE " . db_name . "." . $table . " SET date='" . $date . "', article='" . $article . "', ar_name='" . $name . "', description='" . $description . "' WHERE id=" . $id;
	mysqli_query($link, $query);
	//mysqli_close($link);
}

function register_user($login, $password)
{
	global $link;
	$query = "INSERT INTO " . db_name . ".users (login, password) VALUES ('" . $login . "', '" . $password . "')";
	if (!mysqli_query($link, $query)) {
		printf("Сообщение ошибки: %s\n", mysqli_error($link));
	}
}

function login($login, $password)
{
	global $link;
	$query = "SELECT * FROM users WHERE login='$login' AND password='$password'";
	$result = mysqli_query($link, $query);
	$user = mysqli_fetch_assoc($result);
	return $user;
}

function generateSalt() {
	$charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	$randStringLen = 64;

	$randString = "";
	for ($i = 0; $i < $randStringLen; $i++) {
		 $randString .= $charset[mt_rand(0, strlen($charset) - 1)];
	}
	echo $randString;
	return $randString;
}

function check_user($login, $key) {
	global $link;
	$query = 'SELECT * FROM users WHERE login="' . $login . '" AND cookie="' . $key . '"';
	$result = mysqli_fetch_assoc(mysqli_query($link, $query));
	return $result;
}

function set_cookie_db($login,$key) {
	global $link;
	$query = 'UPDATE users SET cookie="'.$key.'" WHERE login="'.$login.'"';
	if (!mysqli_query($link, $query)) {
		printf("Сообщение ошибки: %s\n", mysqli_error($link));
	}
}
