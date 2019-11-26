<?php
session_start();
echo $_SESSION["logged_in"];
$_SESSION["logged_in"] =false;
unset($_SESSION["logged_in"]);
unset($_SESSION["user_firstname"]);
unset($_SESSION["user_email"]);

header("Location:home.php");
