
// header dropdown
const $ = document.querySelector.bind(document);
const $$ = document.querySelector.bind(document);

const iconDropdown = document.querySelector('.icon-dropdown');
const menuDropdown = document.querySelector('.menu-dropdown');

iconDropdown.addEventListener('click', function () {
  menuDropdown.classList.toggle('hidden');
});


// button change password

const btnChangePassword = $('.btn-change-password');
const formChangePassword = $('.form-change-password');

btnChangePassword.addEventListener('click', function () {
  formChangePassword.classList.toggle('hidden');
});
