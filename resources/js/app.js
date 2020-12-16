require('./bootstrap');

window.Vue = require('vue');
require('./filter');
require('./progressbar');

import Gate from "./Gate";
Vue.prototype.$gate = new Gate(window.user);
import Meta from 'vue-meta';
Vue.use(Meta);

// Importing Sweet Alert 2
import swal from 'sweetalert2'

window.swal = swal;

// Initialize toaster
const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

// Adding the Toaster globally
window.toast = toast;

//Import v-from
import {Form, HasError, AlertError} from 'vform';

window.Form = Form;
// Adding vForm globally
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

// import VueRouter from 'vue-router'
// Vue.use(VueRouter)

//Routes
// import {routes} from './routes';
// const router = new VueRouter({
//     routes, // short for `routes: routes`
//     mode: 'hash',
// });

Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// Custom events
window.Fire = new Vue();

const FILESYSTEM_DRIVER = 'public';

Vue.prototype.$ImageUrl = "public/storage/";

Vue.prototype.accessToken = '';
Vue.prototype.userInfo = '';

import StepProgress from 'vue-step-progress';
import 'vue-step-progress/dist/main.css';


import Vue from 'vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

var vueObject = new Vue({
    el: '#app',
    data() {
        return {
            resumeSteps:['Get Started', 'Personal Info', 'Work Experience','Education','Skills','Summary'],
            letterSteps:['Get Started','Contact','Recipient','Subject','Greeting','Opener','Body','Call To Action','Closer','Finish'],
            resumeStepsArabic:['البدء', 'معلومات شخصية', 'خبرة في العمل','التعليم','مهارات','ملخص'],
            letterStepsArabic:['البدء','اتصل','مستلم','موضوع','تحية','فتاحة','الجسم','دعوة للعمل','أقرب','إنهاء'],
            currentStep:0,
            show: true,
        }
    },
    // router,
    components: {
        'step-progress': StepProgress
    },
    created(){
        $('#loader').show();
    },
    methods:{
        onlyNumber($event) {
            // console.log($event.keyCode); //keyCodes value
            //  //keyCodes value
            let keyCode = ($event.keyCode ? $event.keyCode : $event.which);
            if ((keyCode < 48 || keyCode > 57) && keyCode !== 46) { // 46 is dot
                $event.preventDefault();
            }

        }
    }
});
