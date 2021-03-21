	<meta charset="utf-8">
	<meta name="description" content="Assignment 1 - PHP Blog">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="manifest" href="/static/site.webmanifest">
	<link rel="apple-touch-icon" href="/static/icon.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="/static/css/normalize.css">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
	<link rel="stylesheet" href="/static/css/main.css">

	<meta name="theme-color" content="#fafafa">

	<?php
	/*
	//------------------------Add these for CSRF token
    session_start();
    include("config.php");
    include("lib/db.php");

    function check_csrf() {
        if ($_REQUEST["csrf_token"] !== $_SESSION["csrf_token"]) {
            // Reset token
            unset($_SESSION["csrf_token"]);
            die("CSRF token validation failed");
        }
        return true;
    }

    function generate_csrf_token() {
        // Check if a token is present for the current session
        if(!isset($_SESSION["csrf_token"])) {
            // No token present, generate a new one
            $token = md5(microtime());
            $_SESSION["csrf_token"] = $token;
        } else {
            // Reuse the token
            $token = $_SESSION["csrf_token"];
        }
        return $token;
    }
	*/
?>
