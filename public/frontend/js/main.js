(function ($) {
"user strict";

// preloader
$(window).on('load', function() {
  $(".preloader").delay(2000).animate({
    "opacity": "0"
  }, 400, function () {
      $(".preloader").css("display", "none");
  });
});

//Create Background Image
(function background() {
  let img = $('.bg_img');
  img.css('background-image', function () {
    var bg = ('url(' + $(this).data('background') + ')');
    return bg;
  });
})();

// nice-select
$(".nice-select").niceSelect();


// header-fixed
var fixed_top = $(".header-section");
$(window).on("scroll", function(){
    if( $(window).scrollTop() > 200){  
        fixed_top.addClass("animated fadeInDown header-fixed");
    }
    else{
        fixed_top.removeClass("animated fadeInDown header-fixed");
    }
});

// navbar-click
$(".navbar li a").on("click", function () {
  var element = $(this).parent("li");
  if (element.hasClass("show")) {
    element.removeClass("show");
    element.children("ul").slideUp(500);
  }
  else {
    element.siblings("li").removeClass('show');
    element.addClass("show");
    element.siblings("li").find("ul").slideUp(500);
    element.children('ul').slideDown(500);
  }
});

// scroll-to-top
var ScrollTop = $(".scrollToTop");
$(window).on('scroll', function () {
  if ($(this).scrollTop() < 100) {
      ScrollTop.removeClass("active");
  } else {
      ScrollTop.addClass("active");
  }
});

//Odometer
if ($(".statistics-item,.icon-box-items,.counter-single-items").length) {
  $(".statistics-item,.icon-box-items,.counter-single-items").each(function () {
    $(this).isInViewport(function (status) {
      if (status === "entered") {
        for (var i = 0; i < document.querySelectorAll(".odometer").length; i++) {
          var el = document.querySelectorAll('.odometer')[i];
          el.innerHTML = el.getAttribute("data-odometer-final");
        }
      }
    });
  });
}

// faq
$('.faq-wrapper .faq-title').on('click', function (e) {
  var element = $(this).parent('.faq-item');
  if (element.hasClass('open')) {
    element.removeClass('open');
    element.find('.faq-content').removeClass('open');
    element.find('.faq-content').slideUp(300, "swing");
  } else {
    element.addClass('open');
    element.children('.faq-content').slideDown(300, "swing");
    element.siblings('.faq-item').children('.faq-content').slideUp(300, "swing");
    element.siblings('.faq-item').removeClass('open');
    element.siblings('.faq-item').find('.faq-title').removeClass('open');
    element.siblings('.taq-item').find('.faq-content').slideUp(300, "swing");
  }
});

var swiper = new Swiper(".banner-slider", {
  slidesPerView: 3,
  loop: true,
  centeredSlides: true,
  effect: "coverflow",
  coverflowEffect: {
    rotate: 50,
    stretch: 0,
    depth: 100,
    modifier: 1,
    slideShadows: false,
  },
  autoplay: {
    speed: 1000,
    delay: 3000,
  },
  speed: 1000,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    1199: {
    slidesPerView: 2,
    },
    991: {
    slidesPerView: 2,
    },
    767: {
    slidesPerView: 2,
    },
    575: {
    slidesPerView: 1,
    },
  }
});

var swiper = new Swiper(".testimonial-slider", {
  slidesPerView: 2,
  spaceBetween: 30,
  loop: true,
  autoplay: {
    speed: 1000,
    delay: 3000,
  },
  speed: 1000,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    1199: {
    slidesPerView: 2,
    },
    991: {
    slidesPerView: 1,
    },
    767: {
    slidesPerView: 1,
    },
    575: {
    slidesPerView: 1,
    },
  }
});

var swiper = new Swiper(".brand-slider", {
  slidesPerView: 6,
  spaceBetween: 30,
  loop: true,
  autoplay: {
    speed: 1000,
    delay: 3000,
  },
  speed: 1000,
  breakpoints: {
    1199: {
    slidesPerView: 5,
    },
    991: {
    slidesPerView: 4,
    },
    767: {
    slidesPerView: 3,
    },
    575: {
    slidesPerView: 2,
    },
  }
});

// sidebar
$(".sidebar-menu-item > a").on("click", function () {
  var element = $(this).parent("li");
  if (element.hasClass("active")) {
    element.removeClass("active");
    element.children("ul").slideUp(500);
  }
  else {
    element.siblings("li").removeClass('active');
    element.addClass("active");
    element.siblings("li").find("ul").slideUp(500);
    element.children('ul').slideDown(500);
  }
});

// sidebar sub
$(".has-sub > a").on("click", function () {
  var element = $(this).parent("li");
  if (element.hasClass("active")) {
    element.removeClass("active");
    element.children("ul").slideUp(500);
  }
  else {
    element.siblings("li").removeClass('active');
    element.addClass("active");
    element.siblings("li").find("ul").slideUp(500);
    element.children('ul').slideDown(500);
  }
});

// active menu JS
function splitSlash(data) {
  return data.split('/').pop();
}
function splitQuestion(data) {
  return data.split('?').shift().trim();
}
var pageNavLis = $('.developer-bar-main-menu a');
var dividePath = splitSlash(window.location.href);
var divideGetData = splitQuestion(dividePath);
var currentPageUrl = divideGetData;

// find current sidevar element
$.each(pageNavLis,function(index,item){
    var anchoreTag = $(item);
    var anchoreTagHref = $(item).attr('href');
    var index = anchoreTagHref.indexOf('/');
    var getUri = "";
    if(index != -1) {
      // split with /
      getUri = splitSlash(anchoreTagHref);
      getUri = splitQuestion(getUri);
    }else {
      getUri = splitQuestion(anchoreTagHref);
    }
    if(getUri == currentPageUrl) {
      var thisElementParent = anchoreTag.parents('.sidebar-single-menu');
      (anchoreTag == true) ? anchoreTag.addClass('active') : thisElementParent.addClass('active');
      (anchoreTag.parents('.has-sub')) ? anchoreTag.parents('.has-sub').addClass('active') : '';
      (thisElementParent.find('.sidebar-submenu')) ? thisElementParent.find('.sidebar-submenu').slideDown("slow") : '';
      return false;
    }
});

// active menu JS
function splitSlash(data) {
  return data.split('/').pop();
}
function splitQuestion(data) {
  return data.split('?').shift().trim();
}
var pageNavLis = $('.sidebar-menu a');
var dividePath = splitSlash(window.location.href);
var divideGetData = splitQuestion(dividePath);
var currentPageUrl = divideGetData;

// find current sidevar element
$.each(pageNavLis,function(index,item){
    var anchoreTag = $(item);
    var anchoreTagHref = $(item).attr('href');
    var index = anchoreTagHref.indexOf('/');
    var getUri = "";
    if(index != -1) {
      // split with /
      getUri = splitSlash(anchoreTagHref);
      getUri = splitQuestion(getUri);
    }else {
      getUri = splitQuestion(anchoreTagHref);
    }
    if(getUri == currentPageUrl) {
      var thisElementParent = anchoreTag.parents('.sidebar-menu-item');
      (anchoreTag.hasClass('nav-link') == true) ? anchoreTag.addClass('active') : thisElementParent.addClass('active');
      (anchoreTag.parents('.sidebar-dropdown')) ? anchoreTag.parents('.sidebar-dropdown').addClass('active') : '';
      (thisElementParent.find('.sidebar-submenu')) ? thisElementParent.find('.sidebar-submenu').slideDown("slow") : '';
      return false;
    }
});

//sidebar Menu
$('.sidebar-menu-bar').on('click', function (e) {
  e.preventDefault();
  if($('.sidebar, .navbar-wrapper, .body-wrapper').hasClass('active')) {
    $('.sidebar, .navbar-wrapper, .body-wrapper').removeClass('active');
    $('.body-overlay').removeClass('show');
  }else {
    $('.sidebar, .navbar-wrapper, .body-wrapper').addClass('active');
    $('.body-overlay').addClass('show');
  }
});
$('#body-overlay').on('click', function (e) {
  e.preventDefault();
  $('.sidebar, .navbar-wrapper, .body-wrapper').removeClass('active');
  $('.body-overlay').removeClass('show');
});

// dashboard-list
$('.dashboard-list-item').on('click', function (e) {
  var element = $(this).parent('.dashboard-list-item-wrapper');
  if (element.hasClass('show')) {
    element.removeClass('show');
    element.find('.preview-list-wrapper').removeClass('show');
    element.find('.preview-list-wrapper').slideUp(300, "swing");
  } else {
    element.addClass('show');
    element.children('.preview-list-wrapper').slideDown(300, "swing");
    element.siblings('.dashboard-list-item-wrapper').children('.preview-list-wrapper').slideUp(300, "swing");
    element.siblings('.dashboard-list-item-wrapper').removeClass('show');
    element.siblings('.dashboard-list-item-wrapper').find('.dashboard-list-item').removeClass('show');
    element.siblings('.dashboard-list-item-wrapper').find('.preview-list-wrapper').slideUp(300, "swing");
  }
});

//info-btn
$(document).on('click', '.info-btn', function () {
  $('.support-profile-wrapper').addClass('active');
});
$(document).on('click', '.chat-cross-btn', function () {
  $('.support-profile-wrapper').removeClass('active');
});

// invoice-form
$('.invoice-form').on('click', '.add-row-btn', function() {
  $('.add-row-btn').closest('.invoice-form').find('.add-row-wrapper').last().clone().show().appendTo('.results');
});

$(document).on('click','.invoice-cross-btn', function (e) {
  e.preventDefault();
  $(this).parent().parent().hide(300);
});

//pdf
$('.pdf').on('click', function (e) {
  e.preventDefault();
  $('.pdf-area').addClass('active');
  $('.body-overlay').addClass('active');
});
$('#body-overlay, #pdf-area').on('click', function (e) {
  e.preventDefault();
  $('.pdf-area').removeClass('active');
  $('.body-overlay').removeClass('active');
})

//Notification
$('.notification-icon').on('click', function (e) {
  e.preventDefault();
  if($('.notification-wrapper').hasClass('active')) {
    $('.notification-wrapper').removeClass('active');
    $('.body-overlay').removeClass('active');
  }else {
    $('.notification-wrapper').addClass('active');
    $('.body-overlay').addClass('active');
  }
});
$('#body-overlay').on('click', function (e) {
  e.preventDefault();
  $('.notification-wrapper').removeClass('active');
  $('.body-overlay').removeClass('active');
});

// switch-toggles
$(document).ready(function(){
  $.each($(".switch-toggles"),function(index,item) {
    var firstSwitch = $(item).find(".switch").first();
    var lastSwitch = $(item).find(".switch").last();
    if(firstSwitch.attr('data-value') == null) {
      $(item).find(".switch").first().attr("data-value",true);
      $(item).find(".switch").last().attr("data-value",false);
    }
    if($(item).hasClass("active")) {
      $(item).find('input').val(firstSwitch.attr("data-value"));
    }else {
      $(item).find('input').val(lastSwitch.attr("data-value"));
    }
  });
});

$('.switch-toggles .switch').on('click', function () {
  $(this).parents(".switch-toggles").toggleClass('active');
  $(this).parents(".switch-toggles").find("input").val($(this).attr("data-value"));
  
  let targetAttrVal = $(this).parent().attr("data-deactive");
  if($(this).parent().hasClass("active") == false) {
    $('[data-switcher='+targetAttrVal+']').removeClass("d-none").slideDown(400);
  }else {
    $('[data-switcher='+targetAttrVal+']').slideUp(400);
  }
});

//Profile Upload
function proPicURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          var preview = $(input).parents('.preview-thumb').find('.profilePicPreview');
          $(preview).css('background-image', 'url(' + e.target.result + ')');
          $(preview).addClass('has-image');
          $(preview).hide();
          $(preview).fadeIn(650);
      }
      reader.readAsDataURL(input.files[0]);
  }
}
$(".profilePicUpload").on('change', function () {
  proPicURL(this);
});

$(".remove-image").on('click', function () {
  $(".profilePicPreview").css('background-image', 'none');
  $(".profilePicPreview").removeClass('has-image');
});

// password
$(document).ready(function() {
  $(".show_hide_password .show-pass").on('click', function(event) {
      event.preventDefault();
      if($(this).parent().find("input").attr("type") == "text"){
          $(this).parent().find("input").attr('type', 'password');
          $(this).find("i").addClass( "fa-eye-slash" );
          $(this).find("i").removeClass( "fa-eye" );
      }else if($(this).parent().find("input").attr("type") == "password"){
          $(this).parent().find("input").attr('type', 'text');
          $(this).find("i").removeClass( "fa-eye-slash" );
          $(this).find("i").addClass( "fa-eye" );
      }
  });
});
  

})(jQuery);