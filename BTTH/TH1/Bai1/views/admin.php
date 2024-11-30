<?php
include '../config/db.php';

$sql = "SELECT * FROM flowers";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý loài hoa</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header class="header">
        <h1>Quản lý loài hoa</h1>
    </header>

    <div class="flowers-list">
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="flower-card">
                <img src="../images/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>" class="flower-image">
                <h3><?php echo $row['name']; ?></h3>
                <p><?php echo $row['description']; ?></p>
                <a href="edit.php?id=<?php echo $row['id']; ?>">Sửa</a> | 
                <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
            </div>
        <?php endwhile; ?>
    </div>

    <a href="add.php">Thêm loài hoa mới</a>

</body>
</html>

<?php
$conn->close();
?>
