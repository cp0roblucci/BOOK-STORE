import constants from "../constants";

const checkAll = document.getElementById('checkAll');

const listOrder = document.querySelectorAll('.order-element');
const listCheckBox = document.querySelectorAll('.order-element input');

const listBtnCheckBox = document.querySelectorAll('.checkbox');

if (checkAll) {
  checkAll.addEventListener('change', () => {
      listCheckBox.forEach(element => {
        element.checked = checkAll.checked;
      })
  });
}


if (listBtnCheckBox)  {
  listBtnCheckBox.forEach(checkBox => {
    checkBox.addEventListener('click', (event) => {
      event.stopPropagation();
    });
  });
}

if (listOrder) {
  listOrder.forEach(order => {
    order.addEventListener('click', () => {
      const orderId = order.dataset.id;
      window.location.href = constants.URL_ADMIN_ORDERS + 'order-detail/' + orderId;
    });
  });
}


const confirmAll = document.getElementById('confirmAll');
const deleteAll = document.getElementById('deleteAll');

// kiem tra neu khong co input nao duoc check thi khong cho submit
function isCheck(listCheckBox) {
  let disAbleConfirmAll = false;
  listCheckBox.forEach(check => {
      if(check.checked) {
        disAbleConfirmAll = true;
        return disAbleConfirmAll;
    }
  });
  return disAbleConfirmAll;
}
function isCheckedAll(listCheckBox) {
  let disAbleCheckAll = true;
  for (let i = 0; i < listCheckBox.length; i++) {
    if(listCheckBox[i].checked === false) {
      disAbleCheckAll = false;
      checkAll.checked = false;
      return disAbleCheckAll;
    }
  }
  checkAll.checked = true;
  return disAbleCheckAll;
}

// khi check all thi cho phep submit
if (checkAll) {
  checkAll.addEventListener('change', () => {
    if(checkAll.checked) {
      if (confirmAll) {
        enableBtn(confirmAll);
      } else if (deleteAll) {
        enableBtn(deleteAll);
      }
    } else {
      if (confirmAll) {
        disAbleBtn(confirmAll);
      } else if(deleteAll) {
        disAbleBtn(deleteAll);
      }
    }
  });
}

// lap qua tat ca checkbox neu khong co cai nao check hti khong cho submit
listCheckBox.forEach(checkbox => {
  checkbox.addEventListener('change', () => {
    isCheckedAll(listCheckBox);
    if (isCheck(listCheckBox)) {
      if (confirmAll) {
        enableBtn(confirmAll);
      } else if (deleteAll) {
        enableBtn(deleteAll);
      }
    } else {
      if (confirmAll) {
        disAbleBtn(confirmAll);
      } else if(deleteAll) {
        disAbleBtn(deleteAll);
      }
    }
  });
});

function enableBtn(btnElement) {
  btnElement.classList.remove('pointer-events-none');
  btnElement.classList.add('text-primary-purple');
  btnElement.classList.add('border-primary-purple');
  btnElement.classList.remove('text-slate-500');
  btnElement.classList.remove('opacity-50');
  btnElement.classList.remove('border-slate-500');
}

function disAbleBtn(btnElement) {
  btnElement.classList.add('pointer-events-none');
  btnElement.classList.add('text-slate-500');
  btnElement.classList.add('border-slate-500');
  btnElement.classList.add('opacity-50');
  btnElement.classList.remove('text-primary-purple');
  btnElement.classList.remove('border-primary-purple');
}

function getDataOrderIds() {
  const orderIds = [];
  listCheckBox.forEach(checkbox => {
    if (checkbox.checked) {
      orderIds.push({ order_id: checkbox.dataset.order_id });
    }
  });
  return orderIds;
}
function sendDataToController(endpointUrl) {
  const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  const data = getDataOrderIds();
  const options = {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': token,
    },
    body: JSON.stringify(data)
  }
  return fetch(endpointUrl, options);
}

function responseData(endpointUrl) {
  sendDataToController(endpointUrl)
    .then(response => response.json())
    .then(data => {
      // localStorage.setItem('confirm-success', 'Xác nhận đơn hàng thành công.');
      window.location.href = data.url;
      // setTimeout(() => {
      //   localStorage.removeItem('confirm-success');
      // }, 3000);
    })
    .catch(error => {
      alert(error);
    });
}

if (confirmAll) {
  confirmAll.addEventListener('click', () => {
    responseData(constants.URL_CONFIRM_ORDER);
  });
}
if (deleteAll) {
  deleteAll.addEventListener('click', () => {
    responseData(constants.URL_DELETE_ORDER);
  });
}
