<!DOCTYPE html>
<html lang="en">
<!-- 
 Course List
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
                    <li class="active"><a href="courselist.php">Course List</a></li>
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
        <h1>Course Listing</h1>
        <hr class="big-hr">
        <div>
            <table class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th>Prefix</th>
                        <th>Number</th>
                        <th>Course Name</th>
                        <th>Course Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once 'config.php';
                    $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

                    if ($connection->connect_error) die($connection->connect_error);
                    $query  = "SELECT * FROM `courses`";
                    $result = $connection->query($query);

                    if (!$result) die ("Database access failed: " . $connection->error);

                    $rows = $result->num_rows;
// echo "number of rows = $rows";
                    for ($j = 0 ; $j < $rows ; ++$j)
                    {
                        $result->data_seek($j);
                        $row = $result->fetch_array(MYSQLI_NUM);

                        echo <<<_END
                        <tr>
                        <td>$row[2]</td>
                        <td>$row[1]</td>
                        <td>$row[3]</td>
                        <td>$row[4]</td>
                        </tr>
                        _END;
                    }
// <form action="mysqlitest.php" method="post">
// <input type="hidden" name="delete" value="yes">
// <input type="hidden" name="isbn" value="$row[4]">
// <input type="submit" value="DELETE RECORD"></form>

                    $result->close();
                    $connection->close();
                    ?>


            <!-- <tr>
                <td>CS</td>
                <td>5301</td>
                <td>Professional and Technical Communication</td>
                <td>CS 5301 utilizes an integrated approach to writing and speaking for the technical professions.
                    The advanced writing components of the course focus on writing professional quality technical
                    documents such as proposals, memos, abstracts, reports, letters, emails, etc.  The advanced oral
                    communication components of the course focus on planning, developing, and delivering dynamic,
                    informative and persuasive presentations.  Advanced skills in effective teamwork, leadership,
                    listening, multimedia and computer generated visual aids are also emphasized.
                    Graduate students will have a successful communication experience working in a functional
                    team environment using a real time, online learning environment.</td>
            </tr>
            <tr>
                <td>CS</td>
                <td>5303</td>
                <td>Computer Science I</td>
                <td>Computer science problem solving.  The structure and nature of algorithms and their
                    corresponding computer program implementation.  Programming in a high level
                    block-structured language</td>
            </tr>
            <tr>
                <td>CS</td>
                <td>5330</td>
                <td>Computer Science II</td>
                <td>Basic concepts of computer organization: Numbering systems, two''s complement notation,
                    multi-level machine concepts, machine language, assembly programming and optimization,
                    subroutine calls, addressing modes, code generation process, CPU datapath, pipelining, RISC,
                    CISC, performance calculation.  Co-requisite: CS 5303.</td>
                </tr> -->
            </tbody>
        </table>
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
