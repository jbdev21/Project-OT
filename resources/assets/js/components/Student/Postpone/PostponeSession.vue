<template>
    <div class="row">
         <div class="col-sm-4" >
            <form :action="url" method="post" id="postponed_frm">
                <!-- <label for="">{{ trans('label.dates') }} ( {{ credits }} {{ trans('label.credits')}})</label> -->
                <!-- <vue-select class="vue-select1" name="select1" :options="date_list" :model.sync="dates">
                </vue-select> -->
                <label>수강연기 날짜선택</label>
                <select class="form-control select" name="dates[]" multiple="multiple" style="width: 100%">
                    <option :selected="date_item.selected" v-for="date_item in sessions" :key="date_item.id" :disabled="date_item.status != 'ready'" :value="date_item.id">{{date_item.date_time }}</option>
                </select>
                <br>
                 <label>{{ trans('label.reason')}} <small><i>{{ trans('label.optional') }}</i></small></label>
                <textarea name="reason" id="" rows="5" class="form-control"></textarea>
                <br>
                <button :disabled="currentCredits < 1" class="btn-primary btn" type="submit"> {{  trans('button.submit')}} </button>
            </form>
         </div>
         <div class="col-sm-8 ">
             <label> {{ trans('label.postponed_sessions') }} &nbsp;   
                    <small>(연기된 수업은 보강제공으로 수강일이 자동연장 됩니다)</small>
            </label>
            <table class="table">
                <thead>
                    <tr>
                        <th width="100px;">{{ trans('label.date') }}</th>
                        <th>{{ trans('label.reason') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(postponed, index) in postponed_sessions" :key="postponed.id">
                        <td width="250px">{{ postponed.date_time }}</td>
                        <td>{{ postponed.reason }}</td>
                        <td>
                          <!--   <button v-show="postponed.postponed_apply == 'student'" @click="removePostpone(postponed.id, index)" class="btn btn-sm btn-light"><i class="fa fa-remove"></i> {{ trans('button.cancel') }}</button> -->
                        </td>
                    </tr>
                </tbody>
            </table>
         </div>
    </div>
</template>

<script>
export default {
    props:[
        'cid',
        'credits',
        'today'
    ],
    data(){
        return {
            sessions:{},
            postponed_sessions:{},
            currentCredits : this.credits
        }
    },
    computed:
    {
        url(){
            return baseUrl + '/dashboard/classer/postpone/' + this.cid;
        },
    },
    mounted()
    {   
        this.getSession();
        this.getPostponed();

        $('.select').select2({
            maximumSelectionLength: this.currentCredits,
            language: "ko",
        })

        $('#postponed_frm').submit( e => {
            e.preventDefault();
            var data = $('#postponed_frm').serialize();
            axios.put(this.url, data)
                .then( response =>{
                    this.currentCredits = response.data
                   // console.log(this.currentCredits)
                     $('.select').select2({
                        maximumSelectionLength: response.data,
                        language: "ko",
                    })
                    this.getSession();
                    this.getPostponed();
                })
                .catch( error => {
                    console.log(error)
                })
        })
    },
    methods:{
        getSession()
        {
            this.sessions = "",
            axios.post( baseUrl + '/dashboard/api/classsessions/' + this.cid)
                .then( response => {
                    this.sessions = response.data
                })
                .catch( error => {
                    console.log(error)
                })
        },

        getPostponed()
        {
            this.postponed_sessions = "",
            axios.post( baseUrl + '/dashboard/api/postponed/' + this.cid)
                .then( response => {
                    this.postponed_sessions = response.data
                })
                .catch( error => {
                    console.log(error)
                })
        },

        removePostpone(id, index)
        {
             if(confirm("수강연기를 취소하겠습니까?")){
                axios.post(baseUrl + '/dashboard/classer/cancelpostpone/' + id, {
                    id: id
                })
                .then( response => {
                    this.postponed_sessions.splice(index, 1);
                    this.currentCredits = response.data

                     $('.select').select2({
                        maximumSelectionLength: response.data,
                        language: "ko",
                    })
            
                    this.getSession()
                    this.$emit('submitpostpone')
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
