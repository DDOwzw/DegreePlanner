<?php //grade.php
require_once 'config.php';

$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if ($connection->connect_error) die($connection->connect_error);

if (isset($_POST['addclass']) && isset($_POST['add-passed']) &&
    is_numeric($_POST['add-grade']) && $_POST['add-grade'] >= 60 && $_POST['add-grade'] <= 100 &&
    is_numeric($_POST['add-gpa']) && $_POST['add-gpa'] >= 1 && $_POST['add-gpa'] <= 4
) {
    $course_number = $_POST['add-coursenum'];
    $grade = $_POST['add-grade'];
    $gpa = $_POST['add-gpa'];
    $pass = 1;
    $userid = $_POST['Userid'];
    echo $userid . "<br>";
    $sql = "INSERT INTO `grade` (`ClassId`, `UserId`, `Passed`, `Grade`, `GpaWeight`) VALUES " .
    "('$course_number', '$userid', $pass, '$grade', '$gpa')" .
    ";";
    echo $sql . "<br>";
    $res = $connection->query($sql);
    header("Location: plan.php");
} else {
    echo "Invalid update! Grade must be [60, 100], GPA Weight must be [1.0, 4.0], Passed must be checked!<br>";
}


?>