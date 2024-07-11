<?php
header('Content-Type: application/json');
$conn = new mysqli('localhost', 'mobw7774_erga', 'er@21ga@21', 'mobw7774_api_erga');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// For the sake of this example, let's assume you have a way to get the current user's ID
// e.g., from a session variable or a token
$current_user_id = 1; // Placeholder for the current user's ID

$sql = "SELECT username FROM Users WHERE id = $current_user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode(['status' => 'success', 'username' => $row['username']]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'User not found']);
}

$conn->close();
?>
