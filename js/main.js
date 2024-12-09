const fromHero = document.querySelector(".from-hero");
const footerBtn = document.querySelector(".footer__btn");
const headerBtn = document.querySelector(".header__btn");

function triggerAnimation() {
  // Удаляем класс активного состояния
  fromHero.classList.remove("active");

  // Запускаем перерисовку для принудительного сброса анимации
  void fromHero.offsetWidth; // Принудительная перерисовка

  // Добавляем класс активного состояния снова для запуска анимации
  fromHero.classList.add("active");
}

// Обработчик для headerBtn без задержки
headerBtn.addEventListener("click", triggerAnimation);

// Обработчик для footerBtn с задержкой в 700 мс
footerBtn.addEventListener("click", function () {
  setTimeout(triggerAnimation, 600); // Задержка 700 мс
});

// checkbox

// Перебираем все радио-кнопки
document.querySelectorAll('.form__radio-input').forEach((radio) => {
  radio.addEventListener('click', function () {
    if (this.dataset.clicked === 'true') {
      // Если радио уже было выбрано, снимаем выбор
      this.checked = false;
      this.dataset.clicked = 'false';
    } else {
      // Если радио не выбрано, отмечаем его
      this.dataset.clicked = 'true';
      // Сбрасываем состояние у других радио
      document.querySelectorAll('.form__radio-input').forEach((otherRadio) => {
        if (otherRadio !== this) {
          otherRadio.dataset.clicked = 'false';
        }
      });
    }
  });
});
