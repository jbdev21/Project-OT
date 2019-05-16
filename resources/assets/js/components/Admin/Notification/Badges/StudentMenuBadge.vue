<template>
    <span  v-show="count > 0" class="badge bg-green">
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
                  if(notification.type === "App\\Notifications\\Admin\\NewProofReadingNotification"){
                      this.count + 2
                  }
            });
        
         Echo.private("App.Admin." + userLogged.id)
            .notification((notification) => {
                  if(notification.type === "App\\Notifications\\MessageNotification"){
                      this.count + 2
                  }
            });  
        
         axios.get(baseUrl + '/admin/getunrepliedproofReading')
                 .then((response) => {
                     this.count += response.data
                 })
                 .catch((error) => {
                     console.log(error)
                 })

         axios.get(baseUrl + '/admin/getproofreading')
                 .then((response) => {
                     this.count += response.data
                 })
                 .catch((error) => {
                     console.log(error)
                 })

         axios.get(baseUrl + '/admin/get_message')
                 .then((response) => {
                     this.count += response.data
                 })
                 .catch((error) => {
                     console.log(error)
                 })
    },
}
</script>
