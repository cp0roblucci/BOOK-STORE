const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);



const overlayDelete = $('.overlay-delete');

// categorybook
const modalDeleteCategorybook = $('.modal-delete-categorybook');
const cancelDeleteCategorybook = $('.cancel-delete-categorybook');
const listBtnDeleteCategorybook = $$('.delete-categorybook');
const idCategorybook = document.getElementById('idCategorybook');

if (listBtnDeleteCategorybook) {
  listBtnDeleteCategorybook.forEach(btnDeleteCategorybook => {
    btnDeleteCategorybook.addEventListener('click', function () {
      const categorybookId = btnDeleteCategorybook.dataset.id;

      if (idCategorybook) {
        idCategorybook.value = categorybookId;
      }
      
      overlayDelete.classList.remove('hidden');
      modalDeleteCategorybook.classList.remove('hidden');
      
      console.log(idCategorybook.value);
    })
  });
}

if(overlayDelete) {
  overlayDelete.addEventListener('click', function() {
    overlayDelete.classList.add('hidden');
    modalDeleteCategorybook.classList.add('hidden');
  })
}

if(cancelDeleteCategorybook) {
  cancelDeleteCategorybook.addEventListener('click', function() {
    overlayDelete.classList.add('hidden');
    modalDeleteCategorybook.classList.add('hidden');
  })
}
//nxb
const modalDeleteNXB = $('.modal-delete-nxb');
const cancelDeleteNXB = $('.cancel-delete-nxb');
const listBtnDeleteNXB = $$('.delete-nxb');
const idNXB = document.getElementById('idNXB');

if (listBtnDeleteNXB) {
  listBtnDeleteNXB.forEach(btnDeletenxb => {
    btnDeletenxb.addEventListener('click', function () {
      const nxbId = btnDeletenxb.dataset.id;

      if (idNXB) {
        idNXB.value = nxbId;
      }
      
      overlayDelete.classList.remove('hidden');
      modalDeleteNXB.classList.remove('hidden');
      
      console.log(idCategorybook.value);
    })
  });
}

if(overlayDelete) {
  overlayDelete.addEventListener('click', function() {
    overlayDelete.classList.add('hidden');
    modalDeleteNXB.classList.add('hidden');
  })
}

if(cancelDeleteNXB) {
  cancelDeleteNXB.addEventListener('click', function() {
    overlayDelete.classList.add('hidden');
    modalDeleteNXB.classList.add('hidden');
  })
}
// supplier 
const modalDeleteSupplier = $('.modal-delete-supplier');
const cancelDeleteSupplier = $('.cancel-delete-supplier');
const listBtnDeleteSupplier = $$('.delete-supplier');
const idSupplier= document.getElementById('idSupplier');

if (listBtnDeleteSupplier) {
  listBtnDeleteSupplier.forEach(btnDeletesupplier => {
    btnDeletesupplier.addEventListener('click', function () {
      const supplierId = btnDeletesupplier.dataset.id;

      if (idSupplier) {
        idSupplier.value = supplierId;
      }
      
      overlayDelete.classList.remove('hidden');
      modalDeleteSupplier.classList.remove('hidden');
      
      console.log(idSupplier.value);
    })
  });
}

if(overlayDelete) {
  overlayDelete.addEventListener('click', function() {
    overlayDelete.classList.add('hidden');
    modalDeleteSupplier.classList.add('hidden');
  })
}

if(cancelDeleteSupplier) {
  cancelDeleteSupplier.addEventListener('click', function() {
    overlayDelete.classList.add('hidden');
    modalDeleteSupplier.classList.add('hidden');
  })
}
//book
const modalDeleteBook = $('.modal-delete-book');
const cancelDeleteBook  = $('.cancel-delete-book');
const listBtnDeleteBook = $$('.delete-book');
const idBook = document.getElementById('idBook');

if (listBtnDeleteBook) {
  listBtnDeleteBook.forEach(btnDeletesupplier => {
    btnDeletesupplier.addEventListener('click', function () {
      const bookId = btnDeletesupplier.dataset.id;

      if (idBook) {
        idBook.value = bookId;
      }
      
      overlayDelete.classList.remove('hidden');
      modalDeleteBook.classList.remove('hidden');
      
      console.log(idBook.value);
    })
  });
}

if(overlayDelete) {
  overlayDelete.addEventListener('click', function() {
    overlayDelete.classList.add('hidden');
    modalDeleteBook.classList.add('hidden');
  })
}

if(cancelDeleteBook) {
  cancelDeleteBook.addEventListener('click', function() {
    overlayDelete.classList.add('hidden');
    modalDeleteBook.classList.add('hidden');
  })
}
//importwarehouse
const modalDeleteImportwarehouse= $('.modal-delete-importwarehouse');
const cancelDeleteImportwarehouse = $('.cancel-delete-importwarehouse');
const listBtnDeleteImportwarehouse = $$('.delete-importwarehouse');
const idImportwarehouse = document.getElementById('idImportwarehouse');

if (listBtnDeleteImportwarehouse) {
  listBtnDeleteImportwarehouse.forEach(btnDeletePortfolio => {
    btnDeletePortfolio.addEventListener('click', function () {
      const importwarehouseId = btnDeletePortfolio.dataset.id;

      if (idImportwarehouse) {
        idImportwarehouse.value = importwarehouseId;
      }
      
      overlayDelete.classList.remove('hidden');
      modalDeleteImportwarehouse.classList.remove('hidden');
      
      console.log(idImportwarehouse.value);
    })
  });
}

if(overlayDelete) {
  overlayDelete.addEventListener('click', function() {
    overlayDelete.classList.add('hidden');
    modalDeleteImportwarehouse.classList.add('hidden');
  })
}

if(cancelDeleteImportwarehouse) {
  cancelDeleteImportwarehouse.addEventListener('click', function() {
    overlayDelete.classList.add('hidden');
    modalDeleteImportwarehouse.classList.add('hidden');
  })
}

