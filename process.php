<?php
// process.php

$servername = "localhost";
$username = "root";
$password = "Akhilcsd1!@3";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_POST['username'];
$pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

if (empty($user) || empty($pass)) {
    die("Please fill in all fields.");
}

$stmt = $conn->prepare("INSERT INTO student (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $user, $pass);

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
