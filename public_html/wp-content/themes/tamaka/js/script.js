$(document).ready(() => {
	$('.category-buttons__burger').click(() => {
  $('.drawer').removeClass('hidden-left');

  setTimeout(() => {
    $('.drawer__void').removeClass('hidden');
  }, 200);
});

$('.drawer__void').click(() => {
  $('.drawer').addClass('hidden-left');
  $('.drawer__void').addClass('hidden');
});

$('.search-icon').click(() => {
  // alert('hello');
  if ($('.search input').css('display') == 'none') {
    $('.popup-search').removeClass('hidden-top');
  }
  // alert($('.search input').css('display'));
});

$('.popup-search__button-close').click(() => {
  $('.popup-search').addClass('hidden-top');
});
;
	$('.base-slider').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 3,
  responsive: [
    {
      breakpoint: 1280,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        dots: true,
      },
    },
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        dots: true,
      },
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        dots: true,
      },
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        dots: true,
      },
    },
    {
      breakpoint: 320,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        dots: true,
      },
    },
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ],
});

});