<?php
header('Content-Type: application/json');

// Konfigurasi koneksi database
$servername = 'localhost';
$username = 'mobw7774_erga';
$password = 'er@21ga@21';
$dbname = 'mobw7774_api_erga';

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error]);
    exit();
}

// Mendapatkan data dari request
$user_id = isset($_POST['user_id']) ? intval($_POST['user_id']) : 0;
$food_id = isset($_POST['food_id']) ? intval($_POST['food_id']) : 0;
$quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 0;
$order_date = isset($_POST['order_date']) ? $_POST['order_date'] : '';

if ($user_id > 0 && $food_id > 0 && $quantity > 0 && !empty($order_date)) {
    // Menyiapkan query SQL
    $stmt = $conn->prepare("INSERT INTO Orders (user_id, food_id, quantity, order_date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiis", $user_id, $food_id, $quantity, $order_date);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Order placed successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to place order']);
    }

    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid input data']);
}

// Menutup koneksi
$conn->close();
?>
