<?php
session_start();
require "bd.php"; // Подключение к базе

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["avatar"])) {
    $uploadDir = "uploads/";  // Папка для загрузки файлов
    $fileName = basename($_FILES["avatar"]["name"]);  // Имя файла
    $filePath = $uploadDir . $fileName;  // Полный путь к файлу

    // Проверяем, является ли файл изображением
    $fileType = mime_content_type($_FILES["avatar"]["tmp_name"]);
    if (strpos($fileType, "image") === false) {
        die("Ошибка: Файл должен быть изображением.");
    }

    // Проверка на ошибки при загрузке файла
    if ($_FILES["avatar"]["error"] != UPLOAD_ERR_OK) {
        die("Ошибка загрузки файла: " . $_FILES["avatar"]["error"]);
    }

    // Перемещаем файл
    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $filePath)) {
        $userId = $_SESSION["user_id"];
        
        // Обновляем аватар в базе данных
        $stmt = $conn->prepare("UPDATE users SET avatar = ? WHERE id = ?");
        $stmt->bind_param("si", $fileName, $userId);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        echo "success"; // Ответ для AJAX
        exit();
    } else {
        die("Ошибка загрузки файла.");
    }
}
?>