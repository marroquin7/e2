<?php
session_start();
if (isset($_SESSION['outcome'])) {
    extract($_SESSION['outcome']);
    $resultAvailable = true;
} else {
    $resultAvailable = false;
}

$_SESSION['outcome'] = null;
require 'index_view.php';
