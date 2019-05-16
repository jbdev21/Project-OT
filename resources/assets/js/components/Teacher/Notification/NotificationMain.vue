<template>
     <li role="presentation" class="dropdown">
        <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-bell"></i>
        <span class="badge bg-green" v-show="unread > 0" >{{ unread }}</span>
        </a>
        <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
        <notification-list  v-for="notification in notifications" :notification="notification" :key="notification.id"></notification-list>
        <li>
            <div class="text-center">
            <a :href="notificationurl">
                <strong>See All Alerts</strong>
                <i class="fa fa-angle-right"></i>
            </a>
            </div>
        </li>
        </ul>
    </li>
</template>
<script>
export default {
    data(){
        return {
            notifications:[],
            notificationurl: baseUrl + '/teacher/notifications',
            unread:0
        }
    },
    created()
    {
        this.getNoti()
        this.getUnread()
        Echo.private("App.Admin." + userLogged.id)
            .notification((notification) => {
                this.toaser(notification)
                this.addToList(notification)
                addtabNoti()
            });
       
    },
    methods:{
        toaser(notification) {
            this.$toastr('add', {
                title: notification.title, // Toast Title
                msg: notification.message,
                clickClose: true, // Click Close Disable
                timeout: 900000, // Timeout in ms
                position: 'toast-bottom-right', // Toastr position
                type: 'info', // Toastr type
            })
        },
        getNoti()
        {
            axios.get(baseUrl + '/teacher/api/notification')
            .then( response => {
                this.notifications = response.data
            })
            .catch( error => {
                console.log(error)
            })
        },
        getUnread()
        {
            axios.get(baseUrl + '/teacher/api/unreadnotification')
            .then( response => {
                this.unread = response.data
            })
            .catch( error => {
                console.log(error)
            })
        },
        addToList(notification)
        {
            this.unread++;
            var newNoti = {
                read_at: null,
                id: notification.id,
                created_at: this.date_format(),
                data: {
                    message: notification.message,   
                    title: notification.title,
                    item_id: notification.id,
                    url: notification.url
                },
            }
            this.notifications.unshift(newNoti)

            if(this.notifications.length > 7)
            {
                this.notifications.pop()
            }
        },
        date_format()
            {   
                var date = new Date()
                var hours = date.getHours();
                var minutes = date.getMinutes();
                var sec = date.getSeconds();
              //  var ampm = hours >= 12 ? 'PM' : 'AM';
                hours = hours % 12;
                hours = hours ? hours : 12; // the hour '0' should be '12'
                minutes = minutes < 10 ? '0'+minutes : minutes;
                var strTime = hours + ':' + minutes + ':' + sec;
                return date.getFullYear() + "-" + ("0" + (date.getMonth() + 1)).slice(-2) + "-" + ("0" + (date.getDate() + 1)).slice(-2) + " " + strTime;

            }
    }
}
</script>

