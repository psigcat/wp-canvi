const swiper = new Swiper('.swiper', {
  slidesPerView: 1,
  slidesPerGroup: 1,
  breakpoints: {
    640: {
      slidesPerView: 3,
      slidesPerGroup: 3,
    },
    940: {
      slidesPerView: 4,
      slidesPerGroup: 4,
    }
  },
  loop: true, // Mantén el loop si quieres un carrusel infinito
  loopFillGroupWithBlank: false, // Evita que rellene slides vacías
  spaceBetween: 20,
  autoplay: {
    delay: 7000,
  },

  pagination: {
    el: '.swiper-pagination',
  },

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});
