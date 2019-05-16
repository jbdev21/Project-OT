/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import VueToastr from '@deveodk/vue-toastr'
// You need a specific loader for CSS files like https://github.com/webpack/css-loader
// If you would like custom styling of the toastr the css file can be replaced
import '@deveodk/vue-toastr/dist/@deveodk/vue-toastr.css'
import StarRating from 'vue-star-rating'

Vue.use(VueToastr)
Vue.component('book-manager', require('./components/Teacher/Book/BookManager'));
Vue.component('session-correction', require('./components/Teacher/Correction'));
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('notification', require('./components/Teacher/Notification/NotificationMain'));
Vue.component('notification-list', require('./components/Teacher/Notification/NotificationList'));
Vue.component('star-rating', StarRating);

const app = new Vue({
    el: '#app',
    data: {
        newClass: '',
        newLeveltest: '',
        newSubClass: '',
        newProofReading: '',
        newMessage: '',
    },
    computed: {
        total_badge() {
            return this.newClass +  this.newSubClass
        }
    },
    created() {
       
        // Echo.private("App.Admin." + userLogged.id)
        // .notification((notification) => {
        //     this.toaser(notification.message)
        //     //this.$toastr('info', notification.message, 'Notification')
        //     //this.$toaster.info()
        // });
        
    
        // Echo.channel("system")
        // .listen("FireEvent", (e) => {
        //     this.toaser(e.message)
        // });
            
        

        axios.get(baseUrl + '/teacher/get_sub_class')
            .then((response) => {
                this.newSubClass = response.data
            })
            .catch((error) => {
                console.log(error)
            })

        axios.get(baseUrl + '/teacher/get_new_class')
            .then((response) => {
                this.newClass = response.data
            })
            .catch((error) => {
                console.log(error)
            })

        axios.get(baseUrl + '/teacher/get_leveltest')
            .then((response) => {
                this.newLeveltest = response.data
            })
            .catch((error) => {
                console.log(error)
            })

        axios.get(baseUrl + '/teacher/get_proofreading')
            .then((response) => {
                this.newProofReading = response.data
            })
            .catch((error) => {
                console.log(error)
            })

        axios.get(baseUrl + '/teacher/get_message')
            .then((response) => {
                this.newMessage = response.data
            })
            .catch((error) => {
                console.log(error)
            })

        setInterval(() => {

            axios.get(baseUrl + '/teacher/get_sub_class')
                .then((response) => {
                    this.newClass = response.data
                })
                .catch((error) => {
                    console.log(error)
                })

            axios.get(baseUrl + '/teacher/get_new_class')
                .then((response) => {
                    this.newClass = response.data
                })
                .catch((error) => {
                    console.log(error)
                })

            axios.get(baseUrl + '/teacher/get_leveltest')
                .then((response) => {
                    this.newLeveltest = response.data
                })
                .catch((error) => {
                    console.log(error)
                })

            axios.get(baseUrl + '/teacher/get_proofreading')
                .then((response) => {
                    this.newProofReading = response.data
                })
                .catch((error) => {
                    console.log(error)
                })

            axios.get(baseUrl + '/teacher/get_message')
                .then((response) => {
                    this.newMessage = response.data
                })
                .catch((error) => {
                    console.log(error)
                })

        }, 10000)

    },
    methods: {
        toaser(message)
        {
            this.$toastr('add', {
                title: 'Notification', // Toast Title
                msg: message,
                clickClose: false, // Click Close Disable
                timeout: 900000, // Timeout in ms
                position: 'toast-bottom-right', // Toastr position
                type: 'info', // Toastr type
                closeOnHover: false, // On mouse over stop timeout can be boolean; default true
            })
        }
        //get new class with inteval
        // get_new_class(){
        // 	setInterval(function(){
        //            //console.log('geting new class')
        // 		axios.get(baseUrl + '/admin/get_new_class')
        //            .then( (response) => {
        //                this.newClass = response.data
        //            })
        //            .catch( (error) => {
        //                console.log(error)
        //            })
        // 	},10000);
        // },

        //    //get new leveltest with interval
        //    get_new_leveltest(){
        //        setInterval(function(){
        //           // console.log('geting new leveltest')
        //            axios.get(baseUrl + '/admin/get_new_leveltest')
        //            .then( (response) => {
        //                this.newLeveltest = response.data
        //            })
        //            .catch( (error) => {
        //                console.log(error)
        //            })
        //        },10000);
        //    },

        //    //get failedbraincertRequest with interval
        //    get_failedBraincertRequest(){
        //        setInterval(function(){
        //            //console.log('geting new failed')
        //            axios.get(baseUrl + '/admin/failedBraincertRequest')
        //            .then( (response) => {
        //                this.failedBraincertRequest = response.data
        //            })
        //            .catch( (error) => {
        //                console.log(error)
        //            })
        //        },10000);
        //    }

    }
});
