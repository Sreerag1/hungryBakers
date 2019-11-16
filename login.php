<?php
session_start();
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "hungry_bakers";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(10) AUTO_INCREMENT PRIMARY KEY, 
    username VARCHAR(120) NOT NULL,
    password VARCHAR(120) NOT NULL
    )";

        // use exec() because no results are returned
        $conn->exec($sql);
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

if (isset($_POST["submit"]) && $_POST["submit"]  == 1) {
    $submitted= 1;
    $username = $_POST["username"];
    $password = $_POST["pwd"];
    $userError = "";
    $passwordError  = "";
    if (empty($username)) {
        $userError ="Username cannot be empty!";
    }
    if (empty($password)) {
        $passwordError = "Password cannot be empty!";
    }
    if (!empty($password) || !empty($username)) {
        $sth = $conn->prepare("SELECT username, password FROM users where username ='".$username."'");
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        if (!empty($result) && $result["password"] == $password) {
            header('Location: home.php');
        } elseif (empty($result)) {
            $userError = "Invalid username!";
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
