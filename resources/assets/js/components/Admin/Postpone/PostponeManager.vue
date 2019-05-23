<template>
    <div class="row">
        <div class="col-sm-4" style="border-right:1px solid #ccc">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#date" aria-controls="date" @click="type = 'date'" role="tab" data-toggle="tab" id="tab-date-btn">{{ trans('label.dates') }}</a></li>
                <li role="presentation"><a href="#range" aria-controls="range" role="tab" @click="type = 'range'" data-toggle="tab"  id="tab-range-btn" >{{ trans('label.date_range') }} </a></li>
            </ul>
            <form action="#" id="form1" method="post">
                <input type="hidden" name="_method" value="PUT">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="date">
                            <label for="">{{ trans('label.dates') }}</label>
                            <!-- <vue-select class="vue-select1" name="select1" :options="date_list" :model.sync="dates">
                            </vue-select> -->
                            <select class="form-control select" name="dates[]" multiple style="width: 100%">
                                <option :selected="date_item.selected" v-for="date_item in date_list" :key="date_item.id"  :value="date_item.id">{{ date_format(date_item.date_time) }}</option>
                            </select>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="range">
                        <label>{{  trans('label.date_range') }}</label><br>
                        <input type="text" style="width: 100%"  name="range" id="reservation" class="form-control"  />
                    </div>
                </div>
                <div class="padding-md">
                    <br>
                    <input type="hidden" :value="type"  name="type" >
                     <label>{{ trans('label.reason') }} <small>선택사항 (10자이내)</small></label>
                    <textarea maxlength="30" name="reason" class="form-control" style="resize: none;" rows="5"></textarea>
                    <br>
                    <label>{{ trans('label.postponed_credits') }}</label>
                    <br>
                    <label>
                        <input type="radio" value="1" name="deduction" checked> Yes <br>
                        <input type="radio" value="0" name="deduction"> No
                        <!-- <select name="deduction" id="">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select> -->
                        <!-- <input type="checkbox" name="deduction" value="1" v-model="deduction" checked > {{ trans('label.yes') }} -->
                    </label>
                    <br>
                    <br>
                    <button type="button" @click="formSubmit" class="btn btn-primary">{{ trans('button.submit') }}</button>
                </div>
            </form>
        </div>
        <div class="col-sm-8">
            <div class="padding-md">
                <div class="alert alert-info" style="padding:5px; color:black">
                    <span v-show="!editPostponed">
                        <h2>
                            {{used_credits}}/{{allcredits}} 회  &nbsp;&nbsp; <i class="fa fa-pencil" @click="editPostponed = !editPostponed"></i>
                        </h2>
                    </span>
                    <span v-show="editPostponed">
                        <input type="number" value="" v-model="allcredits" style="padding:3px">
                        <button @click="saveCredit" class="btn btn-primary btn-sm">{{ trans('button.save') }}</button>
                        <button  @click="editPostponed = !editPostponed" class="btn btn-default btn-sm">{{ trans('button.cancel') }}</button>
                    </span>
                </div>
                <div style="margin:0px" class="text-right">
                    <button class="btn btn-default btn-sm pull-left" @click="getPostponeClass"><i class="fa fa-refresh"></i></button>
                    <pagination :data="postponed_sessions" @pagination-change-page="getPostponeClass" :limit="1"></pagination>
                </div>
                <table class="table table-hover" style="font-size:11px">
                    <thead>
                    <tr>
                        <th width="25%">연기된 날짜</th>
                        <th align="left">{{ trans('label.credits') }}</th>
                        <th>{{ trans('label.reason') }}</th>
                        <th >신청일자</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(postponed_session, index) in postponed_sessions.data" :key="postponed_session.id">   
                            <td>{{ date_format(postponed_session.date_time) }}</td>   
                            <td align="center"><i class="fa fa-check" v-show="postponed_session.postponed_deduction"></i></td>   
                            <td>{{ postponed_session.reason }}</td>   
                            <td>{{ postponed_session.postponed_timestamp }}</td>   
                            <td>{{ postponed_session.postponed_apply }}</td>   
                            <td><button type="button" @click="cancelPostpone(postponed_session.id, index); " class="btn btn-xs btn-default"><i class="fa fa-remove"></i> {{ trans('button.cancel') }}</button></td>   
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
        'rangedefault',
        'credits',
        'postponed_credits'
        ],
    data()
    {
        return {
            date_list:[],
            postponed_sessions: {},
            is_daterange:false,
            dates: [],
            reason:'',
            deduction: "1",
            type: 'date',
            endpoint: baseUrl + '/admin/classer/postpone/' + this.classid,
            
            used_credits: '',
            allcredits: '',
            editPostponed: false
        }
    },
    created()
    {
        this.getSession();
        this.getPostponeClass();
        this.getCredits()
    },
    methods:{
        formSubmit()
        {
            var form = $('#form1').serialize();
           
            axios.put(this.endpoint, form)
                .then( (response) => {
       //             console.log(response.data)
                    this.getCredits();
                    this.getPostponeClass();
                    this.getSession();
                    $('.select').val(null).trigger('change');
                    $('#form1').trigger("reset")
                    this.$emit('submitpostpone')
                })
                .catch( (error) => {
                    console.log(error)
                })

        },

        getCredits()
        {
            axios.get(baseUrl + '/admin/api/class/credits/' + this.classid)
                .then(( response ) => {
                    this.used_credits = response.data.used
                    this.allcredits = response.data.current
                    // this.all_credits = response.data.all,
                    // this.remaining_in_class = response.data.remaining_in_class
                })
                .catch(( error ) => {

                })
        },

        saveCredit()
        {
            axios.post(baseUrl + '/admin/api/class/credits/update/' + this.classid,{
                credit: this.allcredits
            })
            .then( (response) => {
                this.allcredits = parseInt(this.allcredits)
                this.editPostponed = !this.editPostponed
            })
            .catch((error) => {
                console.log(error)
            })
                
        },

        getPostponeClass(page = 1)
        {
            this.postponed_sessions = {}
            axios.get(baseUrl + "/admin/api/postponedsessions/" + this.classid + "?page=" + page)
            .then( response =>{
                this.postponed_sessions = response.data
            })
            .catch( error => {
                console.log(error)
            })
        },
        getSession()
        {
            this.date_list = ""
            axios.get(baseUrl + "/admin/api/sessions/" + this.classid)
            .then( response =>{
                this.date_list = response.data
            })
            .catch( error => {
                console.log(error)
            })

        },
        cancelPostpone(id, index)
        {
            if(confirm("수강연기를 취소하겠습니까?")){
                axios.put(baseUrl + '/admin/classer/cancelpostpone/' + this.classid, {
                    postponed: id,
                })
                .then( response => {
                    this.getCredits()
                    this.postponed_sessions.data.splice(index, 1); 
                    this.getSession()
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

    .tab-content{
        padding:10px;
    }

    .nav-tabs li a{
        border-radius: 0px;
        border-top: 0px;
    }

    .padding-md{
        padding:10px;
    }

    .table{
        margin-bottom: 0px;
    }

    .pagination{
        margin:-1px;
    }
</style>


