<?php
require "connection.php";
require "validation.php";

if (isset($_POST["submit"]) && $_POST["submit"]  == 1) {
    foreach ($_POST as $key => $value) {
        $_POST[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
    extract($_POST, EXTR_PREFIX_SAME, "xx");
    //create $error_"" variables
    foreach ($_POST as $key => $value) {
        ${'error_' . $key} = "";
    }
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";


    $allFieldsValid = true;
    $sth = $conn->prepare('SELECT * FROM user where user_email = ?', array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array($email));
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($result)) {
        $error_email = "Email is already in use! Pleae enter new email address";
        $allFieldsValid = false;
    }

    foreach ($_POST as $key => $value) {
        if (empty($value)) {
            ${'error_' . $key} = 'This field cannot be empty!';
            $allFieldsValid = false;
        }
    }
    if (isValidEmail($email) == false) {
        $error_email = "Invalid email address! Must inclue '@', '.'";
        $allFieldsValid = false;
    }
    if (validateMobileNumber($mobileno) == false) {
        $error_mobileno = "Invalid mobile number! Must atleast contain 10 digits";
        $allFieldsValid = false;
    }
    var_dump($error_firstname);
    if (isset($allFieldsValid) && $allFieldsValid == true) {
        $user_type = "u";
        $sth = $conn->prepare('INSERT INTO user (user_firstname, user_lastname, user_email, user_mobile, user_address, user_password, user_type)
        VALUES (:user_firstname, :user_lastname, :user_email, :user_mobile, :user_address, :user_password, :user_type)');
        $sth->execute([
            'user_firstname' => htmlspecialchars($firstname),
            'user_lastname' => htmlspecialchars($lastname),
            'user_email' => htmlspecialchars($email),
            'user_mobile' => htmlspecialchars($mobileno),
            'user_address' => htmlspecialchars($address),
            'user_password' => htmlspecialchars($password),
            'user_type' => htmlspecialchars($user_type)
            ]);
    }
}
/**
 * Contains opening html, head and body tags
 */
?>
<?php require "header.php";?>
<?php require "signup-form.php"; ?>
<?php require "footer.php";
