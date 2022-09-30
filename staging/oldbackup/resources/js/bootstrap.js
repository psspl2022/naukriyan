window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */


try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
    require('admin-lte');
    require('datatables.net-dt');
    require('datatables.net');
    require('datatables.net-bs4');
    // require('@fortawesome/fontawesome-free');
} catch (e) {


}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
// $(DOCUMENT).READY(FUNCTION() {
//     $('.CUSTOMER-LOGOS').SLICK({
//         SPEED: 2000,
//         AUTOPLAY: TRUE,
//         AUTOPLAYSPEED: 0,
//         CENTERMODE: TRUE,
//         SLIDESTOSHOW: 5,
//         SLIDESTOSCROLL: 5,
//         INFINITE: TRUE,
//         INITIALSLIDE: 5,
//         ARROWS: FALSE,
//         BUTTONS: FALSE,
//         RESPONSIVE: [{
//             BREAKPOINT: 768,
//             SETTINGS: {
//                 SLIDESTOSHOW: 4
//             }
//         }, {
//             BREAKPOINT: 520,
//             SETTINGS: {
//                 SLIDESTOSHOW: 3
//             }
//         }]
//     });
// });

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });


//custom js

// $(document).ready(function() {
//     $('.envelopes').hover(function() {
//             $('.letterWrapper').toggleClass('blue');
//         },
//         function() {
//             $('.letterWrapper').removeClass('blue');
//         });
// });

$(document).ready(function () {

    $('.envelopes').hover(function (event) {
        $('.letterWrapper').stop().animate({
            opacity: '1',
            marginTop: '-110px'
        }, 300, function () { //animation complete
            $('.envelopes').removeClass('hovered');
        });
    });
    $('.envelopes').mouseleave(function (event) {
        $('.letterWrapper').stop().animate({
            //opacity: '0.5',
            marginTop: '10px'
        }, 600, function () { //animation complete
            $('.envelopes').addClass('hovered');
        });
    });
});
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

$(document).ready(function () {
    $('.customer-logos').slick({
        speed: 2000,
        autoplay: true,
        autoplaySpeed: 0,
        centerMode: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        initialSlide: 5,
        arrows: false,
        buttons: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });
});