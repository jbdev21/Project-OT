require('./bootstrap');


import Vue from 'vue'
import Editor from '@tinymce/tinymce-vue';
import vSelect from 'vue-select';

import VueToastr from '@deveodk/vue-toastr'

Vue.prototype.trans = string => _.get(window.i18n, string);


import '@deveodk/vue-toastr/dist/@deveodk/vue-toastr.css'

Vue.use(VueToastr)

Vue.component('example', require('./components/Example.vue'));
Vue.component('createclass', require('./components/CreateClassComponent.vue'));
Vue.component('createcoupon', require('./components/CreateCouponComponent.vue'));

// Admin Components
Vue.component('class-show-list', require('./components/Admin/Class/ClassShowList.vue'));
Vue.component('class-show-list-mobile', require('./components/Admin/Class/Mobile/ClassShowList.vue'));
Vue.component('class-list-info', require('./components/Admin/Class/ClassListInfo.vue'));
Vue.component('class-list-info-mobile', require('./components/Admin/Class/Mobile/ClassListInfo.vue'));
Vue.component('class-show', require('./components/Admin/Class/ClassShow.vue'));
Vue.component('class-show-mobile', require('./components/Admin/Class/Mobile/ClassShow.vue'));
Vue.component('class-book', require('./components/Admin/Class/ClassBook.vue'));
Vue.component('class-book-mobile', require('./components/Admin/Class/Mobile/ClassBook.vue'));
Vue.component('mistake', require('./components/Admin/Class/Mistake.vue'));
Vue.component('notification', require('./components/Admin/Notification/NotificationMain'));
Vue.component('notification-list', require('./components/Admin/Notification/NotificationList'));

///class logs
Vue.component('log-tr', require('./components/Admin/Class/logTr'));


Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('vue-select', vSelect)
Vue.component('editor', Editor);

//for badges
Vue.component('class-badge', require('./components/Admin/Notification/Badges/Class'));
Vue.component('class-general-badge', require('./components/Admin/Notification/Badges/ClassGeneral'));
Vue.component('inquiry-badge', require('./components/Admin/Notification/Badges/Inquiry'));
Vue.component('leveltest-badge', require('./components/Admin/Notification/Badges/LevelTest'));
Vue.component('new-message-badge', require('./components/Admin/Notification/Badges/NewMessage'));
Vue.component('postponed-badge', require('./components/Admin/Notification/Badges/Postponed'));
Vue.component('proofreading-badge', require('./components/Admin/Notification/Badges/ProofReading'));
Vue.component('proofreading-noreplay-badge', require('./components/Admin/Notification/Badges/ProofReadingNoReply'));
Vue.component('student-menu-badge', require('./components/Admin/Notification/Badges/StudentMenuBadge'));

//book
Vue.component('book-preview', require('./components/BookPreview'));
Vue.component('book-preview-mobile-admin', require('./components/BookPreviewMobileAdmin'));

//for postpone Class
Vue.component('postponed-manager', require('./components/Admin/Postpone/PostponeManager'));
Vue.component('postponed-manager-mobile', require('./components/Admin/Postpone/PostponeManagerMobile'));

//for Submission Class
Vue.component('submission', require('./components/Admin/Submission/Submission'));

const app = new Vue({
    el: '#app',
    data:{
    	newClass: '',
    	newLeveltest: '',
    	newLeveltestpending: '',
    	newLeveltestAll: '',
        failedBraincertRequest: '',
        newProofReading: 0,
        newInquiry: 0,
        newTestimonial: 0,
    },
    
    computed:{
        class_badge()
        {
            return this.newClass
        }
    },
    created(){
        //this.$toaster.info("Haha")
        this.getbadges();
        Echo.private("App.Admin." + userLogged.id)
            .notification((notification) => {
                if (notification.type === "App\\Notifications\\Admin\\NewInquiryNotification") {
                    this.newInquiry++
                }

                if (notification.type === "App\\Notifications\\Admin\\NewTestimonialNotification") {
                    this.newTestimonial++
                }

            });
    },
    methods:{
        getbadges()
        {
            axios.get(baseUrl + '/admin/getclass')
                 .then((response) => {
                    this.newClass = response.data
                 })
                 .catch((error) => {
                     console.log(error)
                 })

             axios.get(baseUrl + '/admin/getleveltest')
                 .then((response) => {
                     this.newLeveltest = response.data
                 })
                 .catch((error) => {
                     console.log(error)
                 })
             axios.get(baseUrl + '/admin/getleveltestpending')
                 .then((response) => {
                     this.newLeveltestpending = response.data
                 })
                 .catch((error) => {
                     console.log(error)
                 })

             axios.get(baseUrl + '/admin/getleveltestoverall')
                 .then((response) => {
                     this.newLeveltestAll = response.data
                 })
                 .catch((error) => {
                     console.log(error)
                 })

             axios.get(baseUrl + '/admin/getinquiry')
                 .then((response) => {
                     this.newInquiry = response.data
                 })
                 .catch((error) => {
                     console.log(error)
                 })

            //  axios.get(baseUrl + '/admin/getproofreading')
            //      .then((response) => {
            //         this.newProofReading + response.data
            //      })
            //      .catch((error) => {
            //          console.log(error)
            //      })

            // axios.get(baseUrl + '/admin/getunrepliedproofReading')
            //     .then((response) => {
            //         this.newProofReading + response.data
            //     })
            //     .catch((error) => {
            //         console.log(error)
            //     })

            axios.get(baseUrl + '/admin/gettestimonial')
                .then((response) => {
                    this.newTestimonial = response.data
                })
                .catch((error) => {
                    console.log(error)
                })
        }
    }
});
