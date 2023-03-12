var $ = document.querySelector.bind(document);
var $$ = document.querySelectorAll.bind(document);

var bg_img = [
    '/images/xanhdam-trang.png',
    '/images/vang.png',
    '/images/xam-trang.jpg'
];
var content_img = [
    '/images/xanhdam-trang-nobg.png',
    '/images/vang-nobg.png',
    '/images/xam-trang-nobg.png'

];

var content = [
    ['supper blue', 'hafmoon beeta fish', 'Bettas are a member of the gournami family and are know to be highly territorial of'],
    ['white blue', 'hafmoon beeta fish','Bettas are a member of the gournami family and are know to be highly territorial of'],
    ['supper red', 'hafmoon beeta fish','Bettas are a member of the gournami family and are know to be highly territorial of']
]


var img_content = $('.content-img');
var bg = $('.bg-img');
var name_fish = $('.fish-name');
var subname  = $('.subname'); 
var description  = $('.des'); 
var length_img = content_img.length;
var move = $$('.scroll');


//console.log(content[1][1]);
// console.log(content, bg);
var myIndex = 0;
slideShow();
//slideShow(bg_img, content_img);

function slideShow() {
    myIndex++;
    if(myIndex > content_img.length) { myIndex = 1; move[myIndex+1].classList.remove("text-slate-300"); }
    img_content.src = content_img[myIndex-1];
    bg.src = bg_img[myIndex-1];
    name_fish.innerHTML = content[myIndex-1][0];
    subname.innerHTML = content[myIndex-1][1];
    description.innerHTML = content[myIndex-1][2];
    move[myIndex-1].classList.add("text-slate-300");
    if(myIndex >1) move[myIndex-2].classList.remove("text-slate-300");
    setTimeout(slideShow,5000);
}
