const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);


const emailLogin = document.getElementById('email-login');
const passwordLogin = document.getElementById('password-login');


const firstName = document.getElementById('first-name');
const lastName = document.getElementById('last-name');
const emailRegister = document.getElementById('email-register');
const passwordRegister = document.getElementById('password-register');
const confirmpasswordRegister = document.getElementById('confirm-password-register');

// message error
//login
const messageEmailLogin = document.getElementById('message-email-login');
const messagePasswordLogin = document.getElementById('message-password-login');
//register
const messageFirstName = document.getElementById('message-firstname');
const messageLastName = document.getElementById('message-lastname');
const messageEmailRegister = document.getElementById('message-email-register');
const messagePasswordRegister = document.getElementById('message-password-register');
const messageConfirmPassword = document.getElementById('message-confirm-password');



// btnsignin & signup
const btnSiginUp = document.getElementById('sign-up');
const btnSiginIn = document.getElementById('sign-in');

// show, hidden password login

const iconShowPassLogin = document.getElementById('iconShowPassLogin');
const iconHidePassLogin = document.getElementById('iconHidePassLogin');


if(iconHidePassLogin) {
  iconHidePassLogin.addEventListener('click', function() {
    passwordLogin.setAttribute('type', 'text');
    iconShowPassLogin.classList.remove('hidden');
    iconHidePassLogin.classList.add('hidden');
  });

}
if(iconShowPassLogin) {
  iconShowPassLogin.addEventListener('click', function() {
    passwordLogin.setAttribute('type', 'password');
    iconShowPassLogin.classList.add('hidden');
    iconHidePassLogin.classList.remove('hidden');
  });
}

// register
const iconShowPassRegister = document.getElementById('iconShowPassRegister');
const iconHidePassRegister = document.getElementById('iconHidePassRegister');


if(iconHidePassRegister) {
  iconHidePassRegister.addEventListener('click', function() {
    passwordRegister.setAttribute('type', 'text');
    iconShowPassRegister.classList.remove('hidden');
    iconHidePassRegister.classList.add('hidden');
  });
}

if(iconShowPassRegister) {
  iconShowPassRegister.addEventListener('click', function() {
    passwordRegister.setAttribute('type', 'password');
    iconShowPassRegister.classList.add('hidden');
    iconHidePassRegister.classList.remove('hidden');
  });
}


 // confirm pass register
const iconShowConfirmPass = document.getElementById('iconShowConfirmPass');
const iconHideConfirmPass = document.getElementById('iconHideConfirmPass');


if(iconHideConfirmPass) {
  iconHideConfirmPass.addEventListener('click', function() {
    confirmpasswordRegister.setAttribute('type', 'text');
    iconShowConfirmPass.classList.remove('hidden');
    iconHideConfirmPass.classList.add('hidden');
  });

}
if(iconShowConfirmPass) {
  iconShowConfirmPass.addEventListener('click', function() {
    confirmpasswordRegister.setAttribute('type', 'password');
    iconShowConfirmPass.classList.add('hidden');
    iconHideConfirmPass.classList.remove('hidden');
  });
}



// hidden message error

// login

if(emailLogin) {
  emailLogin.addEventListener('input', function() {
      emailLogin.classList.remove('border-red-500');
      emailLogin.classList.add('focus-within:border-blue-500');
      messageEmailLogin.classList.add('hidden');
  });
}

if(passwordLogin) {
  passwordLogin.addEventListener('input', function() {
    passwordLogin.classList.remove('border-red-500');
    passwordLogin.classList.add('focus-within:border-blue-500');
    messagePasswordLogin.classList.add('hidden');
  });

}

//register

if(firstName) {
  firstName.addEventListener('input', function() {
    firstName.classList.remove('border-red-500');
    firstName.classList.add('focus-within:border-purple-500');
    messageFirstName.classList.add('hidden');
  });
}

if(lastName) {
  lastName.addEventListener('input', function() {
    lastName.classList.remove('border-red-500');
    lastName.classList.add('focus-within:border-purple-500');
    messageLastName.classList.add('hidden');
  });
}


if(emailRegister) {
  emailRegister.addEventListener('input', function() {
    emailRegister.classList.remove('border-red-500');
    emailRegister.classList.add('focus-within:border-purple-500');
    messageEmailRegister.classList.add('hidden');
  });
}


if(passwordRegister) {
  passwordRegister.addEventListener('input', function() {
    passwordRegister.classList.remove('border-red-500');
    passwordRegister.classList.add('focus-within:border-purple-500');
    messagePasswordRegister.classList.add('hidden');
  });
}

if(confirmpasswordRegister) {
  confirmpasswordRegister.addEventListener('input', function() {
    confirmpasswordRegister.classList.remove('border-red-500');
    confirmpasswordRegister.classList.add('focus-within:border-purple-500');
    messageConfirmPassword.classList.add('hidden');
  });

}



