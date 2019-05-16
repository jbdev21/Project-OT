<template>
    <tr>
        <td>{{ trans('label.' + log.type) }}</td>
        <td>{{ log.content }}</td>
        <td>
            <span v-show="!isEdit">
                <i @click="isEdit = !isEdit" class="fa fa-pencil"></i> &nbsp;
                {{ log.note }} 
            </span>
            <span v-show="isEdit">
                <input type="text" v-model="text" style="padding:3px">
                <button @click="save" class="btn  btn-primary">{{ trans('button.save')}}</button> 
                <button @click="isEdit = !isEdit" class="btn  btn-default">{{ trans('button.cancel') }}</button>
            </span>
        </td>
        <td>{{ log.created_at }}</td>
        <td><button @click="deleteLog" class="btn btn-xs btn-default">X</button></td>
    </tr>
</template>
<script>
export default {
    props:['log', 'classid'],
    data(){
        return {
            isEdit: false,
            text: this.log.note
        }
    },
    methods:{
        save()
        {
            axios.post(baseUrl + '/admin/api/class/log/update/' + this.classid + '/' + this.log.id, {
                    note: this.text
                })
                .then( (response) =>{
                        this.log.note = this.text,
                        this.isEdit = !this.isEdit
                })
                .catch( (error) => {
                    console.log(error)
                })
          
        },
        deleteLog(){
            if(confirm( "삭제하시겠습니까?" ))
                {
                axios.post(baseUrl + '/admin/api/class/log/delete/' + this.classid + '/' + this.log.id)
                    .then( (response) =>{
                        this.$emit('log-delete', this.log)
                    })
                    .catch( (error) => {
                        console.log(error)
                    })
            }
        }
    }
}
</script>
