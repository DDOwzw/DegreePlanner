<!DOCTYPE html>
<html lang="en">
<!-- 
 Main plan page
 CS 6314 Sample Planner - 2019 Summer

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
                <li class="active"><a href="plan.php">Your Progress</a></li>
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
    <?php
if (!isset($_COOKIE['Username'])){
  echo "<h3>Please Login.<br><br><a href='index.php'>Return to the home page.</a></h3>";
} else {
require_once 'config.php';

$core_gpa = 0;
$cumulative_gpa = 0;
$graded_core_classes = 0;
$graded_cumulative_classes = 0;
$graded_elective_classes = 0;

$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if ($connection->connect_error) die($connection->connect_error);
$sql  = 'SELECT * FROM `user` WHERE Username="' . $_COOKIE["Username"] . '";';
$result = $connection->query($sql);
$result->data_seek(0);
$row = $result->fetch_array(MYSQLI_NUM);
$userid = $row[0];
$name = $row[1];
$username = $_COOKIE['Username'];
$Degid = $row[4];
$Admitted = $row[6];
$ExpectedGraducation = $row[7];

$sql  = 'SELECT * FROM `degreeplan` WHERE DegId="' . $Degid . '";';
// echo $sql;
$result = $connection->query($sql);
$result->data_seek(0);
$row = $result->fetch_array(MYSQLI_NUM);
$DegName = $row[1];
$DeptId = $row[2];
$numelectives = $row[3];

$sql  = 'SELECT * FROM `department` WHERE DeptId="' . $DeptId . '";';
// echo $sql;
$result = $connection->query($sql);
$result->data_seek(0);
$row = $result->fetch_array(MYSQLI_NUM);

$DeptName = $row[1];
$DeptInit = $row[2];
    echo "
    <h1>Your Degree Progress</h1>
    <hr class='big-hr'>
    <h2>Personal Information</h2>
    <p>
        <strong>Name: </strong>$name<br>
        <strong>NetID: </strong>$username<br>
        <strong>Email: </strong>$username@utdallas.edu<br>
    </p>
    <h2>Academic Information</h2>
    <p>
        <strong>Major: </strong>$DeptName<br>
        <strong>Track: </strong>$DegName<br>
        <strong>Admitted: </strong>$Admitted<br>
        <strong>Expected Graduation: </strong>$ExpectedGraducation<br>
    </p>
    <hr class='big-hr'>
    <h2>Your Track Progress</h2>

    <div>
        <h3>Required Courses</h3>
        <table class='table table-striped table-condensed'>
            <thead>
            <tr>
                <th>Prefix</th>
                <th>Number</th>
                <th>Course</th>
                <th>Grade</th>
                <th>GPA Weight</th>
                <th>Passed</th>
            </tr>
            </thead>
            <tbody>
    ";
}


$sql  = 'SELECT * FROM `requiredclasses` WHERE plan="' . $Degid . '";';
// echo $sql;
$result = $connection->query($sql);
$rows = $result->num_rows;
for ($j = 0 ; $j < $rows ; ++$j) {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);
    $class_number = $row[1];
    $sql = 'SELECT * FROM `courses` WHERE number="' . $class_number . '";';
    $res = $connection->query($sql);
    $res->data_seek(0);
    $row = $res->fetch_array(MYSQLI_NUM);
    $prefix = $row[2];
    $course_name = $row[3];
    $sql  = 'SELECT * FROM `grade` WHERE UserId="' . $userid . '" AND ClassId="' . $class_number . '";';
    // echo $sql . "<br>";
    $res = $connection->query($sql);
    $res->data_seek(0);
    $row = $res->fetch_array(MYSQLI_NUM);
    if (isset($row[3]) && $row[3] == 1) {
        $Passed = 'Pass';
        $Grade = $row[4];
        $GpaWeight = $row[5];
        $core_gpa += $GpaWeight;
        $cumulative_gpa += $GpaWeight;
        $graded_core_classes += 1;
        $graded_cumulative_classes += 1;
    } else {
        $Passed = '';
    }
    $Grade = $row[4];
    $GpaWeight = $row[5];
    echo <<<_END
        <tr>
            <td>$prefix</td>
            <td>$class_number</td>
            <td>$course_name</td>
            <td>$Grade</td>
            <td>$GpaWeight</td>
            <td>$Passed</td>
        </tr>
        _END;
}
$cgpa = $graded_core_classes > 0 ? $core_gpa / $graded_core_classes : 0;
echo "
        </tbody>
    </table>
    <h4>Core GPA: $cgpa</h4>
    <h4>Required to Graduate: 3.19</h4>
    <h3>Approved Electives Taken:</h3>
    <table class='table table-striped table-condensed'>
    <thead>
    <tr>
        <th>Prefix</th>
        <th>Number</th>
        <th>Course</th>
        <th>Grade</th>
        <th>GPA Weight</th>
        <th>Passed</th>
    </tr>
    </thead>
    <tbody>
";
// echo "core_gpa is $core_gpa";
// echo "graded_core_classes is $graded_core_classes";
$sql  = 'select * from `grade` where `UserId`=' . $userid . ' and `ClassId` not in (select class from `requiredclasses` where `plan`=' . $Degid . ')';
// echo $sql . "<br>";
$result = $connection->query($sql);
$rows = $result->num_rows;
for ($j = 0 ; $j < $rows ; ++$j) {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);
    $class_number = $row[1];
    if (isset($row[3]) && $row[3] == 1) {
        $Passed = 'Pass';
        $Grade = $row[4];
        $GpaWeight = $row[5];
        $cumulative_gpa += $GpaWeight;
        $graded_elective_classes += 1;
        $graded_cumulative_classes += 1;
    } else {
        $Passed = '';
    }
    $Grade = $row[4];
    $GpaWeight = $row[5];
    $sql = 'SELECT * FROM `courses` WHERE number="' . $class_number . '";';
    $res = $connection->query($sql);
    $res->data_seek(0);
    $row = $res->fetch_array(MYSQLI_NUM);
    $prefix = $row[2];
    $course_name = $row[3];
    echo "
    <tr>
        <td>$prefix</td>
        <td>$class_number</td>
        <td>$course_name</td>
        <td>$Grade</td>
        <td>$GpaWeight</td>
        <td>$Passed</td>
    </tr>
    ";
}
$tgpa = $graded_cumulative_classes > 0 ? $cumulative_gpa / $graded_cumulative_classes : 0;
$remain_elective_classes_num = $numelectives - $graded_elective_classes;
if ($remain_elective_classes_num < 0) {
    $remain_elective_classes_num = 0;
}
echo "
    </tbody>
</table>
<h4>Cumulative GPA: $tgpa</h4>
<h4>Required to Graduate: 3.0</h4>
<h3>Number of 6000 Level Electives Still Required: $remain_elective_classes_num of $numelectives</h3>
";
?>
<hr class="big-hr">
<h2>Add or Update a Class</h2>
<form action="grade.php" method="post">
    <p><label>Course Number<strong></strong><br>
            <select class="edit-select" name="add-coursenum">
<?php
$sql = 'SELECT * FROM `courses`';
$result = $connection->query($sql);
$rows = $result->num_rows;
for ($j = 0 ; $j < $rows ; ++$j) {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);

    echo "<option value='" . $row[1] . "'>$row[1]</option>";
    
}
?>                      
                    </select>
            <p><label>Grade<br>
                    <input type="text" size="48" name="add-grade" value=""></label></p>
            <p><label>GPA Weight<br>
                    <input type="text" size="48" name="add-gpa" value=""></label></p>
            <p><label>Passed<br>
                    <input type="checkbox" name="add-passed" value="add-passed"></label></p>
            <input type="hidden" name="Userid" value="<?php echo $userid; ?>" >
            <p><input type="submit" name="addclass" value="Add Class"></p>
        </form>
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
