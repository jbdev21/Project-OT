<template>
    <li>
        <a :href="notification.data.url + '?read=' + notification.id">
        <span>
            <i class="fa fa-circle green" v-show="notification.read_at == null"  style="position:absolute; top:-3px; left:0px;"></i><span>{{ notification.data.title }}</span>
            <span class="time" style="font-size:9px;">{{ notification.created_at }}</span>
        </span>
         <!-- <span class="message">
            {{ notification.data.message }}
        </span> -->
        </a>
    </li>
</template>
<script>
export default {
    props:['notification'],
    data(){
        return {
            url: '',
            NOTIFICATION_TYPES: {
                    newclass: 'App\\Notifications\\Admin\\NewClassNotification',
                    newinquiry: 'App\\Notifications\\Admin\\NewInquiryNotification',
                    newleveltest: 'App\\Notifications\\Admin\\NewLevelTestNotification',
                    newproofreading: 'App\\Notifications\\Admin\\NewProofReadingNotification',
                    postponed: 'App\\Notifications\\Admin\\PostponedNotification'
                }
        }
    },
    created(){
            if(this.notification.type === this.NOTIFICATION_TYPES.newclass){

                this.url = baseUrl + '/admin/class/new?read=' + this.notification.id
            
            }else if(this.notification.type === this.NOTIFICATION_TYPES.newinquiry){

                this.url = baseUrl + '/admin/inquiry/' + this.notification.data.item_id + '?read=' + this.notification.id

            }else if(this.notification.type === this.NOTIFICATION_TYPES.newleveltest){

                this.url = baseUrl + '/admin/leveltest/new?read=' + this.notification.id

            }else if(this.notification.type === this.NOTIFICATION_TYPES.newproofreading){

                this.url = baseUrl + '/admin/proofreading/new?read=' + this.notification.id

            }else if(this.notification.type === this.NOTIFICATION_TYPES.postponed){

                this.url = baseUrl + '/admin/class/postponed?id=' + this.notification.data.announcement_id + '&read=' + this.notification.id
            
            }
        }
}
</script>
