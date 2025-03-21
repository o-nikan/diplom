const slider = document.querySelector('.slider');
let isDown = false;
let startX;
let scrollLeft;

window.addEventListener("load", () => {
slider.scrollLeft = (slider.scrollWidth - slider.clientWidth) / 2;
});

slider.addEventListener('mousedown', (e) => {
    isDown = true;
    slider.classList.add('active');
    startX = e.pageX - slider.offsetLeft;
    scrollLeft = slider.scrollLeft;
});

slider.addEventListener('mouseleave', () => {
    isDown = false;
    slider.classList.remove('active');
});

slider.addEventListener('mouseup', () => {
    isDown = false;
    slider.classList.remove('active');
});

slider.addEventListener('mousemove', (e) => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - slider.offsetLeft;
    const walk = (x - startX) * 1; // Скорость прокрутки
    slider.scrollLeft = scrollLeft - walk;
});