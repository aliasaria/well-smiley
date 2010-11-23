<?php
$database = new SQLiteDatabase( DATABASE_LOCATION , 0666, $error);
if (!$database) {
    $error = (file_exists(DATABASE_LOCATION)) ? "Impossible to open database, check permissions" : "Impossible to create database, check permissions";
    die($error);
}
//$query = $database->query("SELECT name FROM sqlite_master WHERE type='table'", SQLITE_ASSOC, 



function db_clean_input($string)
{
	return sqlite_escape_string($string);
}
?>