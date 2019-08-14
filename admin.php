<!DOCTYPE html>
<html lang="en">
<!-- 
 Admin panel
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
<?php
require_once 'config.php';

if (!isset($_COOKIE['Username'])) {
    header("Location: login.php");
}

$connection = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
if ($connection->connect_error){
    die($connection->connect_error);
    header("Location: logout.php");
} else {
    $sql = "SELECT `admin` FROM `user` WHERE `Username`='" . $_COOKIE['Username'] . "';";
    $result = $connection->query($sql);
    $result->data_seek(0);
    $row = $result->fetch_array(MYSQLI_NUM);
    $admin = $row[0];

    if (!(isset($admin) && $admin == 1)) {
        header("Location: nonadmin.php");
    }
}    



function getUserList() {
    $connection = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
    if ($connection->connect_error) die($connection->connect_error);
    $sql = "SELECT `Username` FROM `user`";
    $result = $connection->query($sql);
    $rows = $result->num_rows;
    // echo "row number = $rows";
    for ($j = 0 ; $j < $rows ; ++$j) {
        $result->data_seek($j);
        $row = $result->fetch_array(MYSQLI_NUM);
        echo '<option value="'.$row[0].'">'.$row[0].'</option>';
    }
    mysqli_close($connection);
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
            <a class="navbar-brand" href="menu.php">Degree Planner</a>

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
    <h1>Admin Panel</h1>
    <hr class="big-hr">
    <h2>User Management</h2>
    <div>
        <form action="addUser.php" method="post">
            <h3>Add a User</h3>
            <p><label>Username<strong>*</strong><br>
                <input type="text" size="48" name="add-username" value=""></label></p>
            <p><label>Password<strong>*</strong><br>
                <input type="text" size="48" name="add-password" value=""></label></p>
            <p><label>Name<strong>*</strong><br>
                <input type="text" size="48" name="add-displayname" value=""></label></p>
            <p><label>Admitted<strong>*</strong><br>
                <input type="text" size="48" name="add-admitted" value=""></label></p>
            <p><label>Expected Graducation<strong>*</strong><br>
                <input type="text" size="48" name="add-expected" value=""></label></p>
            <p><label>Admin<strong></strong><br>
                <input type="checkbox" name="add-admin" value="admin-checked"></label></p>
            <p><label>Degree Plan*<strong></strong><br>
                <select class="edit-select" name="add-degree">
                    <option value="1">Software Engineering</option>
                </select>
            <p><input class="admin-submit" type="submit" name="adduser" value="Add User"></p>
        </form>

        <hr>

        <form action="edituser.php" method="post">
            <h3>Edit a User</h3>
            <select name="edit-userid">
<?php
getUserList();
?>
            </select>
            <br><input class="admin-submit" type="submit" name="edituser" value="Edit User" style="margin-top:10px;">
        </form>

        <hr>

        <form action="deleteuser.php" method="post">
            <h3>Delete a User</h3>
            <select name="delete-userid">
<?php
getUserList();
?>
            </select>
            <br><input class="admin-submit" type="submit" name="deleteuser" value="Delete User" style="margin-top:10px;">
        </form>
    </div> <!-- /container -->

    <hr class="big-hr">
    <h2>Degree Plan Management</h2>
    <form action="addcourse.php" method="post">
        <h3>Add a Course</h3>
        <p><label>Prefix<br>
            <input type="text" size="4" name="addcourse_prefix" value=""></label></p>
        <p><label>Number*<br>
            <input type="text" size="10" name="addcourse_number" value=""></label></p>
        <p><label>Name*<br>
            <input type="text" size="48" name="addcourse_name" value=""></label></p>
        <p><label>Description<br>
            <textarea rows="3" cols="48" name="addcourse_description" value=""></textarea></label></p>
        <p><label>Required by Degree Plans</label><br>
            <select name="addcourse_plan">
            <?php
                $sql = "SELECT `DegName`, `DegId` FROM `degreeplan`;";
                $result = $connection->query($sql);
                // echo "row number = $rows";
                for ($i = 0 ; $i < $result->num_rows ; ++$i) {
                    $result->data_seek($i);
                    $row = $result->fetch_array(MYSQLI_NUM);
                    $DegName = $row[0];
                    $DegId = $row[1];
                    echo "
                    <option value='$DegId'>$DegName</option>
                    ";
                }
            ?>
        </select>
        </p><br>
        <p><label>Approved 6000 Level Elective</label><br>
            <input type="checkbox" value="elective"> Approved
        </p>
        <p><input class="admin-submit" type="submit" name="addcourse" value="Add Course"></p>
    </form>

    <hr>
    <form action="addToPlan.php" method="post">
        <h3>Add Course to Degree Plan</h3>
        <p><label>Course Number<strong></strong><br>
                <select class="edit-select" name="addcourse_number">
                    <?php
                        $sql = "SELECT `number` FROM `courses`;";
                        $result = $connection->query($sql);
                        // echo "row number = $rows";
                        for ($i = 0 ; $i < $result->num_rows ; ++$i) {
                            $result->data_seek($i);
                            $row = $result->fetch_array(MYSQLI_NUM);
                            $number = $row[0];
                            echo "
                            <option value='$number'>$number</option>
                            ";
                        }
                    ?>
                </select>
        <p><label>Degree Plan<strong></strong><br>
                <select class="edit-select" name="addcourse_plan">
                    <?php
                        $sql = "SELECT `DegName`, `DegId` FROM `degreeplan`;";
                        $result = $connection->query($sql);
                        // echo "row number = $rows";
                        for ($i = 0 ; $i < $result->num_rows ; ++$i) {
                            $result->data_seek($i);
                            $row = $result->fetch_array(MYSQLI_NUM);
                            $DegName = $row[0];
                            $DegId = $row[1];
                            echo "
                            <option value='$DegId'>$DegName</option>
                            ";
                        }
                    ?>
                </select>
        <p><input class="admin-submit" type="submit" name="addcourse" value="Add Course to Degree"></p>
    </form>
    <hr>
    <form action="removeFromPlan.php" method="post">
        <h3>Remove Course From Degree Plan</h3>
        <p><label>Course Number<strong></strong><br>
                <select class="edit-select" name="addcourse_number">
                    <?php
                        $sql = "SELECT `number` FROM `courses`;";
                        $result = $connection->query($sql);
                        // echo "row number = $rows";
                        for ($i = 0 ; $i < $result->num_rows ; ++$i) {
                            $result->data_seek($i);
                            $row = $result->fetch_array(MYSQLI_NUM);
                            $number = $row[0];
                            echo "
                            <option value='$number'>$number</option>
                            ";
                        }
                    ?>
                </select>
        <p><label>Degree Plan<strong></strong><br>
                <select class="edit-select" name="addcourse_plan">
                    <?php
                        $sql = "SELECT `DegName`, `DegId` FROM `degreeplan`;";
                        $result = $connection->query($sql);
                        // echo "row number = $rows";
                        for ($i = 0 ; $i < $result->num_rows ; ++$i) {
                            $result->data_seek($i);
                            $row = $result->fetch_array(MYSQLI_NUM);
                            $DegName = $row[0];
                            $DegId = $row[1];
                            echo "
                            <option value='$DegId'>$DegName</option>
                            ";
                        }
                    ?>
                </select>
        <p><input class="admin-submit" type="submit" name="removecourse" value="Remove Course from Degree Plan"></p>
    </form>
    <hr>
    <form action="setElectivesNum.php" method="post">
        <h3>Set Number of Electives</h3>
        <p><label>Degree Plan<strong></strong><br>
                <select class="edit-select" name="addcourse_plan">
                    <?php
                        $sql = "SELECT `DegName`, `DegId` FROM `degreeplan`;";
                        $result = $connection->query($sql);
                        // echo "row number = $rows";
                        for ($i = 0 ; $i < $result->num_rows ; ++$i) {
                            $result->data_seek($i);
                            $row = $result->fetch_array(MYSQLI_NUM);
                            $DegName = $row[0];
                            $DegId = $row[1];
                            echo "
                            <option value='$DegId'>$DegName</option>
                            ";
                        }
                    ?>
                </select>
        <p><label>Electives<br>
                <input type="text" size="4" name="editNum" value=""></label></p>
        <br><input class="admin-submit" type="submit" name="edit" value="Set Number of Electives">
    </form>
    <hr>
    <form action="editcourse.php" method="post">
        <h3>Edit a Course</h3>
        <select name="edit_coursenumber">
                    <?php
                        $sql = "SELECT `number` FROM `courses`;";
                        $result = $connection->query($sql);
                        // echo "row number = $rows";
                        for ($i = 0 ; $i < $result->num_rows ; ++$i) {
                            $result->data_seek($i);
                            $row = $result->fetch_array(MYSQLI_NUM);
                            $number = $row[0];
                            echo "
                            <option value='$number'>$number</option>
                            ";
                        }
                    ?>
        </select>
        <br><input class="admin-submit" type="submit" name="edituser" value="Edit Course" style="margin-top:10px;">
    </form> <!-- -->
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
