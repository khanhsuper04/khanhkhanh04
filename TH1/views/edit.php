<?php
include '../config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM flowers WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];

    if ($image) {
        $image_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($image_tmp, "images/" . $image);
        $sql = "UPDATE flowers SET name='$name', description='$description', image='$image' WHERE id=$id";
    } else {
        $sql = "UPDATE flowers SET name='$name', description='$description' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Cập nhật thành công!";
        header("Location: admin.php");
    } else {
        echo "Lỗi: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa loài hoa</title>
</head>
<body>
    <h1>Sửa thông tin loài hoa</h1>
    <form action="edit.php?id=<?php echo $row['id']; ?>" method="post" enctype="multipart/form-data">
        <label for="name">Tên hoa:</label><br>
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>
        
        <label for="description">Mô tả:</label><br>
        <textarea name="description" required><?php echo $row['description']; ?></textarea><br><br>

        <label for="image">Hình ảnh:</label><br>
        <input type="file" name="image"><br><br>

        <button type="submit">Cập nhật</button>
    </form>
    <a href="index.php">Quay lại danh sách</a>
</body>
</html>

<?php
$conn->close();
?>
