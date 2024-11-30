<?php
include 'database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài thi trắc nghiệm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Bài thi trắc nghiệm</h1>
        <form action="submit.php" method="POST">
            <?php
            $result = $conn->query("SELECT * FROM questions");
            if ($result->num_rows > 0) {
                $number = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='card mb-4'>";
                    echo "<div class='card-header'><strong>Câu {$number}: {$row['question']}</strong></div>";
                    echo "<div class='card-body'>";
                    foreach (['A', 'B', 'C', 'D'] as $option) {
                        $option_text = $row["option_" . strtolower($option)];
                        echo "<div class='form-check'>";
                        echo "<input class='form-check-input' type='radio' name='question{$number}' value='{$option}' id='question{$number}{$option}'>";
                        echo "<label class='form-check-label' for='question{$number}{$option}'>{$option}. {$option_text}</label>";
                        echo "</div>";
                    }
                    echo "</div>";
                    echo "</div>";
                    $number++;
                }
            } else {
                echo "<p>Không có câu hỏi nào trong cơ sở dữ liệu.</p>";
            }
            ?>
            <button type="submit" class="btn btn-primary">Nộp bài</button>
        </form>
    </div>
</body>
</html>
