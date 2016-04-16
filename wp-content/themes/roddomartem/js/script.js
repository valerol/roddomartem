$ = jQuery.noConflict();

function include(url){
  document.write('<script src="'+url+'"></script>');
  return false ;
}

/* cookie.JS
========================================================*/
include('/wp-content/themes/roddomartem/js/jquery.cookie.js');


/* DEVICE.JS
========================================================*/
include('/wp-content/themes/roddomartem/js/device.min.js');

/* Stick up menu
========================================================*/
include('/wp-content/themes/roddomartem/js/tmstickup.js');
$(window).load(function() { 
  if ($('html').hasClass('desktop')) {
      $('#stuck_container').TMStickUp({
      })
  }  
});

/* Easing library
========================================================*/
include('/wp-content/themes/roddomartem/js/jquery.easing.1.3.js');


/* ToTop
========================================================*/
include('/wp-content/themes/roddomartem/js/jquery.ui.totop.js');
$(function () {   
  $().UItoTop({ easingType: 'easeOutQuart' });
});

/* DEVICE.JS AND SMOOTH SCROLLIG
========================================================*/
include('/wp-content/themes/roddomartem/js/jquery.mousewheel.min.js');
include('/wp-content/themes/roddomartem/js/jquery.simplr.smoothscroll.min.js');

$(function () { 
  if ($('html').hasClass('desktop')) {
      $.srSmoothscroll({
        step:150,
        speed:800
      });
  }   
});


/* Copyright Year
========================================================*/
var currentYear = (new Date).getFullYear();
$(document).ready(function() {
  $("#copyright-year").text( (new Date).getFullYear() );
});


/* Superfish menu
========================================================*/
include('/wp-content/themes/roddomartem/js/superfish.js');
include('/wp-content/themes/roddomartem/js/jquery.mobilemenu.js');


/* Orientation tablet fix
========================================================*/
$(function(){
// IPad/IPhone
	var viewportmeta = document.querySelector && document.querySelector('meta[name="viewport"]'),
	ua = navigator.userAgent,

	gestureStart = function () {viewportmeta.content = "width=device-width, minimum-scale=0.25, maximum-scale=1.6, initial-scale=1.0";},

	scaleFix = function () {
		if (viewportmeta && /iPhone|iPad/.test(ua) && !/Opera Mini/.test(ua)) {
			viewportmeta.content = "width=device-width, minimum-scale=1.0, maximum-scale=1.0";
			document.addEventListener("gesturestart", gestureStart, false);
		}
	};
	
	scaleFix();
	// Menu Android
	if(window.orientation!=undefined){
  var regM = /ipod|ipad|iphone/gi,
   result = ua.match(regM)
  if(!result) {
   $('.sf-menu li').each(function(){
    if($(">ul", this)[0]){
     $(">a", this).toggle(
      function(){
       return false;
      },
      function(){
       window.location.href = $(this).attr("href");
      }
     );
    } 
   })
  }
 }
});
var ua=navigator.userAgent.toLocaleLowerCase(),
 regV = /ipod|ipad|iphone/gi,
 result = ua.match(regV),
 userScale="";
if(!result){
 userScale=",user-scalable=0"
}
document.write('<meta name="viewport" content="width=device-width,initial-scale=1.0'+userScale+'">')


$(document).ready(function () {
	/* WOW */
	if (jQuery('html').hasClass('desktop')) {
		new WOW().init();
	}
	
	/* Popup login */
	$( '#login-link' ).on( 'click', function( event ) {
		event.preventDefault();
		$( '#login-form' ).toggle();
	} );
});


