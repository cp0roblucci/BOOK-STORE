const dataSlide = [
  {
    imgSrc: '/storage/images/slide/slider4.png'
  },
  {
    imgSrc: '/storage/images/slide/slider2.png'
  },
  {
    imgSrc: '/storage/images/slide/slider3.png'
  }
];

const slider = document.getElementById('slider');

if (slider) {
  slider.innerHTML = dataSlide.map(slide => {
    return `<div draggable="true" class="outline-none">
              <img src="${slide.imgSrc}" alt="slider" lazyload="true" class="w-full">
            </div>`;
  }).join('');

  $('#slider').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    fade: true,
    autoplay: true,
    autoplaySpeed: 1500,
    cssEase: 'linear',
    draggable: true,
    prevArrow: "<button type='button' class='slick-prev slick-arrow'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
    nextArrow: "<button type='button' class='slick-next slick-arrow'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
  });
}