<?php
require "connection.php";

if (isset($_POST["submit"]) && $_POST["submit"]  == 1) {
    $submitted= 1;
    $email = $_POST["email"];
    $password = $_POST["password"];
    $userError = "";
    $passwordError  = "";
    if (empty($email)) {
        $userError ="Email field cannot be empty!";
    }
    if (empty($password)) {
        $passwordError = "Password cannot be empty!";
    }
    if (!empty($password) && !empty($email)) {
        $sth = $conn->prepare("SELECT user_firstname, user_lastname, user_email, user_password FROM user where user_email ='".$email."'");
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        if (!empty($result) && $result["user_password"] == $password) {
            session_start();
            $_SESSION['logged_in'] = true;
            $_SESSION['user_email'] =$result["user_email"];
            $_SESSION['user_firstname'] =$result["user_firstname"];
            header('Location: home.php');
        } elseif (empty($result)) {
            $userError = "Email is not registered!";
        } else {
            $passwordError ="Invalid password!";
        }
        $conn = null;
    }
}
?>
<?php
/**
 * Contains opening html, head and body tags
 */

require "header.php";
?>
<?php require "login-form.php"; ?>
<?php require "footer.php";
