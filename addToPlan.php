<?php //addToPlan
require_once 'config.php';

$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if ($connection->connect_error) die($connection->connect_error);

if (isset($_POST['addcourse']) &&
    isset($_POST['addcourse_number']) &&
    isset($_POST['addcourse_plan'])
) {
    $number = $_POST['addcourse_number'];
    $plan = $_POST['addcourse_plan'];
    $sql = "INSERT INTO `requiredclasses` (`class`, `plan`) VALUES " .
    "('$number', '$plan');";
    // echo $sql . "<br>";
    $res = $connection->query($sql);
    header("Location: admin.php");
} else {
    echo "Invalid update! All required (*) field must be entered.<br>";
}


?>