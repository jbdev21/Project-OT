
window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

window.$ = window.jQuery = require('jquery');


require('bootstrap-sass');


/**
 * Vue is a modern JavaScript library for building interactive web interfaces
 * using reactive data binding and reusable components. Vue's API is clean
 * and simple, leaving you to focus on building your next great project.
 */

window.Vue = require('vue');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
require('es6-promise').polyfill();
require('select2');
require('toastr');


window.axios = require('axios');

window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest'
};


import Echo from "laravel-echo"
window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    authEndpoint: baseUrl + "/broadcasting/auth",
    key: '3f96153fbeb4975d15d5',
    cluster: 'ap1',
    encrypted: true
});

