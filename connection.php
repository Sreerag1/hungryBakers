<?php
    $servername = "localhost";
    $db_username = "root";
    $db_password = "root";
    $dbname = "hb";
    $conn = null;
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $db_username, $db_password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}
