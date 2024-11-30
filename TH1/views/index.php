<?php
include '../config/db.php';

$sql = "SELECT * FROM flowers";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách loài hoa</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header class="header">
        <h1>Danh sách loài hoa</h1>
    </header>

    <div class="flowers-list">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="flower-card" id="flower-<?php echo $row['id']; ?>">
                <img src="../images/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>" class="flower-image">
                <div class="flower-info">
                    <h3><?php echo $row['name']; ?></h3>
                    <p><?php echo $row['description']; ?></p>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

</body>
</html>
