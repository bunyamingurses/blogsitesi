!function(a){"use strict";a(document).ready(function(){function e(){a(window).width()>992?a(".navbar .dropdown").on("mouseover",function(){a(".dropdown-toggle",this).trigger("click")}).on("mouseout",function(){a(".dropdown-toggle",this).trigger("click").blur()}):a(".navbar .dropdown").off("mouseover").off("mouseout")}e(),a(window).resize(e)}),a(window).scroll(function(){a(this).scrollTop()>100?a(".back-to-top").fadeIn("slow"):a(".back-to-top").fadeOut("slow")}),a(".back-to-top").click(function(){return a("html, body").animate({scrollTop:0},1500,"easeInOutExpo"),!1}),a(".main-carousel").owlCarousel({autoplay:!0,smartSpeed:1500,items:1,dots:!0,loop:!0,center:!0}),a(".tranding-carousel").owlCarousel({autoplay:!0,smartSpeed:2e3,items:1,dots:!1,loop:!0,nav:!0,navText:['','']}),a(".carousel-item-1").owlCarousel({autoplay:!0,smartSpeed:1500,items:1,dots:!1,loop:!0,nav:!0,navText:['','']}),a(".carousel-item-2").owlCarousel({autoplay:!0,smartSpeed:1e3,margin:30,dots:!1,loop:!0,nav:!0,navText:['',''],responsive:{0:{items:2},576:{items:2},768:{items:2}}}),a(".carousel-item-3").owlCarousel({autoplay:!0,smartSpeed:1e3,margin:30,dots:!1,loop:!0,nav:!0,navText:['',''],responsive:{0:{items:2},576:{items:2},768:{items:3},992:{items:3}}}),a(".carousel-item-4").owlCarousel({autoplay:!0,smartSpeed:1e3,margin:30,dots:!1,loop:!0,nav:!0,navText:['',''],responsive:{0:{items:2},576:{items:2},768:{items:4},992:{items:4},1200:{items:4}}})}(jQuery);