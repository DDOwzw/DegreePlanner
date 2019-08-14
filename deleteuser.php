<?php
require_once 'config.php';

$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if ($connection->connect_error) die($connection->connect_error);

if (isset($_POST['delete-userid']) && !empty($_POST['delete-userid']) ) { // 
	$sql = "DELETE FROM `user` WHERE `Username`='" . $_POST['delete-userid'] . "';";
	echo $sql . "<br>";
	$res = $connection->query($sql);
	header("Location: admin.php");
} else {
	echo "Cannot delete empty username<br>";
}

?>