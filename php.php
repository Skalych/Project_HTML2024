<?php
// Налаштування підключення до бази даних
$servername = "localhost";
$username = "root";  // ваш логін для доступу до БД
$password = "";  // ваш пароль для доступу до БД
$dbname = "db";  // назва вашої бази даних

// Створення з'єднання
$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка з'єднання
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Перевірка, чи було відправлено форму
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Отримуємо значення з форми
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $year = $_POST['year'];
    $rating = $_POST['rating'];

    // Перевірка, чи всі поля заповнені
    if (empty($title) || empty($genre) || empty($year) || empty($rating)) {
        echo "Всі поля повинні бути заповнені!";
    } else {
        // Підготовка SQL-запиту для вставки даних в таблицю games
        $sql = "INSERT INTO games (title, genre, year, rating) VALUES ('$title', $genre, $year, $rating)";

        // Виконання запиту
        if ($conn->query($sql) === TRUE) {
            echo "Гра успішно додана!";
        } else {
            echo "Помилка: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Закриваємо з'єднання
$conn->close();
?>
