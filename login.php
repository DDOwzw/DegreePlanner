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

  <?php
require_once 'config.php';
  function validLogin() {
    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    $sql = "SELECT * FROM `user` WHERE Username=:user and Password=:pass";
    // echo "<div>" . $_POST['username'] .  ", " . $_POST['pword'] . "</div>";
    $statement = $pdo -> prepare($sql);
    $statement -> bindValue(':user', $_POST['username']);
    $statement -> bindValue(':pass', $_POST['pword']);
    $statement -> execute();
    if ($statement -> rowCount() > 0) {
      return true;
    }
    return false;
  }

  function getLoginForm(){
    return "
    <form action='' method='post' role='form'>
    <div class ='form-group'>
    <label for='username'>Username</label>
    <input type='text' name='username' class='form-control'/>
    </div>
    <div class ='form-group'>
    <label for='pword'>Password</label>
    <input type='password' name='pword' class='form-control'/>
    </div>
    <input type='submit' value='Login' class='form-control' />
    </form>";
  }
  ?>

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
<!--     <h1>Sign In</h1>
    <form class="form-signin" action="menu.php">
        <label for="inputUsername" class="sr-only">Username</label>
        <input type="username" id="inputUsername" class="form-control" placeholder="Username" autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password">
        <input class="policies-submit" type="submit" value="Sign In">
    </form> -->
</div>

<h1>
<?php
require_once("config.php");

//$loggedIn = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(validLogin()) {
// echo "Welcome " . $_POST['username'];
//$loggedIn = true;
$expiryTime = time()+60*60*24;
setcookie("Username", $_POST['username'], $expiryTime, "/", false);
header("Location: ".$_SERVER['HTTP_REFERER']);
echo "<div>" . $_COOKIE['Username'] . "</div>";
}
else {
echo "login unsuccessful";
}
}
if(isset($_COOKIE['Username'])){
echo "Welcome ".$_COOKIE['Username'];
}
else{
echo " Please enter your username and password";
}
?>
</h1>

<?php 
if (!isset($_COOKIE['Username'])){
  echo getLoginForm(); 
}
else {
    header("Location: menu.php");
}
?>


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
