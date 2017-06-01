
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




var items = []
  , point = document.querySelector('svg').createSVGPoint();

function getCoordinates(e, svg) {
  point.x = e.clientX;
  point.y = e.clientY;
  return point.matrixTransform(svg.getScreenCTM().inverse());
}

function changeColor(e) {
  document.body.className = e.currentTarget.className;
}

function Item(config) {
  Object.keys(config).forEach(function (item) {
    this[item] = config[item];
  }, this);
  this.el.addEventListener('mousemove', this.mouseMoveHandler.bind(this));
  this.el.addEventListener('touchmove', this.touchMoveHandler.bind(this));
}

Item.prototype = {
  update: function update(c) {
    this.clip.setAttribute('cx', c.x);
    this.clip.setAttribute('cy', c.y);
  },
  mouseMoveHandler: function mouseMoveHandler(e) {
    this.update(getCoordinates(e, this.svg));
  },
  touchMoveHandler: function touchMoveHandler(e) {
    e.preventDefault();
    var touch = e.targetTouches[0];
    if (touch) return this.update(getCoordinates(touch, this.svg));
  }
};

[].slice.call(document.querySelectorAll('.item'), 0).forEach(function (item, index) {
  items.push(new Item({
    el: item,
    svg: item.querySelector('svg'),
    clip: document.querySelector('#clip-'+index+' circle'),
  }));
});

[].slice.call(document.querySelectorAll('button'), 0).forEach(function (button) {
  button.addEventListener('click', changeColor);
});



$(document).ready(function(){

  var mousePos = {};

 function getRandomInt(min, max) {
   return Math.round(Math.random() * (max - min + 1)) + min;
 }

  $(window).mousemove(function(e) {
    mousePos.x = e.pageX;
    mousePos.y = e.pageY;
  });

  $(window).mouseleave(function(e) {
    mousePos.x = -1;
    mousePos.y = -1;
  });




});
$(document).ready(function() {

    $('article').readmore({
		speed: 1000,
		collapsedHeight: 100,
		moreLink: '<a class="readMore">Read More</a>',
		lessLink: '<a class="readMore">Close</a>'
	});
});
