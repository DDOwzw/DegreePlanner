<!DOCTYPE html>
<html lang="en">
<!-- 
 Login page
 CS 6314 Summer 2019 Sample Planner
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
            <a class="navbar-brand" href="menu.php">Degree Planner</a>

            <ul class="nav navbar-nav">
                <li><a href="profile.php">Profile</a></li>
                <li><a href="plandetails.php">Plan Details</a></li>
                <li><a href="plan.php">Your Progress</a></li>
                <li><a href="courselist.php">Course List</a></li>
                <li><a href="admin.php">Admin</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php">Log Out</a></li>
            </ul>

        </div>
    </div>
</nav>

<!-- Main content area -->
<div class="container container-signin">
    <h1>Profile</h1>
<?php
if (!isset($_COOKIE['Username'])){
    echo "<h3>Please Login.<br><br><a href='index.php'>Return to the home page.</a></h3>";
} else {
require_once 'config.php';
$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if ($connection->connect_error) die($connection->connect_error);
$sql  = 'SELECT * FROM `user` WHERE Username="' . $_COOKIE["Username"] . '";';


$result = $connection->query($sql);
if (!$result) {
    die ("Database access failed: " . $connection->error);
} else {
    $rows = $result->num_rows;
    // echo "number of rows = $rows";
    for ($j = 0 ; $j < $rows ; ++$j) {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);

    echo <<<_END
<table class="table table-striped table-condensed">
    <thead>
    <tr>
        <th>username</th>
        <th>name</th>
        <th>password</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>$row[2]</td>
        <td>$row[1]</td>
        <td>$row[3]</td>
    </tr>
    </tbody>
</table>
_END;
    }
}
}
?>
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
