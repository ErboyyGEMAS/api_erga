<?php
include 'db_connect.php';

$category = $_GET['category'];

$sql = "SELECT * FROM Foods WHERE category='$category'";
$result = mysqli_query($conn, $sql);

$foods = [];
while ($row = mysqli_fetch_assoc($result)) {
    $foods[] = $row;
}

echo json_encode($foods);

mysqli_close($conn);
?>
