<!DOCTYPE html>
<html lang="en">
<!-- 
 Edit a user
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
$connection = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

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
        <form action="updateuser.php" method="post">
            <h3>Edit User</h3>
            <p><label>Username<br>
                <input type="text" size="48" name="add-username" value=""></label></p>
            <p><label>Password<br>
                <input type="text" size="48" name="add-password" value=""></label></p>
            <p><label>Name<br>
                <input type="text" size="48" name="add-displayname" value=""></label></p>
            <p><label>Expected Graducation<br>
                <input type="text" size="48" name="add-expected" value=""></label></p>
            <p><label>Admin<br>
                <input type="checkbox" name="add-admin" value="admin-checked"></label></p>
            <p><label>Degree Plan<br>
                <select class="edit-select" name="add-degree">
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
            <p>
                <input class="admin-submit" type="submit" name="edituser" value="Edit User">
                <input class="hidden" name="edit-userid" value="<?php echo $_POST['edit-userid']; ?>">
            </p>
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
