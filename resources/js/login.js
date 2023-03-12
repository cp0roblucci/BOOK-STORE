const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

// show, hidden password login

const passLogin = document.getElementById('passLogin');
const iconShowPassLogin = document.getElementById('iconShowPassLogin');
const iconHidePassLogin = document.getElementById('iconHidePassLogin');


iconHidePassLogin.addEventListener('click', function() {
  passLogin.setAttribute('type', 'text');
  iconShowPassLogin.classList.remove('hidden');
  iconHidePassLogin.classList.add('hidden');
});

iconShowPassLogin.addEventListener('click', function() {
  passLogin.setAttribute('type', 'password');
  iconShowPassLogin.classList.add('hidden');
  iconHidePassLogin.classList.remove('hidden');
});

// register
const passRegister = document.getElementById('passRegister');
const iconShowPassRegister = document.getElementById('iconShowPassRegister');
const iconHidePassRegister = document.getElementById('iconHidePassRegister');


iconHidePassRegister.addEventListener('click', function() {
  passRegister.setAttribute('type', 'text');
  iconShowPassRegister.classList.remove('hidden');
  iconHidePassRegister.classList.add('hidden');
});

iconShowPassRegister.addEventListener('click', function() {
  passRegister.setAttribute('type', 'password');
  iconShowPassRegister.classList.add('hidden');
  iconHidePassRegister.classList.remove('hidden');
});


 // confirm pass register
const passConfirmRegister = document.getElementById('confirmPassRegister');
const iconShowConfirmPass = document.getElementById('iconShowConfirmPass');
const iconHideConfirmPass = document.getElementById('iconHideConfirmPass');


iconHideConfirmPass.addEventListener('click', function() {
  passConfirmRegister.setAttribute('type', 'text');
  iconShowConfirmPass.classList.remove('hidden');
  iconHideConfirmPass.classList.add('hidden');
});

iconShowConfirmPass.addEventListener('click', function() {
  passConfirmRegister.setAttribute('type', 'password');
  iconShowConfirmPass.classList.add('hidden');
  iconHideConfirmPass.classList.remove('hidden');
});


// image

const signUp = document.getElementById('signUp');
const signIn = document.getElementById('signIn');
const imgLogin1 = document.getElementById('imageLogin1');
const imgLogin2 = document.getElementById('imageLogin2');
const formLogin = document.getElementById('formLogin');
const formRegister = document.getElementById('formRegister');


signUp.addEventListener('click', function() {
  imgLogin1.classList.add('translate-x-2');
  imgLogin1.classList.remove('translate-x-[96%]');

  imgLogin1.classList.add('animate-fadeOut');
  imgLogin1.classList.remove('animate-fadeIn');

  imgLogin2.classList.add('z-10');

  imgLogin2.classList.add('translate-x-2');
  imgLogin2.classList.remove('translate-x-[96%]');

  imgLogin2.classList.add('animate-fadeIn');
  imgLogin2.classList.remove('animate-fadeOut');


  formLogin.classList.add('animate-fadeOut');
  formRegister.classList.add('animate-fadeIn');

  formLogin.classList.remove('animate-fadeIn');
  formRegister.classList.remove('animate-fadeOut');
});

signIn.addEventListener('click', function() {
  imgLogin2.classList.remove('translate-x-2');
  imgLogin2.classList.add('translate-x-[96%]');
  imgLogin2.classList.add('animate-fadeOut');
  imgLogin2.classList.remove('animate-fadeIn');

  imgLogin1.classList.remove('translate-x-2');
  imgLogin1.classList.add('translate-x-[96%]');
  imgLogin1.classList.add('animate-fadeIn');
  imgLogin1.classList.remove('animate-fadeOut');


  imgLogin2.classList.remove('z-10');


  formLogin.classList.add('animate-fadeIn');
  formRegister.classList.add('animate-fadeOut');

  formLogin.classList.remove('animate-fadeOut');
  formRegister.classList.remove('animate-fadeIn');
});

