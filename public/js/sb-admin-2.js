(function ($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  $("#sidebarToggle").on('click', function (e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    $("#survey").removeClass("hilang");
    $('.nav-link i').addClass('ml-4');
    $('.nav-link i').addClass('mr-3');

    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
      $("#survey").addClass('hilang');
      $('.nav-link span').addClass('hilang');
      $('.nav-link i').removeClass('ml-4');
      $('.nav-link i').removeClass('mr-3');
      $('#sidebarToggle').addClass('mt-3');
    };
  });



  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function (e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on('scroll', function () {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function (e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
  });

})(jQuery); // End of use strict



//Our Code///


//Jika Width Layar kurang dari 768px  maka akan melakukan perintah dibawah ini
$(document).ready(function () {
  if ($(window).width() < 768) {
    $(".sidebar").toggleClass("toggled");
    $('#ekonomi .col-md-4').css('width', '26rem');
    $('#topbar').addClass('sticky-top');
    $('.topbar').addClass('shadow');
    $('.nav-link i').removeClass('ml-4');
    $('.nav-link i').removeClass('mr-3');
  };

  //Saat bars icon diklik maka jalankan perintah di bawah ini (mobile side bar ver) 
  $("#sidebarToggleTop").on('click', function (e) {
    $('#hitam-block').removeClass("hilang");
    $('.sidebar-brand').addClass('text-left');
    $('.close').removeClass('hilang');
    $(".sidebar").toggleClass("toggled");
    $('.sidebar .collapse').collapse('hide');
    $('.sidebar').addClass('sticky-top position-fixed');
    $('.sidebar .sticky-top').addClass('position-relative');
    $('.sidebar .sticky-top').removeClass('sticky-top');
    $('.sidebar').css('z-index', '10000');
  });


  //Jika Width Layar lebih dari 768px  maka akan melakukan perintah dibawah ini
  if ($(window).width() > 768) {
    $('#topbar').removeClass('sticky-top');
    $('.topbar').removeClass('shadow');
    $('.nav-link i').addClass('ml-4');
    $('.nav-link i').addClass('mr-3');
    $('#hitam-block').addClass("hilang");
    $('.sidebar').removeClass('sticky-top position-absolute');
    $('.sidebar-brand').removeClass('text-left');
    $('.sidebar .collapse').collapse('hide');

    if ($(".sidebar").hasClass("toggled")) {
      $(".sidebar").toggleClass("toggled");
    }
  };
});

$(".close").on('click', function (e) {
  $('#hitam-block').addClass("hilang");
  $(".sidebar").toggleClass("toggled");
  $('.sidebar .collapse').collapse('hide');
  $('.sidebar').removeClass('sticky-top position-absolute');
  $("#survey").addClass('hilang');
  $('.sidebar-brand').removeClass('text-left');
});


// Toggle data per provinsi
$("#provinsi-toggle").on('click', function () {
  $("#provinsi-toggle h3").toggleClass("toggled");
  $('#daftar-provinsi').addClass('hilang');
  if ($("#provinsi-toggle h3").hasClass("toggled")) {
    $('#daftar-provinsi').removeClass('hilang');
  };
});


//Create Slide circle button
let cobu = $('#nomor-slide li').length; // Hitung jumlah li yang ada di ul id nomor-slide
for (i = 1; i < cobu; i++) {
  var list = document.createElement('li');
  document.getElementById('circle-pointer').appendChild(list);
}
