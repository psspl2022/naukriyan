require('./bootstrap');
window.Vue = require('vue');

$(document).ready(function () {
    $('input[type="radio"]').click(function () {
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
});

// document.querySelector('.mini-photo-wrapper').addEventListener('click', function () {
//     document.querySelector('.menu-container').classList.toggle('active');
// });

// editor support
import 'v-markdown-editor/dist/index.css';

import Editor from 'v-markdown-editor'

Vue.use(Editor);
//vue-tour
import VueTour from 'vue-tour'

require('vue-tour/dist/vue-tour.css')

Vue.use(VueTour)

Vue.component('pagination', require('laravel-vue-pagination'));

// Support vuex 
import Vuex from 'vuex'

Vue.use(Vuex)

import storeData from "./store/index"

const store = new Vuex.Store(
    storeData
)

import { filter } from './filter'

// vue router
import VueRouter from 'vue-router'

Vue.use(VueRouter)

// CK Editor
import CKEditor from '@ckeditor/ckeditor5-vue';

Vue.use(CKEditor);
//video embed
import Embed from 'v-video-embed'

// global register
Vue.use(Embed);
//vue-datatable
import Vue from 'vue';
import { VuejsDatatableFactory } from 'vuejs-datatable';

Vue.use(VuejsDatatableFactory);
//close vuejs

// Infinite Slider
import InfiniteSlideBar from 'vue-infinite-slide-bar'

Vue.component('infinite-slide-bar', InfiniteSlideBar)

// Suppress all vue logs and warnings
// Vue.config.silent = true

// Handle Errors
// Vue.config.errorHandler = function (err, vm, info) {
//     console.log(`Error: ${err.toString()}\nInfo: ${info}`);
// }

import { routes } from './routes';
Vue.component('admin-main', require('./components/admin/AdminMaster.vue'));
Vue.component('home-main', require('./components/public/PublicMaster.vue'));
Vue.component('main-header', require('./components/public/front/main-header.vue'));
Vue.component('main-footer', require('./components/public/front/main-footer.vue'));
Vue.component('jobseeker-header', require('./components/public/Jobseeker/jobseeker-header.vue'));
Vue.component('jobseeker-footer', require('./components/public/Jobseeker/jobseeker-footer.vue'));
Vue.component('Emp-header', require('./components/public/Employer/Emp-header.vue'));
Vue.component('Emp-footer', require('./components/public/Employer/Emp-footer.vue'));

Vue.component('consultant-header', require('./components/public/consultant/ConsultantHeader.vue'));
Vue.component('consultant-footer', require('./components/public/consultant/ConsultantFooter.vue'));

Vue.component('viewjob-front', require('./components/public/Jobseeker/ViewJobFront.vue'));
Vue.component('forget-password', require('./components/public/front/ForgetPassword.vue'));

Vue.component('auto-logout', require('./components/AutoLogout.vue'));
Vue.component('profile-percentage', require('./components/public/Jobseeker/ProfileCompletePercentage.vue'));



// V-form
import { Form, HasError, AlertError } from 'vform'

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form = Form;

// Sweet alert 2
import swal from 'sweetalert2'

window.swal = swal;
const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

window.toast = toast

const router = new VueRouter({
    routes,
    mode: 'hash',
    //base: process.env.BASE_URL,
})

window.Fire = new Vue();

const app = new Vue({
    el: '#app',
    router,
    store,
});