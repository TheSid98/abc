<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $dob = htmlspecialchars($_POST['dob']);
    $gender = htmlspecialchars($_POST['gender']);
    $lang = htmlspecialchars($_POST['lang']);
    $pass = htmlspecialchars($_POST['pass']); 

    $checkEmailStmt = $conn->prepare("SELECT * FROM `auth` WHERE email = ?");
    if ($checkEmailStmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
    $checkEmailStmt->bind_param("s", $email);
    $checkEmailStmt->execute();
    $checkEmailResult = $checkEmailStmt->get_result();

    if ($checkEmailResult->num_rows > 0) {
        echo "Email already exists. Please use a different email.";
    } else {
        $stmt = $conn->prepare("INSERT INTO `auth`(`first_name`, `last_name`, `email`, `phone_number`, `dob`, `gender`, `languages`, `password`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        if ($stmt === false) {
            die("Error preparing statement: " . $conn->error);
        }
        $stmt->bind_param("ssssssss", $fname, $lname, $email, $phone, $dob, $gender, $lang, $pass);

        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $checkEmailStmt->close();
}

$conn->close();
?>
