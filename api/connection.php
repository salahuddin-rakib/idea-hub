<?php
session_start();
try {
    $conn = new PDO("mysql:host=localhost;dbname=ideahub;", 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    // included in 'header.php'
    // so '../503.php' is wrong
    header('location: 503.php');
}