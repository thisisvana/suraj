<?php
session_start();
$prevPage = $_SERVER['HTTP_REFERER'];

$_SESSION = array(); //clean up our data

session_destroy();//this will terminate the session

header("location:".$prevPage);

?>
