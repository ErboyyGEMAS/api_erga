<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "mobw7774_erga";
$password = "er@21ga@21";
$dbname = "mobw7774_api_erga";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$category = $_GET['category'];
$sql = "SELECT * FROM Foods WHERE category = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $category);
$stmt->execute();
$result = $stmt->get_result();

$foods = array();
while($row = $result->fetch_assoc()) {
  $foods[] = $row;
}

echo json_encode(array("foods" => $foods));

$stmt->close();
$conn->close();
?>
