<?php include("templates/page_header.php");?>
<?
//-----log out log
 $content = $_SESSION['username'] . " logout";
 //echo $content;
 addLog($dbconn, "logout", $content);

session_start();
session_unset();
session_destroy();

header("Location: /");
exit();
?>
