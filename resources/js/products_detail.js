const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const quantityInput = document.querySelector('.quantity input');
const quantityUp = document.querySelector('.quantity-up');
const quantityDown = document.querySelector('.quantity-down');


    
quantityUp.addEventListener('click', () => {
    let currentValue = parseInt(quantityInput.value);
    if (currentValue < parseInt(quantityInput.max)) {
    quantityInput.value = currentValue + 1;
    }
});

quantityDown.addEventListener('click', () => {
    let currentValue = parseInt(quantityInput.value);
    if (currentValue > parseInt(quantityInput.min)) {
    quantityInput.value = currentValue - 1;
    }
});
