<?php //setElectivesNum
require_once 'config.php';

$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if ($connection->connect_error) die($connection->connect_error);

if (isset($_POST['edit']) &&
    isset($_POST['editNum']) &&
    isset($_POST['addcourse_plan'])
) {
    $numelectives = $_POST['editNum'];
    $plan = $_POST['addcourse_plan'];
    $sql = "UPDATE `degreeplan` SET `numelectives`='$numelectives' WHERE `DegId`='$plan';";
    echo $sql . "<br>";
    $res = $connection->query($sql);
    header("Location: admin.php");
} else {
    echo "Invalid update! All required (*) field must be entered.<br>";
}


?>