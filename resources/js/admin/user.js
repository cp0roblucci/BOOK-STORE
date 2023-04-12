const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);



const overlayDeleteUser = $('.overlay-delete-user');
const modalDeleteUser = $('.modal-delete-user');
const cancelDeleteUser = $('.cancel-delete-user');

const listBtnDeleteUser = $$('.delete-user');

const idUser = document.getElementById('idUser');

console.log(idUser);

if(listBtnDeleteUser) {
  listBtnDeleteUser.forEach(btnDeleteUser => {
    btnDeleteUser.addEventListener('click', function() {
      overlayDeleteUser.classList.remove('hidden');
      modalDeleteUser.classList.remove('hidden');
      const userId = btnDeleteUser.dataset.id;

      if(idUser) {
        idUser.value = userId;
      }
      console.log(idUser.value);
    })
  });
}

if(overlayDeleteUser) {
  overlayDeleteUser.addEventListener('click', function() {
    overlayDeleteUser.classList.add('hidden');
    modalDeleteUser.classList.add('hidden');
  })
}

if(cancelDeleteUser) {
  cancelDeleteUser.addEventListener('click', function() {
    overlayDeleteUser.classList.add('hidden');
    modalDeleteUser.classList.add('hidden');
  })
}