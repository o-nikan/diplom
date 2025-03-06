<?php
session_start();
require "bd.php"; // Подключаем базу данных

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    // Проверяем, заполнены ли поля
    if (empty($email) || empty($password)) {
        die("Ошибка: Все поля должны быть заполнены!");
    }

    // Проверяем, существует ли пользователь и его статус админа
    $stmt = $conn->prepare("SELECT id, password, admin FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Проверяем пароль
        if (password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["is_admin"] = $user["admin"]; // Сохраняем статус админа в сессию

            // Перенаправление в зависимости от роли
            if ($user["admin"] == 1) {
                header("Location: admin.php"); // Страница для админов
            } else {
                header("Location: profil.php"); // Личный кабинет обычного пользователя
            }
            exit();
        } else {
            die("Ошибка: Неверный пароль!");
        }
    } else {
        die("Ошибка: Пользователь не найден!");
    }

    $stmt->close();
    $conn->close();
}
?>