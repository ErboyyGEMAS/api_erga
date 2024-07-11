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

// Mendapatkan ID dari request
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;

if ($id > 0) {
    // Menyiapkan query SQL
    $stmt = $conn->prepare("SELECT id, name, price, image_path, category FROM Foods WHERE id = ?");
    $stmt->bind_param("i", $id);

    $stmt->execute();
    $result = $stmt->get_result();
    $food = $result->fetch_assoc();

    if ($food) {
        echo json_encode(['status' => 'success', 'data' => $food]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Produk tidak ditemukan']);
    }

    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'ID tidak valid']);
}

// Menutup koneksi
$conn->close();
?>
