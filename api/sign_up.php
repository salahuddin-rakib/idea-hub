<?php
include 'connection.php';
if (isset($_POST['data'])) {
    parse_str($_POST['data'], $data);
    $name = $data['name'];
    $email = $data['email'];
    $password = md5($data['password']);
    $ac_type = $data['ac_type'];
    $contact_no = $data['contact_no'];
    $nid_no = $data['nid_no'];
    $address = $data['address'];
    try {
        $sql_query = "SELECT * FROM user WHERE email = '$email' OR nid_no ='$nid_no'";
        $result = $conn->query($sql_query);
        if ($result) {
            if ($result->rowCount() == 1) {
                echo "Email or NID already exist";
            } else {
                try {
                    $sql_query = "INSERT INTO user (name, email, password, ac_type, contact_no, nid_no, address) 
                               VALUES('$name','$email','$password','$ac_type','$contact_no','$nid_no','$address')";
                    $result = $conn->exec($sql_query);
                    if ($result) {
                        $_SESSION['name'] = $name;
                        $_SESSION['id'] = $conn->lastInsertId();
                        $_SESSION['ac_type'] = $ac_type;
                        echo 's';
                    } else {
                        echo "Failed to create an account";
                    }
                } catch (PDOException $ex) {
                    echo "Failed to create an account";
                }
            }
        } else {
            echo "Failed to create an account";
        }
    } catch (PDOException $ex) {
        echo "Failed to create an account";
    }
} else {
    header('location: index.php');
}