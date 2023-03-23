const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);


const btnSlideBar = $$('.btn__slidebar');
const iconBtnSlideBar = $$('.icon__btn--slidebar');
const menuSlideBar = $$('.menu__slidebar');

console.log(btnSlideBar);
console.log(menuSlideBar);

console.log(btnSlideBar);

if(btnSlideBar) {
  for(let i = 0; i < btnSlideBar.length; i++) {
    btnSlideBar[i].addEventListener('click', function() {
      // menuSlideBar.classList.toggle('hidden');
      menuSlideBar[i].classList.toggle('max-h-screen');
      iconBtnSlideBar[i].classList.toggle('rotate-90');
      iconBtnSlideBar[i].classList.toggle('text-white');
      // btnSlideBar[i].classList.toggle('hover:bg-blue-100');
      if (i % 2 == 0) {
        iconBtnSlideBar[i].classList.toggle('bg-purple-500');
      } else {
        iconBtnSlideBar[i].classList.toggle('bg-blue-100');
      }
      // menuSlideBar.classList.remove('overflow-hidden');
    });
  }
}