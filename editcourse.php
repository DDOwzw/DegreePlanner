<?php // editcourse.php
require_once 'config.php';

$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if ($connection->connect_error) die($connection->connect_error);

if (isset($_POST['editcourse']) &&
    isset($_POST['number']) &&
    isset($_POST['name'])
) {
    $number = $_POST['number'];
    $prefix = $_POST['prefix'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $sql = "UPDATE `courses` SET `prefix`='$prefix', `name`='$name', `description`='$description' WHERE `number`='$number';";
    // echo $sql . "<br>";
    $res = $connection->query($sql);
    header("Location: admin.php");
} else {
    
}


?>
<!DOCTYPE html>
<html lang="en">
<!-- 
 Edit a course
 CS 6314 Summer 2019 - Sample Planner

 -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CS Degree Planner</title>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="plan.css" rel="stylesheet">
<?php

if (!isset($_COOKIE['Username'])) {
    header("Location: login.php");
}

$connection = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
if ($connection->connect_error){
    die($connection->connect_error);
    header("Location: logout.php");
} else {
    $number = $_POST["edit_coursenumber"];
    $sql = "SELECT * FROM `courses` WHERE `number`='$number';";
    $result = $connection->query($sql);
    $result->data_seek(0);
    $row = $result->fetch_array(MYSQLI_NUM);
    $prefix = $row[2];
    $name = $row[3];
    $description = $row[4];
}
?>
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Degree Planner</a>

            <ul class="nav navbar-nav">
                <li><a href="profile.php">Profile</a></li>
                <li><a href="plandetails.php">Plan Details</a></li>
                <li><a href="plan.php">Your Progress</a></li>
                <li><a href="courselist.php">Course List</a></li>
                <li class="active"><a href="admin.php">Admin</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php">Log Out</a></li>
            </ul>

        </div>
    </div>
</nav>

<!-- Main content area -->
<div class="container">
    <h1>Edit User</h1>
    <hr class="big-hr">
    <div>
        <form action="editcourse.php" method="post">
            <h3>Edit Course</h3>
            <p><label>Prefix<br>
                    <input type="text" size="4" name="prefix" value="<?php echo $prefix; ?>"></label></p>
            <p><label>Number*<br>
                    <h5><?php echo $number; ?></h5>
                    <input type="hidden" name="number" value="<?php echo $number; ?>"></label></p>
            <p><label>Name<br>
                    <input type="text" size="48" name="name" value="<?php echo $name; ?>"></label></p>
            <p><label>Description<br>
                    <textarea rows="5" cols="60" name="description" value=""><?php echo $description; ?></textarea></label></p>
<!--             <p><label>Required by Degree Plans</label><br>
                <input type="checkbox" value="Software Engineering"> Software Engineering
            </p>
            <p><label>Approved 6000 Level Elective</label><br>
                <input type="checkbox" value="elective" checked="checked"> Approved
            </p> -->
            <p><input class="admin-submit" type="submit" name="editcourse" value="Edit Course"></p>
        </form>
    </div> <!-- /container -->
</div>

<div class="container">
    <hr>
    <footer>
        <p>Sample Planner - CS 6314 Summer 2019</p>
    </footer>
</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
