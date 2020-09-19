<?php
include 'connection.php';
if (isset($_POST['data']) && isset($_SESSION['ac_type'])) {
    parse_str($_POST['data'], $data);

    $user_id = $_SESSION['id'];
    $ac_type = $_SESSION['ac_type'];
    $title = $data['title'];
    $title = $data['details'];

    echo 's';
} else {
    header('location: index.php');
}