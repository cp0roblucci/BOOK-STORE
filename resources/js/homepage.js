var $ = document.querySelector.bind(document);
var $$ = document.querySelectorAll.bind(document);

var bg_img = [
    '/storage/images/xanhdam-trang.png',
    '/storage/images/vang.png',
    '/storage/images/xam-trang.jpg'
];
var content_img = [
    '/storage/images/xanhdam-trang-nobg.png',
    '/storage/images/vang-nobg.png',
    '/storage/images/xam-trang-nobg.png'

];

var content = [
    ['Cá Xiêm Xanh Tím Than ', 'Cá Xiêm', 'Cá Betta là một chi cá nước ngọt nhỏ, thường có màu sắc đặc trưng thuộc lớp Cá vây tia nằm trong họ (Osphronemidae)'],
    ['Cá Betta Vàng Đen ', 'Cá Betta','Cá Betta là một chi cá nước ngọt nhỏ, thường có màu sắc đặc trưng thuộc lớp Cá vây tia nằm trong họ (Osphronemidae)'],
    ['Cá Xiêm Xám Khói', 'Cá Xiêm','Cá Xiêm là một chi cá nước ngọt nhỏ, thường có màu sắc đặc trưng thuộc lớp Cá vây tia nằm trong họ (Osphronemidae)']
];


var img_content = $('.content-img');
var bg = $('.bg-img');
var name_fish = $('.fish-name');
var subname  = $('.subname'); 
var description  = $('.des');
var move = $$('.scroll');
var length_content = content_img.length;


var slideIndex =1;
showSlide();


const btnPre = $('.btn-pre');
const btnNext = $('.btn-next');

btnPre.addEventListener('click', function() {
    move[slideIndex-1].classList.remove("text-slate-300");
    myIndex = slideIndex;
    slideIndex--;
    showSlide();
    //console.log(slideIndex);
});

btnNext.addEventListener('click', function() {
    move[slideIndex-1].classList.remove("text-slate-300");
    myIndex = slideIndex;
    slideIndex++;
    showSlide();
   //console.log(slideIndex);
});






function showSlide() {
    if(slideIndex > length_content) { slideIndex  = 1 }
    if(slideIndex == 0 ) { slideIndex = length_content}
    console.log(slideIndex);
    img_content.src = content_img[slideIndex-1];
    bg.src = bg_img[slideIndex-1]
    name_fish.innerHTML = content[slideIndex-1][0];
    subname.innerHTML = content[slideIndex-1][1];
    description.innerHTML = content[slideIndex-1][2];
    move[slideIndex-1].classList.add("text-slate-300");
};



//console.log(content[1][1]);
// console.log(content, bg);
var myIndex = 0;
slideShow();
//slideShow(bg_img, content_img);

function slideShow() {
    myIndex++;
    if(myIndex > content_img.length) { myIndex = 1; move[myIndex+1].classList.remove("text-slate-300"); }
    slideIndex = myIndex;
    img_content.src = content_img[myIndex-1];
    bg.src = bg_img[myIndex-1];
    name_fish.innerHTML = content[myIndex-1][0];
    subname.innerHTML = content[myIndex-1][1];
    description.innerHTML = content[myIndex-1][2];
    move[myIndex-1].classList.add("text-slate-300");
    if(myIndex >1) move[myIndex-2].classList.remove("text-slate-300");
    setTimeout(slideShow,2000);
}
