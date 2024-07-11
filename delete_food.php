<?php
$servername = "localhost"; // Ganti dengan alamat server Anda jika berbeda
$username = "mobw7774_erga";
$password = "er@21ga@21";
$dbname = "mobw7774_api_erga";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $foodId = $_POST['id'];

  // Prepare and bind
  $stmt = $conn->prepare("DELETE FROM Foods WHERE id = ?");
  $stmt->bind_param("i", $foodId);

  // Execute the statement
  if ($stmt->execute()) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }

  $stmt->close();
}

$conn->close();
?>
