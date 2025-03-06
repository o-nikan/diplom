document.addEventListener("DOMContentLoaded", function () {
    const popupBg = document.querySelector(".popup-bg-2"); // Фон
    const popup = document.querySelector(".popup-2"); // Само окно
    const openPopupButton = document.querySelector(".button-profil-2"); // Кнопка "Регистрация"

    // Открытие попапа
    openPopupButton.addEventListener("click", function (e) {
        e.preventDefault(); // Чтобы не срабатывала ссылка
        popupBg.style.display = "flex";
        document.body.style.overflow = "hidden"; // Блокируем прокрутку
    });

    // Закрытие по клику на фон
    popupBg.addEventListener("click", function (event) {
        if (event.target === popupBg) {
            closePopup();
        }
    });


    // Функция закрытия попапа
    function closePopup() {
        popupBg.style.display = "none";
        document.body.style.overflow = ""; // Разблокируем прокрутку
    }
});