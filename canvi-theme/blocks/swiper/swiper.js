const swiper = new Swiper('.swiper', {
  
  slidesPerView: 1,
  slidesPerGroup: 1,
  breakpoints: {
    640: {
      slidesPerView: 3,
      slidesPerGroup: 3,
    },
    940: {
      slidesPerView: 5,
      slidesPerGroup: 5,
    }
  },
  loopFillGroupWithBlank: true,
  spaceBetween: 20,
  loop: true,
  /*autoplay: {
    delay: 3000,
  },*/

  pagination: {
    el: '.swiper-pagination',
  },

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});