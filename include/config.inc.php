<?php
//database server

if ($_SERVER['SERVER_NAME'] == "localhost")
{
	define('DB_SERVER', "localhost");
	define('DB_USER', "root");
	define('DB_PASS', "");
	define('DB_DATABASE', "cognitio");
} else {
	define('DB_SERVER', "localhost");
	define('DB_USER', "alphisco_cogniti");
	define('DB_PASS', "kenneth87");
	define('DB_DATABASE', "alphisco_cognitio");
}


date_default_timezone_set('Asia/Singapore');


?>
