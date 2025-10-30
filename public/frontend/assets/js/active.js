$(document).ready(function(){
  $('.slider-banner').slick({
    arrows : false,
    // autoplay : true,
    speed : 400,
    autoplaySpeed : 1000,
  });

  $('.product_thumb_slider').slick({
    arrows : false,
    //  autoplay : true,
     asNavFor: '.product_nav_slider'
  });
  $('.product_nav_slider').slick({
    arrows : false,
   slidesToShow: 5,
   centerMode: true,
   centerPadding: '0px',
   asNavFor: '.product_thumb_slider',
   focusOnSelect :true
  });




});
