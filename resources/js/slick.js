$(document).ready(function(){

      $('.partner-item').slick({
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 5,
        focusOnSelect: true,
        autoplay: true,
        autoplaySpeed: 1000,
        arrows:true,
        draggable:false,
        prevArrow:
        '<button type="button" class="slick-prev pull-left"><i class="fa-sharp fa-solid fa-arrow-left"></i></button>',
        nextArrow:
        '<button type="button" class="slick-next pull-right"><i class="fa-sharp fa-solid fa-arrow-right"></i></button>',
        responsive: [

          {
            breakpoint: 994,
            settings: {
              arrows: false,
              centerMode: true,

              slidesToShow: 3
            }
          },

          {
            breakpoint: 769,
            settings: {
              arrows: false,
              centerMode: true,

              slidesToShow: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              arrows: false,
              centerMode: true,

              slidesToShow: 1
            }
          }
        ]
      });


      $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
      });
      $('.slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        centerPadding: '0px',
        asNavFor: '.slider-for',
        dots: false,
        centerMode: true,
        focusOnSelect: true
      });

   $('.slide-auto').slick({
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 3,
        focusOnSelect: true,
        autoplay: true,
        autoplaySpeed: 1000,
        arrows:false,
        draggable:false,
        prevArrow:
        '<button type="button" class="slick-prev pull-left"><i class="fa-sharp fa-solid fa-arrow-left"></i></button>',
        nextArrow:
        '<button type="button" class="slick-next pull-right"><i class="fa-sharp fa-solid fa-arrow-right"></i></button>',

        responsive: [

          {
            breakpoint: 1200,
            settings: {
              arrows: false,
              centerMode: true,
              slidesToShow: 2
            }
          },
          {
            breakpoint: 1024,
            settings: {
              arrows: false,
              centerMode: true,

              slidesToShow: 2
            }
          },
          {
            breakpoint: 768,
            settings: {
              arrows: false,
              centerMode: true,

              slidesToShow: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              arrows: false,
              centerMode: true,

              slidesToShow: 1
            }
          }
        ]
      });


      ///slider


      $('.slide-auto-slider').slick({
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 1,
        focusOnSelect: true,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows:true,
        draggable:true,
        prevArrow:
        '<button type="button" class="slick-prev pull-left"></button>',
        nextArrow:
        '<button type="button" class="slick-next pull-right"></button>',

      });
  });

///
