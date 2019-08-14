<?php //addcourse.php
require_once 'config.php';

$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if ($connection->connect_error) die($connection->connect_error);

if (isset($_POST['addcourse']) &&
    isset($_POST['addcourse_number']) &&
    isset($_POST['addcourse_name'])
) {
    $number = $_POST['addcourse_number'];
    $prefix = $_POST['addcourse_prefix'];
    $name = $_POST['addcourse_name'];
    $description = $_POST['addcourse_description'];
    $sql = "INSERT INTO `courses` (`number`, `prefix`, `name`, `description`) VALUES " .
    "('$number', '$prefix', '$name', '$description');";
    // echo $sql . "<br>";
    $res = $connection->query($sql);

    if (isset($_POST['addcourse_plan']) && !empty($_POST['addcourse_plan'])) {
        $plan = $_POST['addcourse_plan'];
        $sql = "INSERT INTO `requiredclasses` (`class`, `plan`) VALUES " .
        "('$number', '$plan');";
        // echo $sql . "<br>";
        $res = $connection->query($sql);
    } else {
        echo "NO!";
        echo isset($_POST['addcourse_plan']);
    }

    header("Location: admin.php");
} else {
    echo "Invalid update! All required (*) field must be entered.<br>";
}


?>