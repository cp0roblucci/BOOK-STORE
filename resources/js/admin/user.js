import constants from "../constants";

const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const overlayDeleteUser = $('.overlay-delete');
const modalDeleteUser = $('.modal-delete-user');
const cancelDeleteUser = $('.cancel-delete-user');

const listBtnDeleteUser = $$('.delete-user');

const btnDeleteUser = document.getElementById('btn-delete-user');

let userId;
if(listBtnDeleteUser) {
  listBtnDeleteUser.forEach(btnDeleteUser => {
    btnDeleteUser.addEventListener('click', function () {
      overlayDeleteUser.classList.remove('hidden');
      modalDeleteUser.classList.remove('hidden');
      userId = btnDeleteUser.dataset.id;
    });
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

btnDeleteUser.addEventListener('click', () => {
  deleteUserById(userId);
  overlayDeleteUser.classList.add('hidden');
  modalDeleteUser.classList.add('hidden');
});

function fetchDeleteUser(endPointUrl, userId) {
  const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  const data = {
    user_id: userId,
  };
  const options = {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': token,
    },
    body: JSON.stringify(data)
  }
  return fetch(endPointUrl, options)
}

function deleteUserById(userId) {
  fetchDeleteUser(constants.URL_DELETE_USER, userId)
    .then(response => response.json())
    .then(data => {
      console.log(data);
      localStorage.setItem('userId', data.id);
      localStorage.setItem('url', data.url);
      window.location.href = data.url;
    })
    .catch(error => {
      console.log(error);
    })
}
let isRollBackDeleteUser = false;
const btnRollBack = document.getElementById('btn-rollback');
if (btnRollBack) {
  btnRollBack.addEventListener('click', () => {
    isRollBackDeleteUser = true;
    const userId = localStorage.getItem('userId');
    fetchDeleteUser(constants.URL_ROLL_BACK_DELETE_USER, userId)
      .then(response => response.json())
      .then(data => {
        localStorage.removeItem('userId');
        localStorage.removeItem('url');
        window.location.href = data.url;
      })
      .catch(error => {
        console.log(error);
      })
  });
}

setTimeout(() => {
  if (!isRollBackDeleteUser) {
    const userId = localStorage.getItem('userId');
    if (userId != null) {
      fetchDeleteUser(constants.URL_COMMIT_DELETE_USER, userId)
        .then(response => response.json())
        .then(data => {
          console.log(data);
          localStorage.removeItem('userId');
          localStorage.removeItem('url');
          window.location.href = data.url;
        })
        .catch(error => {
          console.log(error);
        })
    }
  }
}, 5000);


















