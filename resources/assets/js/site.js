require('./bootstrap');

Vue.prototype.trans = string => _.get(window.i18n, string);

import Vue from 'vue'
Vue.component('reset-password', require('./components/PasswordReset'));
Vue.component('youtube-audio-player', require('./components/youtubeAudioPlayer'));


const app = new Vue({
    el: '#app',
    data: {
        
    },
    methods: {

    }

})
