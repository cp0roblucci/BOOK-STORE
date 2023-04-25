import constants from "../constants";

export function commitTransaction(transactionId) {
  const data = {
    transaction_id: transactionId
  }
  const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  const options = {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': token,
    },
    body: JSON.stringify(data),
  }
  fetch(constants.URL_COMMIT, options)
    .then(response => response.json())
    .then(data => {
      console.log(data);
    })
    .catch(error => {
      console.error(error);
    });
}
