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
    die("Connection failed: " . $conn->connect_error);
}

// Mendapatkan data dari request POST
$username = $_POST['username'];
$password = $_POST['password'];

// Escape input data untuk mencegah SQL injection
$username = $conn->real_escape_string($username);
$password = $conn->real_escape_string($password);

// Periksa apakah username dan password sesuai
$sql = "SELECT * FROM Users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'fail']);
}

// Tutup koneksi
$conn->close();
?>
