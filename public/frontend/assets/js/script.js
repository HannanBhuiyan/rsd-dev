jQuery(document).ready(function () {


    var swiper = new Swiper(".delivery_slider", {
        slidesPerView: 6,
        spaceBetween: 30,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            1440: {
                slidesPerView: 6,
            },
            1024: {
                slidesPerView: 5,
            },
            992: {
                slidesPerView: 4,
            },
            576: {
                slidesPerView: 3,
            },
            425: {
                slidesPerView: 2,
            },
            320: {
                slidesPerView: 1,
            },
        },
      });










$(".header-item-right span").click(function(){
    $(".header-item-right").toggleClass("toggleclass");
    $(".header-bottom").toggleClass("open");
});

  $('.header-menu ul li a').on('click', function(e) {
      var element = $(this).parent('li');
      if (element.hasClass('open')) {
          element.removeClass('open');
          element.find('li').removeClass('open');
          element.find('ul').slideUp("swing");
      }
      else {
          element.addClass('open');
          element.children('ul').slideDown("swing");
          element.siblings('li').children('ul').slideUp("swing");
          element.siblings('li').removeClass('open');
          element.siblings('li').find('li').removeClass('open');
          element.siblings('li').find('ul').slideUp("swing");
      }
  });



     // Testimonial Carousel
     var swiperTest = new Swiper(".testimonial-swip", {
        slidesPerView: 3,
        spaceBetween: 30,
        freeMode: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        breakpoints : {
           // breakpoint from 768 up
           992 : {
            slidesPerView: 3,
          },
          // breakpoint from 0 up
          // breakpoint from 480 up
          768 : {
            slidesPerView: 2,

          },
          0 : {
            slidesPerView: 1,
          },


      }
      });

      // counter up js



window.addEventListener('scroll', ()=> {

  let progressbar = document.getElementById('project_counter_id')

  // let contentPosition = progressbar.getBoundingClientRect().top
  let contentPosition = progressbar.scrollTop

  let screenPosition = window.innerHeight

  if(contentPosition < screenPosition) {
      let num = document.querySelectorAll(".counterup");
      let numArray = Array.from(num)


      numArray.map((item)=>{
          let count = 0
          function counterup(){
              count++
              item.innerHTML = count

              if(count == item.dataset.number){
                  clearInterval(stop)
              }
          }

          let stop = setInterval(function(){
              counterup()
          },20)
      })

  }

})









      // Calculate cost dropdown
    // In your Javascript (external .js resource or <script> tag)

    $('#c-from').select2();


    $('#c-destination').select2();


    $('#c-service').select2();


    $('#c-location').select2();

    $('#opt-number').hide();
    $('.otp-number').show();
$('.otp-save').hide();

  $("#otp-action").click(function(){
    $('#opt-number').toggle();
    $(this).hide();
    let otp_number = $('.otp-number').html()
    $('#opt-number').val(otp_number.trim())
    $('.otp-number').hide();
    $('.otp-save').show();
  })
  $(".otp-save").click(function(){
    $(this).hide();
    $('#opt-number').hide();
    $('#otp-action').show();
    $('.otp-number').show();
  })




});
