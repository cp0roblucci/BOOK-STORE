// const increase = document.getElementById('btn_increase');
// const decrease = document.getElementById('btn_decrease');
// const quantity = document.getElementById('quantity');

// let valueQuantity = 1;
// quantity.value = valueQuantity;

// increase.addEventListener('click', () => {
//   valueQuantity++;
//   quantity.value = valueQuantity;
// });

// decrease.addEventListener('click', () => {
//   if(quantity.value > 1) {
//     valueQuantity--;
//     quantity.value = valueQuantity;
//   }
// })

const increase = document.getElementById('btn_increase');
const decrease = document.getElementById('btn_decrease');
const quantity = document.getElementById('quantity');
const productQuantity = document.getElementById('product_quantity');

let valueQuantity = 1;
quantity.value = valueQuantity;

increase.addEventListener('click', () => {
  valueQuantity++;
  quantity.value = valueQuantity;
  productQuantity.value = valueQuantity; // Cập nhật số lượng sản phẩm
});

decrease.addEventListener('click', () => {
  if (quantity.value > 1) {
    valueQuantity--;
    quantity.value = valueQuantity;
    productQuantity.value = valueQuantity; // Cập nhật số lượng sản phẩm
  }
});