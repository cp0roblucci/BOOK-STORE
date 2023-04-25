const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);


var btnshows = $$('.btn-show');

btnshows.forEach(btnshow => {
    btnshow.addEventListener("click", function(event) {
        // alert(event.target.parentElement.classList.add('hidden'));
        let parentE = event.target.parentElement.parentElement;
        parentE.getElementsByClassName('infor')[0].classList.add('hidden');
        parentE.getElementsByClassName('btn-box')[0].classList.add('hidden');
    
        parentE.getElementsByClassName('form')[0].classList.remove('hidden');
        console.log(parentE.getElementsByClassName('infor')[0]);
    });
});

var btninfor = $('.btninfor');
var btnorders = $('.btnordered');
var boxinfor = $('.information');
var boxordered = $('.ordered');

btninfor.addEventListener("click", function(event) {
    if(btnorders.classList.contains('bg-blue-100')){
        btnorders.classList.remove('bg-blue-100');
        btnorders.classList.remove('text-aliceblue');
        if(boxinfor.classList.contains('hidden')) {
            boxordered.classList.add('hidden');
            boxinfor.classList.remove('hidden');
        }
    }
    boxinfor.classList.remove('hidden');
    btninfor.classList.add('bg-blue-100');
    btninfor.classList.add('text-aliceblue');
});

btnorders.addEventListener("click", function(event) {
    if(btninfor.classList.contains('bg-blue-100')){
        btninfor.classList.remove('bg-blue-100');
        btninfor.classList.remove('text-aliceblue');
        if(boxordered.classList.contains('hidden')) {
            boxinfor.classList.add('hidden');
            boxordered.classList.remove('hidden');
        }
    }

    btnorders.classList.add('bg-blue-100');
    btnorders.classList.add('text-aliceblue');
});