<?php //addUser.php
require_once 'config.php';

$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if ($connection->connect_error) die($connection->connect_error);

if (isset($_POST['adduser']) &&
    isset($_POST['add-username']) &&
    isset($_POST['add-password']) &&
    isset($_POST['add-degree']) &&
    isset($_POST['add-displayname']) &&
    isset($_POST['add-admitted']) &&
    isset($_POST['add-expected'])
) {
    $username = $_POST['add-username'];
    $name = $_POST['add-displayname'];
    $password = $_POST['add-password'];
    $degid = $_POST['add-degree'];
    $admin = 0;
    if (isset($_POST['add-admin']) && $_POST['add-admin'] == "admin-checked") {
        $admin = 1;
    }
    $admitted = $_POST['add-admitted'];
    $expected = $_POST['add-expected'];
    // echo $userid . "<br>";
    $sql = "INSERT INTO `user` (`Name`, `Username`, `Password`, `DegId`, `admin`, `Admitted`, `ExpectedGraducation`) VALUES " .
    "('$name', '$username', '$password', $degid, $admin, '$admitted', '$expected')" .
    ";";
    // echo $sql . "<br>";
    $res = $connection->query($sql);
    header("Location: admin.php");
} else {
    echo "Invalid update! All required (*) field must be entered.<br>";
}


?>