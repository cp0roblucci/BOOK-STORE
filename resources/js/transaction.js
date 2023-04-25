const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

var payments = $('.payments')
payments.addEventListener('click', function(e) {
    payments.classList.toggle('border-blue-300');
    payments.classList.toggle('text-blue-300');
});
