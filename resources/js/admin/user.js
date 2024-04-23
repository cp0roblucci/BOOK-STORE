import constants from "../constants";

const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const overlayDelete = $('.overlay-delete');
const modalDeleteUser = $('.modal-delete-user');
const cancelDeleteUser = $('.cancel-delete-user');
let userId;
const listBtnDeleteUser = $$('.delete-user');

const idUser= document.getElementById('idUser');

if (listBtnDeleteUser) {
  listBtnDeleteUser.forEach(btnDeleteCategorybook => {
    btnDeleteCategorybook.addEventListener('click', function () {
      const userId = btnDeleteCategorybook.dataset.id;

      if (idUser) {
        idUser.value = userId;
      }
      
      overlayDelete.classList.remove('hidden');
      modalDeleteUser.classList.remove('hidden');
      
      console.log(idUser.value);
    })
  });
}

if(overlayDelete) {
  overlayDelete.addEventListener('click', function() {
    overlayDelete.classList.add('hidden');
    modalDeleteUser.classList.add('hidden');
  })
}

if(cancelDeleteUser) {
  cancelDeleteUser.addEventListener('click', function() {
    overlayDelete.classList.add('hidden');
    modalDeleteUser.classList.add('hidden');
  })
}

// function fetchDeleteUser(endPointUrl, userId) {
//   const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
//   const data = {
//     user_id: userId,
//   };
//   const options = {
//     method: 'POST',
//     headers: {
//       'Content-Type': 'application/json',
//       'X-CSRF-TOKEN': token,
//     },
//     body: JSON.stringify(data)
//   }
//   return fetch(endPointUrl, options)
// }

// function deleteUserById(userId) {
//   fetchDeleteUser(constants.URL_DELETE_USER, userId)
//     .then(response => response.json())
//     .then(data => {
//       console.log(data);
//       localStorage.setItem('userId', data.id);
//       localStorage.setItem('url', data.url);
//       window.location.href = data.url;
//     })
//     .catch(error => {
//       console.log(error);
//     })
// }
// let isRollBackDeleteUser = false;
// const btnRollBack = document.getElementById('btn-rollback');
// if (btnRollBack) {
//   btnRollBack.addEventListener('click', () => {
//     isRollBackDeleteUser = true;
//     const userId = localStorage.getItem('userId');
//     fetchDeleteUser(constants.URL_ROLL_BACK_DELETE_USER, userId)
//       .then(response => response.json())
//       .then(data => {
//         localStorage.removeItem('userId');
//         localStorage.removeItem('url');
//         window.location.href = data.url;
//       })
//       .catch(error => {
//         console.log(error);
//       })
//   });
// }

// setTimeout(() => {
//   if (!isRollBackDeleteUser) {
//     const userId = localStorage.getItem('userId');
//     if (userId != null) {
//       fetchDeleteUser(constants.URL_COMMIT_DELETE_USER, userId)
//         .then(response => response.json())
//         .then(data => {
//           console.log(data);
//           localStorage.removeItem('userId');
//           localStorage.removeItem('url');
//           // window.location.href = data.url;
//         })
//         .catch(error => {
//           console.log(error);
//         })
//     }
//   }
// }, 5000);


















