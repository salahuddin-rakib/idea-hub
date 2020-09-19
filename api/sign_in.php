<?php
include 'connection.php';
if (isset($_POST['data'])) {
    parse_str($_POST['data'], $data);
    $email = $data['email'];
    $password = md5($data['password']);

    try {
        $sql_query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        $result = $conn->query($sql_query);
        if ($result) {
            if ($result->rowCount() == 1) {
                $result = $result->fetch();
                $_SESSION['name'] = $result['name'];
                $_SESSION['id'] = $result['id'];
                $_SESSION['ac_type'] = $result['ac_type'];
                echo "s";
            } else {
                echo "User does not exists or wrong password";
            }
        } else {
            echo "Failed to SignIn";
        }
    } catch (PDOException $ex) {
        echo "Failed to SignIn";
    }

} else {
    header('location: index.php');
}