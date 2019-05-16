<template>
     <div class="row">
        <div class="col-sm-4" style="border-right:1px solid #ccc" >
            <div class="padding-md">
                <form :action="url" method="post" id="submission_form">
                    <input type="hidden" name="class_id" value="classid">
                    <label>{{ trans('label.days') }}</label><br>
                    <select class="form-control select" name="dates[]" multiple="multiple" style="width: 100%">
                        <option v-for="date_item in date_list" :key="date_item.id" :disabled="date_item.status != 'ready' || date_item.sub_id != null" :value="date_item.id">{{ date_format(date_item.date_time) }}</option>
                    </select>
                    <br>
                    <br>
                    <label>{{ trans('label.teachers') }}</label><br>
                    <select class="form-control"  name="teacher_id" style="width: 100%" required>
                        <option  value="">- {{ trans('label.select_teacher') }} -</option>
                        <option v-for="teacher in teachers" :key="teacher.id" :value="teacher.id"> {{  teacher.name }}</option>
                    </select>
                    <br>
                    <button type="submit" class="btn btn-primary">{{ trans('button.save') }}</button>
                </form>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="padding-md">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th width="25%"> {{ trans('label.date') }}</th>
                        <th> {{ trans('label.teacher') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(submission, index) in submissions" :key="submission.id">
                            <td width="40%">
                                {{ date_format(submission.date_time) }}
                            </td>
                            <td>
                                {{ submission.teacher }}
                            </td>
                            <td align="right">
                                <button class="btn btn-sm btn-default"  @click="cancelsub(submission.id, index)" ><i class="fa fa-remove"></i> {{ trans('button.cancel') }}</button> 
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
     </div>
</template>
<script>
export default {
    props:[
        'classid',
        'url'
    ],
    data(){
        return {
            date_list: '',
            teachers: '',
            submissions: {},
        }
    },
    mounted()
    {
        this.getSession();
        this.getTeachers();
        this.getSubmission();

        $('#submission_form').submit( e => {
            e.preventDefault();
            data =  $('#submission_form').serialize();
            axios.post(baseUrl + '/admin/classer/submission', 
                data
            )
            .then( response =>{
                this.getSession();
                this.getSubmission();
            })
            .catch( error => {
                console.log(error)
            })
        })
    },
    methods:{
        getSession()
        {
            this.date_list = ""
            axios.get(baseUrl + "/admin/api/sessions_submission/" + this.classid)
            .then( response =>{
                this.date_list = response.data
            })
            .catch( error => {
                console.log(error)
            })

        },
        getTeachers()
        {
            this.teachers = ""
            axios.post(baseUrl + "/admin/api/teachers")
            .then( response =>{
                this.teachers = response.data
            })
            .catch( error => {
                console.log(error)
            })
        },
        getSubmission()
        {
            this.submissions = ""
            axios.post(baseUrl + "/admin/api/submission/" + this.classid)
            .then( response =>{
                this.submissions = response.data
            })
            .catch( error => {
                console.log(error)
            })
        },
        cancelsub(id, index)
        {
            if(confirm("수강연기를 취소하겠습니까?")){
                axios.post(baseUrl + '/admin/classer/cancelsubmission/' + id)
                .then( response => {
                    this.submissions.splice(index, 1); 
                    this.getSession();
                })
                .catch( error => {
                    console.log(error)
                })
            }
        },

        date_format(date_string)
        {   
            var weekdays = new Array(7);
            weekdays[0] = '일';
            weekdays[1] = '월';
            weekdays[2] = '화';
            weekdays[3] = '수';
            weekdays[4] = '목';
            weekdays[5] = '금';
            weekdays[6] = '금';

            var date = new Date(date_string)
            var hours = date.getHours();
            var minutes = date.getMinutes();
            var ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            minutes = minutes < 10 ? '0'+minutes : minutes;
            var strTime = hours + ':' + minutes + ' ' + ampm;
            return date.getFullYear() + "-" + ("0" + (date.getMonth() + 1)).slice(-2) + "-" + ("0" + (date.getDate())).slice(-2)+ " " + weekdays[date.getDay()] + " " + strTime;

        },
    }
}
</script>
<style>
    .padding-md{
        padding:10px;
    }
</style>

