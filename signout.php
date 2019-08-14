<?php
    setcookie("Username",   "", time() - 100, "/");
    header("Location:".$_SERVER['HTTP_REFERER']);
?>