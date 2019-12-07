<?php
session_start();

if (empty($_SESSION['user_id'])) {
    $free_pass = array('/SRC/login.php', '/SRC/index.php', '/SRC/project-customer-list.php');

    if (!in_array($_SERVER['REQUEST_URI'], $free_pass)) {
        header("Location: ./index.php");
        die();
    }
}
