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


    $sql ="CREATE table IF NOT EXISTS orders (
     order_id INT( 10 ) AUTO_INCREMENT PRIMARY KEY,
     user_id INT( 5 ) NOT NULL,
     items VARCHAR( 200 ) NOT NULL, 
     total_cost  FLOAT( 10 ) NOT NULL,
     total_items INT( 10 ) NOT NULL, 
     total_gst  FLOAT ( 10 ) NOT NULL, 
     order_date DATETIME NOT NULL,
     order_status VARCHAR (20) NOT NULL,
     FOREIGN KEY (user_id) REFERENCES user(user_id)
 );" ;
     error_log($conn->exec($sql));
} catch (PDOException $e) {
    echo $e->getMessage();
}
