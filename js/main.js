//mobile-menu
$(function() {

  $('.mobile-menu').click(function(){

    $('.main-menu').toggle(400);
  });


});

//Get an array of sliders
 var slides = document.getElementsByClassName("slider-block");


 //Hide all slides, except the first when the page is loaded
 for (var i = 0; i < slides.length; i++) {
     if(i !== 0) {
     slides[i].style.display = "none";
     }
 }


 //Slide Function
 var index = 0;
 function showSlides(n) {

     index = index + n;

     if(index > slides.length - 1) {
         index = 0;
     }

     if(index < 0) {
         index = slides.length - 1;
     }

     for (var i = 0; i < slides.length; i++) {
         if (i === index) {
             slides[i].style.display = "block";
         }
         else {
             slides[i].style.display = "none";
         }
     }

 } //Slider testimonilas ends here
