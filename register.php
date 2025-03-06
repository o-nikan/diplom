<?php
session_start();
require "bd.php"; // Подключаем БД

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $telefon = trim($_POST["telefon"]);
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    $admin = 0; // По умолчанию 0 (обычный пользователь)

    // Проверяем, заполнены ли поля
    if (empty($name) || empty($email) || empty($telefon) || empty($password) || empty($password2)) {
        die("Ошибка: Все поля должны быть заполнены!");
    }

    // Проверяем, совпадают ли пароли
    if ($password !== $password2) {
        die("Ошибка: Пароли не совпадают!");
    }

    // Хешируем пароль
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // SQL-запрос для вставки данных 
    $stmt = $conn->prepare("INSERT INTO users (name, email, telefon, password, admin) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $name, $email, $telefon, $hashedPassword, $admin);

    if ($stmt->execute()) {
        // Запоминаем пользователя в сессии
        session_start();
        $_SESSION["user_id"] = $stmt->insert_id; // ID нового пользователя
        $_SESSION["user_name"] = $name;
        $_SESSION["is_admin"] = $admin;

        // Перенаправляем в профиль
        header("Location: profil.php");
        exit();
    } else {
        echo "Ошибка: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>