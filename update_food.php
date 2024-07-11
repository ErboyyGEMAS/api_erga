<?php
include 'db_connect.php';

$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$category = $_POST['category'];
$image_path = $_POST['image_path'];

$sql = "UPDATE Foods SET name='$name', price='$price', category='$category', image_path='$image_path' WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
    echo json_encode(['message' => 'Makanan berhasil diperbarui']);
} else {
    echo json_encode(['error' => 'Gagal memperbarui makanan']);
}

mysqli_close($conn);
?>
