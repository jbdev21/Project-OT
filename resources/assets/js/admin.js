require('./bootstrap');

Vue.component('example', require('./components/Example.vue'));
Vue.component('createclass', require('./components/CreateClassComponent.vue'));


const app = new Vue({
    el: '#app',
    data:{
    	newClass: '',
    	newLeveltest: '',
		failedBraincertRequest: '',
		newMessage: ''
    },
    created(){
    	
    	

    	axios.get(baseUrl + '/admin/get_new_class')
			.then( (response) => {
				this.newClass = response.data
			})
			.catch( (error) => {
				console.log(error)
			})


		axios.get(baseUrl + '/admin/get_message')
			.then((response) => {
				this.newMessage = response.data
			})
			.catch((error) => {
				console.log(error)
			})
        //this.get_new_class()

		//get new leveltest
		axios.get(baseUrl + '/admin/get_new_leveltest')
			.then( (response) => {
				this.newLeveltest = response.data
			})
			.catch( (error) => {
				console.log(error)
			})

       // this.get_new_leveltest()    
            
		//get failed braincert request
		axios.get(baseUrl + '/admin/failedBraincertRequest')
			.then( (response) => {
				this.failedBraincertRequest = response.data
			})
			.catch( (error) => {
				console.log(error)
			})


    },
    methods:{
       

    }
});
