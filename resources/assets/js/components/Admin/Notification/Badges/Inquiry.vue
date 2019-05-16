<template>
    <span v-show="count > 0" class="badge bg-green">
        {{ count }}
    </span>
</template>
<script>
export default {
    data()
    {
        return{
            count: 0
        }
    },
    created(){
         Echo.private("App.Admin." + userLogged.id)
            .notification((notification) => {
                  if(notification.type === "App\\Notifications\\Admin\\NewInquiryNotification" ){
                      this.count++
                  }
                  
                  if(notification.type === "App\\Notifications\\Admin\\NewTestimonialNotification")
                  {
                      this.count++
                  }
                  
            });  
        
         axios.get(baseUrl + '/admin/getinquiry')
                 .then((response) => {
                     this.count = response.data
                 })
                 .catch((error) => {
                     console.log(error)
                 })
        
        axios.get(baseUrl + '/admin/gettestimonial')
                 .then((response) => {
                     this.count = response.data
                 })
                 .catch((error) => {
                     console.log(error)
                 })
    },
}
</script>
