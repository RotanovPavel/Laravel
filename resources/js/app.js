/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./test');
//window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });

$('#btn-top').click(function () {
    if ($(".navbar-ex2-collapse").hasClass("in")) {
        $('#ex-2').removeClass('in');
    }
});

$('#btn-middle').click(function () {
    if ($(".navbar-ex1-collapse").hasClass("in")) {
        $('#ex-1').removeClass('in');
    }
});

$(document).ready(function () {
    let act = $(".active p").text();
    $('.carousel-bottom-center p').text(act).hide().fadeToggle(1500);
    $('.indicate-slide').hide();
    let slideArray = Object.keys(document.getElementsByClassName('indicate-slide'));
    slideArray.forEach(function(i){
        for (j = 0; j < 5; j++) {
            if (parseInt(i) === j) {
                $('#'+i).show();
                // console.log(i);
            }
        }
    });
});

$('#myCarousel').on('slid.bs.carousel', function () {
    let act = $(".active p").text();
    $('.carousel-bottom-center p').text(act).hide().fadeToggle(1500);

    let slideArray = Object.keys(document.getElementsByClassName('indicate-slide')); // count of all elements (array)
    let activeLi = document.getElementsByClassName('indicate-slide active');
    let activeSlide = parseInt(activeLi[0].getAttribute('data-slide-to'));
    let first = 0;
    let last = 4;

    $('.indicate-slide').hide();
    slideArray.forEach(function(i){

        if (activeSlide >= last-1){
            first = activeSlide - 2; // 3
            last = activeSlide + 2;
        }
        if (activeSlide == slideArray.length-1) { // last indicator
            first = activeSlide - 4;
        }
        if (activeSlide == slideArray.length-2) { // penultimate indicator
            first = activeSlide - 3;
        }
        for (j = first; j <= last; j++) {
           if (parseInt(i) === j) {
                $('#'+i).show();
           }
        }
    });
});


$(document).ready(function () {
    let swiper = new Swiper('.swiper-container', {
        slidesPerView: 4,
        spaceBetween: 0,
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        autoplay: {
            delay: 5000
        },
        scrollbar: {
            el: '.swiper-scrollbar'
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        }
    });

});

$("#btn-feature").click(function () {
    $(".iconToggle").toggleClass("fa-plus");
    $(".iconToggle").toggleClass("fa-minus");
    $('#latest').slideToggle('slow');
    $("#feature").slideToggle('slow');
});
$("#btn-latest").click(function () {
    $(".iconToggle").toggleClass("fa-plus");
    $(".iconToggle").toggleClass("fa-minus");
    $('#latest').slideToggle('slow');
    $("#feature").slideToggle('slow');
});



