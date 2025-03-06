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
                    <div class="profil">
                        <a class="button-profil-2" href="#">Войти</a>
                        <a class="button-profil" href="#">Регистрация</a>
                    </div>

                    <!-- Фон затемнения -->
                    <div class="popup-bg">
                        <div class="popup">
                            <img src="./assets/css-scss/img/image-logo.svg" alt="">
                            <h2>Регистрация</h2>
                            <form action="./register.php" method="POST" class="popup-box">
                                <div class="popup-box">
                                    <input type="text" name="name" placeholder="ФИО" required>
                                    <input type="email" name="email" placeholder="Почта" required>
                                    <input type="text" name="telefon" placeholder="Телефон" required>
                                    <input type="password" name="password" placeholder="Пароль" required>
                                    <input type="password" name="password2" placeholder="Повторите пароль" required>
                                </div>
                                <button class="popup-button" type="submit">Регистрация</button>
                            </form>
                        </div>
                    </div> 
                    <div class="popup-bg-2">
                        <div class="popup-2">
                            <img src="./assets/css-scss/img/image-logo.svg" alt="">
                            <h2>Авторизация</h2>
                            <form action="./login.php" method="POST" class="popup-box-2">
                                <div class="popup-box-2">
                                <input type="email" name="email" placeholder="Почта" required>
                                <input type="password" name="password" placeholder="Пароль" required>
                                </div>
                                <button class="popup-button-2" type="submit">Войти</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>