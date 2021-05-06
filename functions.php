<?php

require_once 'config.php';


function select_all($table)
{
	global $link;
	$articles = array();
	$query =	"SELECT id, ar_name, description, date FROM {$table} ORDER BY id";
	$result = mysqli_query($link, $query);


	for ($i = 0; $i < mysqli_num_rows($result); $i++) {
		mysqli_data_seek($result, $i);
		$articles[] = mysqli_fetch_assoc($result);
	}

	mysqli_free_result($result);
	return $articles;
}

function select_current($table, $id)
{
	global $link;
	$article = '';
	$query = "SELECT id, ar_name, article, date, description FROM {$table} where id = $id;";
	$result = mysqli_query($link, $query);

	if ($result) {
		mysqli_data_seek($result, 0);
		$article = mysqli_fetch_assoc($result);

		mysqli_free_result($result);
		return $article;
	} else return false;
}

function delete($id, $table)
{
	global $link;
	$query = "DELETE FROM " . db_name . "." . $table . " WHERE id=" . $id;
	mysqli_query($link, $query);
}


function add($date, $name, $description, $article, $table)
{
	global $link;
	$query = "INSERT INTO " . db_name . "." . $table . " (date,ar_name,article, description) VALUES ('" . $date . "','" . $name . "','" . $article . "','" . $description . "')";
	mysqli_query($link, $query);
}

function update($date, $name, $description, $article, $table, $id)
{
	global $link;
	$query = "UPDATE " . db_name . "." . $table . " SET date='" . $date . "', article='" . $article . "', ar_name='" . $name . "', description='" . $description . "' WHERE id=" . $id;
	mysqli_query($link, $query);
}

function register_user($login, $password)
{
	global $link;
	$query = "INSERT INTO " . db_name . ".users (login, password) VALUES ('" . $login . "', '" . $password . "')";
	if (!mysqli_query($link, $query)) {
		return mysqli_error($link);
	}
	return true;
}

function login($login, $password)
{
	global $link;
	$query = "SELECT * FROM " . db_name . ".users WHERE login='$login' AND password='$password'";
	$result = mysqli_query($link, $query);
	$user = mysqli_fetch_assoc($result);
	return $user;
}

function generateSalt()
{
	$charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	$randStringLen = 64;

	$randString = "";
	for ($i = 0; $i < $randStringLen; $i++) {
		$randString .= $charset[mt_rand(0, strlen($charset) - 1)];
	}
	return $randString;
}

function check_user($login, $cookie)
{
	global $link;
	$query = "SELECT * FROM " . db_name . ".users WHERE login='$login' AND cookie='$cookie'";
	$result = mysqli_fetch_assoc(mysqli_query($link, $query));
	return $result;
}

function set_cookie_db($login, $cookie)
{
	global $link;
	$query = "UPDATE " . db_name . ".users SET cookie='$cookie' WHERE login='$login'";
	mysqli_query($link, $query);
}
