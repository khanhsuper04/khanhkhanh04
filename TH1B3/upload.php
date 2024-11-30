<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['csv_file'])) {
    $conn = new mysqli('localhost', 'root', '', 'student_db');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $fileTmpName = $_FILES['csv_file']['tmp_name'];

    if (($handle = fopen($fileTmpName, 'r')) !== FALSE) {
        fgetcsv($handle, 1000, ",");

        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $username = $data[0];
            $password = $data[1];
            $first_name = $data[2];
            $last_name = $data[3];
            $city = $data[4];
            $email = $data[5];
            $course1 = $data[6];

            $sql = "INSERT INTO students (username, password, first_name, last_name, city, email, course1)
                    VALUES ('$username', '$password', '$first_name', '$last_name', '$city', '$email', '$course1')";

            if ($conn->query($sql) === FALSE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        fclose($handle);
    }

    $conn->close();

    header("Location: index.php");
    exit();
}
?>
