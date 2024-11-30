<?php
include '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($image_tmp, "../images/" . $image);

    $sql = "INSERT INTO flowers (name, description, image) VALUES ('$name', '$description', '$image')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Thêm thành công!";
        header("Location: admin.php");
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm loài hoa</title>
</head>
<body>
    <h1>Thêm loài hoa mới</h1>
    <form action="add.php" method="post" enctype="multipart/form-data">
        <label for="name">Tên hoa:</label><br>
        <input type="text" name="name" required><br><br>
        
        <label for="description">Mô tả:</label><br>
        <textarea name="description" required></textarea><br><br>

        <label for="image">Hình ảnh:</label><br>
        <input type="file" name="image" required><br><br>

        <button type="submit">Thêm</button>
    </form>
    <a href="admin.php">Quay lại danh sách</a>
</body>
</html>

<?php
$conn->close();
?>
