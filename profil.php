<?php
session_start();
require "bd.php"; // Подключаем базу данных

// Проверяем, вошел ли пользователь
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

// Получаем данные пользователя
$stmt = $conn->prepare("SELECT name, email, telefon, avatar FROM users WHERE id = ?");
$stmt->bind_param("i", $_SESSION["user_id"]);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css-scss/scss-profil.css?v=<?php echo time(); ?>">
    <title>Профиль</title>
</head>
<body>
    <div class="fon">
    <header class="header">
            <div class="contener">
                <div class="menu">
                    <div>
                        <img src="./assets/css-scss/img/image-logo.svg" alt="#">
                    </div>
                    <div class="header-spisok">
                        <ul>
                            <li>
                                <a href="./glav.php">Главная</a>
                            </li>
                            <li>
                                <a href="./uslugi.php">Услуги, акции, турниры</a>
                            </li>
                            <li>
                                <a href="./igra.php">Игры</a>
                            </li>
                            <li>
                                <a href="./novosti.php">Новости и события</a>
                            </li>
                            <li>
                                <a href="./kontakt.php">Контакты</a>
                            </li> 
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <section class="avatar-box">
            <div>
            <div class="avatar">
                <?php if (!empty($user["avatar"])): ?>
                    <img src="./uploads/<?php echo htmlspecialchars($user["avatar"]); ?>?v=<?php echo time(); ?>" alt="Аватар">
                <?php else: ?>
                    <img src="uploads/acyckbqaaaaaag4wqvhcs2wecy.png" alt="Аватар">
                <?php endif; ?>
            </div>
            <form id="uploadForm" enctype="multipart/form-data" class="avatar-file">
                <label class="file-label" for="fileInput">Аватарка</label>
                <input type="file" name="avatar" accept="image/*" id="fileInput" class="file-input">
                <div id="status"></div>
            </form>
            </div>
            <div class="profile">
                <p class="profil-text">ФИО: <?php echo htmlspecialchars($user["name"]); ?></p>
                <p class="profil-text">Почта: <?php echo htmlspecialchars($user["email"]); ?></p>
                <p class="profil-text">Телефон: <?php echo htmlspecialchars($user["telefon"]); ?></p>
            </div>
        </section>
    </div>
</body>
<script src="./assets/js/load.js"></script>
</html>

<?php
$stmt->close();
$conn->close();
?>