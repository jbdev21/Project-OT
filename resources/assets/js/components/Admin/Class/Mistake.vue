<template>
    <div>
        <div class="well" style="padding:10px; position:relative" v-for="(mistake, index) in mistakes" :key="mistake.id">
            <a href="#" style="position:absolute; right:5px; top:2px;" @click.prevent="deleteMistake(index, mistake.id)"><i class="fa fa-remove"></i></a>
           <span class="text-danger">
               <i class="fa fa-remove"></i> {{ mistake.mistake_body }}
           </span><br>
           <span class="text-success">
               <i class="fa fa-check"></i> {{ mistake.correction }}
           </span>
        </div>
    </div>
</template>

<script>
export default {
    props:['session'],
    data (){
        return {
            mistakes: {}
        }
    },
    created()
    {
        axios.post(baseUrl +  '/admin/api/mistake/' + this.session)
            .then( response => {
                this.mistakes = response.data;
            })
    },
    methods:{
        deleteMistake(index, id)
        {
            if(confirm("Are you want to Delete?"))
            {
                axios.post(baseUrl +  '/admin/api/mistake/delete/' + id)
                .then( response => {
                    this.mistakes.splice(index, 1); 
                })
                .catch(error =>{
                    console.log(error)
                })
            }
        }
    },
    watch:{
        session(){
            axios.post(baseUrl +  '/admin/api/mistake/' + this.session)
            .then( response => {
                this.mistakes = response.data;
            }) 
        }
    }
}
</script>

