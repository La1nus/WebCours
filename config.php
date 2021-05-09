<?php

define("db_host", "localhost");
define("db_name", "web_cours");
define("db_user", "root");
define("db_pass", "root");
// define("db_user", "u1374354_admin");
// define("db_pass", "Rehcjdjqghjtrn");
$link = new mysqli(db_host, db_user, db_pass, db_name);
mysqli_set_charset($link, "utf8");