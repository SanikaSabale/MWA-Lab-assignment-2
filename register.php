<?php

$host = "localhost";
$dbname = "human_ludo";
$username = "root"; 
$password = "";     

$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];


$sql = "INSERT INTO registrations (name, email, contact) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $contact);

if ($stmt->execute()) {
  
  header("Location: register.html?success=1");
  exit();
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
