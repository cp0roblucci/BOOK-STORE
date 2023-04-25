import constants from "../constants";

const checkAll = document.getElementById('checkAll');

const listOrder = document.querySelectorAll('.order-element');
const listCheckBox = document.querySelectorAll('.order-element #checkBox');

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
      console.log('detail');
      const orderId = order.dataset.id;
      window.location.href = constants.URL_ADMIN_ORDERS + 'order-detail/' + orderId;
    });
  });
}


const confirmAllWaitingOrders = document.getElementById('confirm-all-waiting-orders');
const confirmAllProcessingOrders = document.getElementById('confirm-all-processing-orders');
const deleteAllArchivedOrders = document.getElementById('delete-all-archived-orders');
const archivedAllOrders = document.getElementById('archived-all-orders');
const deleteAllOrders = document.getElementById('delete-all-orders');
const returnRequest = document.getElementById('return-request');
const acceptReturnRequest = document.getElementById('accept-return-request');


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

function checkBtnExistsThenEnable() {
  if (confirmAllWaitingOrders) {
    enableBtn(confirmAllWaitingOrders);

  } else if (confirmAllProcessingOrders) {
    enableBtn(confirmAllProcessingOrders);

  } else if (archivedAllOrders) {
    enableBtn(archivedAllOrders);

  } else if (deleteAllOrders) {
    enableBtn(deleteAllOrders);

  } else if(deleteAllArchivedOrders) {
    enableBtn(deleteAllArchivedOrders);

  } else if(returnRequest) {
    enableBtn(returnRequest);

  } else if(acceptReturnRequest) {
    enableBtn(acceptReturnRequest);
  }
}
function checkBtnExistsThenDisable() {
  if (confirmAllWaitingOrders) {
    disableBtn(confirmAllWaitingOrders);

  } else if (confirmAllProcessingOrders) {
    disableBtn(confirmAllProcessingOrders);

  } else if (archivedAllOrders) {
    disableBtn(archivedAllOrders);

  } else if (deleteAllOrders) {
    disableBtn(deleteAllOrders);

  } else if(deleteAllArchivedOrders) {
    disableBtn(deleteAllArchivedOrders);

  } else if(returnRequest) {
    disableBtn(returnRequest);

  } else if(acceptReturnRequest) {
    disableBtn(acceptReturnRequest);
  }
}

// khi check all thi cho phep submit
if (checkAll) {
  checkAll.addEventListener('change', () => {
    if(checkAll.checked) {
      checkBtnExistsThenEnable();
    } else {
      checkBtnExistsThenDisable();
    }
  });
}

// lap qua tat ca checkbox neu khong co cai nao check hti khong cho submit
listCheckBox.forEach(checkbox => {
  checkbox.addEventListener('change', () => {
    isCheckedAll(listCheckBox);
    if (isCheck(listCheckBox)) {
      checkBtnExistsThenEnable();
    } else {
      checkBtnExistsThenDisable();
    }
  });
});

function enableBtn(btnElement) {
  btnElement.classList.remove('pointer-events-none');
  btnElement.classList.remove('text-slate-500');
  btnElement.classList.remove('opacity-50');
  btnElement.classList.remove('border-slate-500');

  if (btnElement === deleteAllArchivedOrders || btnElement === deleteAllOrders || btnElement === acceptReturnRequest) {
    btnElement.classList.add('text-red-400');
    btnElement.classList.add('border-red-400');
    return;
  }
  if (btnElement === archivedAllOrders) {
    btnElement.classList.add('text-green-400');
    btnElement.classList.add('border-green-400');
    return;
  }
  btnElement.classList.add('text-primary-purple');
  btnElement.classList.add('border-primary-purple');
}

function disableBtn(btnElement) {
  btnElement.classList.add('pointer-events-none');
  btnElement.classList.add('text-slate-500');
  btnElement.classList.add('border-slate-500');
  btnElement.classList.add('opacity-50');
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
function sendDataToController(endpointUrl, statusId) {
  const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  const data = {
    status_id: statusId,
    arr_order_id: getDataOrderIds()
  };
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

function responseData(endpointUrl, statusId) {
  sendDataToController(endpointUrl, statusId)
    .then(response => response.json())
    .then(data => {
      window.location.href = data.url;
    })
    .catch(error => {
      console.log(error);
    });
}

if (confirmAllWaitingOrders) {
  confirmAllWaitingOrders.addEventListener('click', () => {
    const statusId = confirmAllWaitingOrders.dataset.status_id;
    responseData(constants.URL_CONFIRM_ORDER, statusId);
  });
}
if (confirmAllProcessingOrders) {
  confirmAllProcessingOrders.addEventListener('click', () => {
    const statusId = confirmAllProcessingOrders.dataset.status_id;
    responseData(constants.URL_CONFIRM_PROCESSING_ORDER, statusId);
  });
}
if (deleteAllArchivedOrders) {
  deleteAllArchivedOrders.addEventListener('click', () => {
    const statusId = deleteAllArchivedOrders.dataset.status_id;
    responseData(constants.URL_DELETE_ARCHIVED_ALL_ORDER, statusId);
  });
}
if (archivedAllOrders) {
  archivedAllOrders.addEventListener('click', () => {
    responseData(constants.URL_ARCHIVED_ALL_ORDER);
  });
}
if (deleteAllOrders) {
  deleteAllOrders.addEventListener('click', () => {
    const statusId = deleteAllOrders.dataset.status_id;
    responseData(constants.URL_DELETE_ORDER, statusId);
  });
}
if (returnRequest) {
  returnRequest.addEventListener('click', () => {
    const statusId = returnRequest.dataset.status_id;
    responseData(constants.URL_RETURN_REQUEST, statusId);
  });
}
if (acceptReturnRequest) {
  acceptReturnRequest.addEventListener('click', () => {
    const statusId = acceptReturnRequest.dataset.status_id;
    responseData(constants.URL_ACCEPT_RETURN_REQUEST, statusId);
  });
}
