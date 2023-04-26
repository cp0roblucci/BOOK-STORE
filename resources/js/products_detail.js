const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

// const quantityInputs = document.getElementsByName('qty');
// const quantityUp = document.querySelector('.quantity-up');
// const quantityDown = document.querySelector('.quantity-down');

// quantityUp.addEventListener('click', () => {
//     let currentValue = parseInt(quantityInputs[0].value);
//     if (currentValue < parseInt(quantityInputs[0].max)) {
//         quantityInputs.forEach((input) => {
//             input.value = currentValue + 1;
//         });
//     }
// });

// quantityDown.addEventListener('click', () => {
//     let currentValue = parseInt(quantityInputs[0].value);
//     if (currentValue > parseInt(quantityInputs[0].min)) {
//         quantityInputs.forEach((input) => {
//             input.value = currentValue - 1;
//         });
//     }
//     fetchQuantity(productId, categoryId)
//     .then(maxQuantity => {
//       quantity++;
//       if (quantity >= maxQuantity) {
//         quantity = maxQuantity;
//       }
//       quantityInputs.forEach(input => {
//         input.value = quantity;
//       })
//     })
// });


const previous = document.getElementById('previous');
const quantityElement = document.querySelectorAll('.value-quantity');
const increment = document.getElementById('increment');

// console.log(quantityElement);

const productId = document.getElementById('product_id').value;
const categoryId = document.getElementById('category_id').value;
console.log(productId, categoryId);
let quantity = 1;
previous.addEventListener('click', () => {
  quantity--;
  if (quantity <= 1) {
    quantity = 1;
  }
  quantityElement.forEach(input => {
    input.value = quantity;
  })
})

increment.addEventListener('click', () => {
  fetchQuantity(productId, categoryId)
    .then(maxQuantity => {
      quantity++;
      if (quantity >= maxQuantity) {
        quantity = maxQuantity;
      }
      quantityElement.forEach(input => {
        input.value = quantity;
      })
    })
})

function fetchQuantity(productId, categoryId) {
  const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  const data = {
    product_id: productId,
    category_id: categoryId
  };
  const options = {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': token,
    },
    body: JSON.stringify(data)
  }
  return fetch('/get-max-quantity', options)
    .then(response => response.json())
    .then(data => {
      return data.quantity;
    });
}


/////post data buy now/////


var qtt_product = $('#quantity_product');
// var qtt_post = $('#add_to_cart_product_id');
var total_post = $('#total_post');
var price_item = $('#price_item');
var btnadd = $('#add-to-transaction');

// console.log(qtt_product.getAttribute('value'), qtt_post, total_post, price_item, btnadd);


btnadd.addEventListener('click', function(e) {
  let qtt_product = $('#quantity_product');
  let total_post = $('#total_post');
  let price_item = $('#price_item');

  let total = qtt_product.getAttribute('value') * price_item.getAttribute('data-price');
  total_post.setAttribute('value', total);
  // qtt_post.setAttribute('value', qtt_product.getAttribute('value'));
  // total_post.setAttribute('value', (price_item.getAttribute('data-price')*qtt_product.getAttribute('value')));
})

// console.log(qtt_product.getAttribute('value'), qtt_post, total_post, price_item, btnadd);