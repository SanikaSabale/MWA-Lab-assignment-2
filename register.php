<?php
// Database connection
$host = "localhost";
$dbname = "human_ludo";
$username = "root"; // or your MySQL username
$password = "";     // or your MySQL password

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];

// Insert into database
$sql = "INSERT INTO registrations (name, email, contact) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $contact);

if ($stmt->execute()) {
  // Redirect to form with success
  header("Location: register.html?success=1");
  exit();
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
