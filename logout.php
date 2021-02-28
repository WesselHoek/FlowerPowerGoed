<?php
session_start();
unset($_SESSION["medewerkerscode"]);
unset($_SESSION["uname"]);
unset($_SESSION["klantcode"]);
header("Location:index.php");
?>