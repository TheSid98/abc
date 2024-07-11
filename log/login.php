<?php
include "config.php";
session_start();



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

    $result = mysqli_query($conn, "SELECT * FROM auth WHERE email='$email'");
    $row = mysqli_fetch_array($result);

    if ($row) {
        if ($pass == $row['password']) {
            $_SESSION["id"] = $row['id'];
            $_SESSION["name"] = $row['first_name']; 

            header("Location: index.php");
            exit();
        } else {
            echo "Invalid Username or Password!";
        }
    } else {
        echo "Invalid Username or Password!";
    }
}
?>
