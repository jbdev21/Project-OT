<template>
    <div>
        <div v-show="isNew">
            <label>Mistake</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-ban"></i></span>
                <input type="text" name="mistake_body" v-model="mistake_text" class="form-control" required>
                <input type="hidden" name="class_session_id" id="class_session_id" required>
            </div>
            <label>Correction</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-check"></i></span>
                <input type="text" name="correction" v-model="correction_text" class="form-control" required>
            </div>
            <button @click.prevent="save" :disabled="correction_text.length < 1 && mistake_text.length < 1" class="btn btn-primary" id="btn-save">Save</button>
        </div>
        <div  v-show="!isNew">
            <label>Edit Mistake</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-ban"></i></span>
                <input type="text" name="mistake_body" v-model="selectedCorrection.mistake_body" class="form-control" required>
                <input type="hidden" name="class_session_id" id="class_session_id" required>
            </div>
            <label>Edit Correction</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-check"></i></span>
                <input type="text" name="correction" v-model="selectedCorrection.correction" class="form-control" required>
            </div>
            <button @click.prevent="saveUpdate" class="btn btn-primary" id="btn-save">Save Changes</button>
            <button type="button" class="btn btn-danger" @click="isNew = true" data-dismiss="modal">Cancel</button>
        </div>
        
        <hr>
        <div class="mistake_list" v-show="isNew">
            <div class="mistakes" v-for="correction in corrections" :key="correction.id"> 
                <div class="well" style="padding:5px">
                    <span class="wrong text-danger"><i class="fa fa-ban"></i> {{ correction.mistake_body }}</span><br>
                    <span class="correct text-success"><i class="fa fa-check"></i> {{ correction.correction }}</span>
                    <br>
                    <div class="pull-right">
                        <small>
                            <a href="#" type="button" @click="edit(correction)" ><i class="fa fa-pencil"></i></a> &nbsp;&nbsp;
                            <a href="#" type="button" @click="del(correction)" ><i class="fa fa-trash"></i></a>
                        </small>
                    </div>
                     <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:['session_id'],
    data(){
        return {
            mistake_text:'',
            correction_text:'',
            corrections:[],
            isNew: true,
            selectedCorrection:{}
        }
    },
    created()
    {
        this.getAll()
    },
    
    methods:{
        getAll()
        {
            axios.get(baseUrl + '/teacher/api/session/correction/all/' + this.session_id)
                .then( response => {
                    this.corrections = response.data
                })
                .catch(  error => {
                    console.log(error)
                })
        },
        save()
        {
            if(this.correction_text.length > 0 && this.mistake_text.length > 0)
            {
                axios.post(baseUrl + '/teacher/api/session/correction/store', {
                    session_id: this.session_id,
                    mistake: this.mistake_text,
                    correction: this.correction_text
                })
                .then( (response) =>{
                    this.corrections.unshift(response.data);
                    this.correction_text = ''
                    this.mistake_text = ''
                })  
                .catch( (error) => {
                    console.log(error)
                })
            }else{
                alert("Please supply all fields");
            }
        },
        saveUpdate()
        {
             if(this.selectedCorrection.mistake_body.length > 0 && this.selectedCorrection.correction.length > 0)
            {
                axios.put(baseUrl + '/teacher/api/session/correction/update', {
                    session_id: this.selectedCorrection.id,
                    mistake: this.selectedCorrection.mistake_body,
                    correction: this.selectedCorrection.correction
                })
                .then( (response) =>{
                    this.getAll()
                    this.isNew = true
                    
                    // this.corrections.unshift(response.data);
                    this.correction_text = ''
                    this.mistake_text = ''
                })  
                .catch( (error) => {
                    console.log(error)
                })
            }else{
                alert("Please supply all fields");
            }
        },
        edit(correction)
        {
            this.isNew = false;
            this.selectedCorrection = correction
            console.log(this.selectedCorrection)
        },
        del(correction)
        {
            if(confirm("Are you sure to delete?"))
            {
                 axios.post(baseUrl + '/teacher/api/session/correction/delete/' + correction.id)
                 .then( (response) => {
                     this.corrections.splice(correction, 1);
                 })
                 .catch( (error) => {
                     console.log(error)
                 })
            }
        },

    }   
}
</script>
