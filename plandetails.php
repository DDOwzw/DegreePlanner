<!DOCTYPE html>
<html lang="en">
<!-- 
 Plan details
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
                    <li class="active"><a href="plandetails.php">Plan Details</a></li>
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
    <div class="container">
        <h1>Degree Plan Details</h1>

        <?php
        require_once 'config.php';
        $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

        if ($connection->connect_error) die($connection->connect_error);
        $query  = "SELECT * FROM `degreeplan`";
        $result = $connection->query($query);

        for ($i = 0 ; $i < $result->num_rows; ++$i) {
            // echo "row nums= $result->num_rows<br>";
            $result->data_seek($i);
            $row = $result->fetch_array(MYSQLI_NUM);

            $degid = $row[0];
            $degname = $row[1];
            $deptid = $row[2];
            $numelectives = $row[3];

            echo "<h2>" . $degname . " ";
            echo <<<_END
            Track</h2>
            <div>
            <hr class="big-hr">
            <h3>Required Courses</h3>
            <table class="table table-striped table-condensed">
            <thead>
            <tr>
            <th>Prefix</th>
            <th>Number</th>
            <th>Course</th>
            </tr>
            </thead>
            <tbody>
            _END;

            $sql  = "SELECT `class` FROM `requiredclasses` WHERE `plan`='" . $degid . "';";
            $res = $connection->query($sql);
            for ($j = 0 ; $j < $res->num_rows; ++$j) {
                $res->data_seek($j);
                $row = $res->fetch_array(MYSQLI_NUM);
                $class = $row[0];

                $sql2  = "SELECT * FROM `courses` WHERE `number`='" . $class . "';";
                // echo $sql2 . "<br>";
                $ret = $connection->query($sql2);
                $ret->data_seek(0);
                $row = $ret->fetch_array(MYSQLI_NUM);
                $prefix = $row[2];
                $name = $row[3];
                echo "
                <tr>
                <td>$prefix</td>
                <td>$class</td>
                <td>$name</td>
                </tr>
                ";
            }
            echo "</tbody>";
            echo "</table>";
            echo "<h3>Number of 6000 Level Electives Required: $numelectives</h3>";
        }

        $result->close();

        $connection->close();

        ?>


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
