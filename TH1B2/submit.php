<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = $conn->query("SELECT * FROM questions");

    $score = 0;
    $total = $result->num_rows;
    $number = 1;

    while ($row = $result->fetch_assoc()) {
        $userAnswer = isset($_POST["question{$number}"]) ? $_POST["question{$number}"] : '';
        if ($userAnswer === $row['correct_option']) {
            $score++;
        }
        $number++;
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kết quả</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container mt-5">
            <div class="alert alert-success text-center">
                <h4>Kết quả của bạn:</h4>
                <p>Bạn trả lời đúng <strong><?php echo $score; ?></strong> / <strong><?php echo $total; ?></strong> câu.</p>
            </div>
            <div class="text-center">
                <a href="index.php" class="btn btn-primary">Làm lại</a>
            </div>
        </div>
    </body>
    </html>
    <?php
}
?>
