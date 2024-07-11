<?php
$servername = "localhost";
$username = "mobw7774_erga";
$password = "er@21ga@21";
$dbname = "mobw7774_api_erga";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, price, image_path, category, created_at, updated_at FROM Foods";
$result = $conn->query($sql);

$foods = array();
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $foods[] = $row;
  }
}

echo json_encode($foods);

$conn->close();
?>
