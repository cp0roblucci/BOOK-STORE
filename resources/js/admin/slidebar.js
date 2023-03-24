const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);


const btnSlideBar = $$('.btn__slidebar');
const iconBtnSlideBar = $$('.icon__btn--slidebar');
const menuSlideBar = $$('.menu__slidebar');

if(btnSlideBar) {
  for(let i = 0; i < btnSlideBar.length; i++) {
    btnSlideBar[i].addEventListener('click', function() {
      menuSlideBar[i].classList.toggle('max-h-screen');
      iconBtnSlideBar[i].classList.toggle('rotate-90');
      iconBtnSlideBar[i].classList.toggle('text-white');
      if (i % 2 == 0) {
        iconBtnSlideBar[i].classList.toggle('bg-purple-500');
      } else {
        iconBtnSlideBar[i].classList.toggle('bg-blue-100');
      }
    });
  }
}


const btnSlideBar2 = $$('.btn__slidebar2');
const iconBtnSlideBar2 = $$('.icon__btn--slidebar2');
const menuSlideBar2 = $$('.menu__slidebar2');


if(btnSlideBar2) {
  for(let i = 0; i < btnSlideBar2.length; i++) {
    btnSlideBar2[i].addEventListener('click', function() {
      // menuSlideBar.classList.toggle('hidden');
      menuSlideBar2[i].classList.toggle('max-h-screen');
      iconBtnSlideBar2[i].classList.toggle('rotate-90');
      iconBtnSlideBar2[i].classList.toggle('text-white');
      // btnSlideBar[i].classList.toggle('hover:bg-blue-100');
      iconBtnSlideBar2[i].classList.toggle('bg-blue-100');
      // menuSlideBar.classList.remove('overflow-hidden');
    });
  }
}