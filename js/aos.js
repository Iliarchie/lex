document.addEventListener("DOMContentLoaded", () => {
  AOS.init({
    duration: 1000, // Длительность анимации
    offset: 200, // Начинаем анимацию за 200px до попадания в зону видимости
    once: true, // Анимация срабатывает только один раз
    easing: 'ease', // Плавное изменение
  });
});