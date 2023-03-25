<?php

// Establishing the db connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "guvidb";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// the sign-up
$name = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
// Prepare and execute a MySQL
$stmt = $conn->prepare("INSERT INTO userdetails (username, email,password ) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $password);
$stmt->execute();

// Closing the db connection
$stmt->close();
$conn->close();

// Redirect the user 
header("Location: http://localhost/Last/login.html");
exit();

?>