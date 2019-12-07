<?php require_once('./backend/session-validate.php');

session_unset();
session_destroy();

header("location:index.php");
exit();
