<?php
header('Content-Type: application/json');

// Detail koneksi database
$servername = "localhost";
$username = "mobw7774_erga";
$password = "er@21ga@21";
$dbname = "mobw7774_api_erga";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die(json_encode(['message' => 'Connection failed: ' . $conn->connect_error]));
}

// Mendapatkan data dari request POST
$name = $_POST['name'] ?? '';
$price = $_POST['price'] ?? '';
$category = $_POST['category'] ?? '';
$image_path = $_POST['image_path'] ?? '';

// Escape input data untuk mencegah SQL injection
$name = $conn->real_escape_string($name);
$price = $conn->real_escape_string($price);
$category = $conn->real_escape_string($category);
$image_path = $conn->real_escape_string($image_path);

// Masukkan data ke tabel Foods
$sql = "INSERT INTO Foods (name, price, category, image_path) VALUES ('$name', '$price', '$category', '$image_path')";
if ($conn->query($sql) === TRUE) {
    echo json_encode(['message' => 'Food added successfully']);
} else {
    echo json_encode(['message' => 'Error: ' . $conn->error]);
}

// Tutup koneksi
$conn->close();
?>
