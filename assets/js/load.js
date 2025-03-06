document.getElementById("fileInput").addEventListener("change", function () {
    let file = this.files[0];
    if (!file) return;

    let formData = new FormData();
    formData.append("avatar", file);

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "uploads.php", true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            document.getElementById("status").innerHTML = "✅ Файл загружен!";
            location.reload(); // Перезагрузка страницы для обновления аватара
        } else {
            document.getElementById("status").innerHTML = "❌ Ошибка загрузки.";
        }
    };

    xhr.onerror = function () {
        document.getElementById("status").innerHTML = "❌ Ошибка соединения.";
    };

    document.getElementById("status").innerHTML = "⏳ Загружается...";
    xhr.send(formData);
});