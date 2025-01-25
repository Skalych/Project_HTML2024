<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $year = $_POST['year'];
    $rating = $_POST['rating'];

    if (empty($title) || empty($genre) || empty($year) || empty($rating)) {
        echo "done!";
    } else {
        $sql = "INSERT INTO games (title, genre, year, rating) VALUES ('$title', $genre, $year, $rating)";

        if ($conn->query($sql) === TRUE) {
            echo "succes!";
        } else {
            echo "error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
