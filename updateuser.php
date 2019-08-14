<?php // updateuser.php
require_once 'config.php';

function endsWith($haystack, $needle) {
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }

    return (substr($haystack, -$length) === $needle);
}


$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if ($connection->connect_error) die($connection->connect_error);

if (isset($_POST['edituser']) && isset($_POST['edit-userid'])) {
    $sql = "UPDATE `user` SET ";
    if (isset($_POST['add-username']) && !empty($_POST['add-username'])) {
        $username = $_POST['add-username'];
        $sql = $sql . "`Username` = '" . $username . "',";
    }

    if (isset($_POST['add-displayname']) && !empty($_POST['add-displayname'])) {
        $name = $_POST['add-displayname'];
        $sql = $sql . "`Name` = '" . $name . "',";
    }

    if (isset($_POST['add-password']) && !empty($_POST['add-password'])) {
        $password = $_POST['add-password'];
        $sql = $sql . "`Password` = '" . $password . "',";
    }

    if (isset($_POST['add-degree']) && !empty($_POST['add-degree'])) {
        $degid = $_POST['add-degree'];
        $sql = $sql . "`DegId` = '" . $degid . "',";
    }

    if (isset($_POST['add-admin']) && !empty($_POST['add-admin'])) {
        $admin = $_POST['add-admin'] == "admin-checked" ? 1 : 0;
        $sql = $sql . "`admin` = '" . $admin . "',";
    }

    if (isset($_POST['add-expected']) && !empty($_POST['add-expected'])) {
        $expected = $_POST['add-expected'];
        $sql = $sql . "`ExpectedGraducation` = '" . $expected . "',";
    }

    if (endsWith($sql, ",")) {
        $sql = substr($sql, 0, strlen($sql) - 1);
    }

    $sql = $sql . ' WHERE `Username`="' . $_POST['edit-userid'] . '";';
    
    // echo $sql . "<br>";
    $res = $connection->query($sql);
    header("Location: admin.php");
} else {
    echo "Invalid update! All required (*) field must be entered.<br>";
}
?>