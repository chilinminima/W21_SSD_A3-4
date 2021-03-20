<?php
	session_start();
	include("config.php");
	include("lib/db.php");

    function check_csrf() {
        $user_token = $_POST["user_token"];
	$user_token = token_generate();
    if($_SESSION["user_token"] === $user_token)
    	{
		return true;
    	}
    }
?>
