/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
Vue.prototype.trans = string => _.get(window.i18n, string);

import Vue from 'vue'
import StarRating from 'vue-star-rating'

Vue.component('class-show', require('./components/Student/ClassShow'));
Vue.component('class-show-mobile', require('./components/Student/ClassShowMobile'));
Vue.component('session-info', require('./components/Student/SessionInfo'));
Vue.component('session-postpone', require('./components/Student/Postpone/PostponeSession'));
Vue.component('book-preview', require('./components/BookPreview'));
Vue.component('book-preview-mobile', require('./components/BookPreviewMobile'));
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('star-rating', StarRating);

const app = new Vue({
    el: '#app',
    data:{
        
    },
    methods:{

    }

})