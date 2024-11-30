<?php
include '../config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM flowers WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Xóa thành công!";
        header("Location: admin.php");
    } else {
        echo "Lỗi: " . $conn->error;
    }
}

$conn->close();
?>
