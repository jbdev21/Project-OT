<template>
    <div>
        <div class="dropdown" style="display:inline-block">
            <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-danger btn-sm">
            <i class="fa fa-gear"></i> {{ trans('button.session_manager') }}
            <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dLabel">
                <li>
                    <a   data-toggle="modal" data-target="#postponed_modal" @click="sessionReload" ><i class="fa fa-mail-forward"></i> {{ trans('button.postponed_manager') }}</a>
                </li>
                <li>
                    <a  data-toggle="modal" data-target="#submission_modal"><i class="fa fa-user"></i> {{ trans('button.sub_teacher_manager') }}</a>
                </li>
                <li>
                    <a href="#" type="button" data-toggle="modal" data-target="#modal-add">
                        <i class="fa fa-plus" ></i>  {{ trans('button.add_session') }}
                    </a>
                </li>
                <li>
                    <a href="#"  type="button" data-toggle="modal" data-target="#modal-deduct">
                        <i class="fa fa-remove" ></i> {{ trans('button.deduct_session') }}
                    </a>
                </li>
                <li>
                    <a href="#"  type="button" data-toggle="modal" data-target="#modal-history">
                        <i class="fa fa-clock-o" ></i> {{ trans('label.class_movement') }}
                    </a>
                </li>
            </ul>
        </div>
        <button @click="getResults" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> {{ trans('label.refresh') }}</button>
      
        <table  class="table table-hover table-striped table-sm table-narrow" >
            <thead>
                <tr>
                    <td>#</td>
                    <td><b>날짜 시간</b></td>
                    <td v-show="classtype == 'Phone Class'"></td>
                    <td align="right"><b>학생</b></td>
                </tr>
            </thead>
            <tbody>
                <tr class="tr_days"
                :class="{ 
                            success: class_item.status == 'present', 
                            danger: class_item.status == 'absent', 
                            warning: class_item.status == 'postponed',  
                            activetr: class_item.id == today
                        }" 
                    v-for="class_item in classes.data"  v-bind:key="class_item.id" style="cursor:pointer;"  @click="sessionClicked(class_item)" >
                    <td>{{ class_item.class_number }}</td>
                    <td><a>{{ class_item.formated_date_time }}  </a></td>
                    <td style="padding:3px" v-show="classtype == 'Phone Class'">
                        <a :href="class_item.phone_recording_link" target="_blank" class="btn btn-default btn-xs" ><i class="fa fa-microphone"></i></a>
                    </td>
                    <td align="right">{{ converToKorean(class_item.status) }}</td>
                </tr>

            </tbody>
        </table>
        <pagination  :data="classes" @pagination-change-page="getResults" :limit="2"></pagination>
        <!-- <button class="btn btn-default" :disabled="!prev_page_url" @click.prevent="prevpage" >prev</button>
        <button class="btn btn-default" :disabled="!next_page_url" @click.prevent="nextpage" >next</button> -->
    <div class="modal fade-scale" id="postponed_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"> 
                        {{ trans('label.postponed_manager') }}
                    </h4>
                </div>
                <div class="modal-body" style="padding:0px">
                
                    <postponed-manager ref="postponedManager" :postponed_credits="postponed_credits" :classid="classid" @submitpostpone="getResults"
                         :rangedefault="rangedefault"></postponed-manager>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade-scale" id="submission_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"> {{ trans('label.submission') }}</h4>
                </div>
                <div class="modal-body" style="padding:0px">
                
                    <submission url="" :classid="classid"></submission>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade-scale" id="modal-add" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"> {{ trans('label.adding_session') }}</h4>
                </div>
                <div class="modal-body">
                        <label for="">{{ trans('label.enter_number_add') }}</label>
                        <input min="1" type="number" class="form-control" v-model="number" name="number">
                        <br>
                        <label for="">{{ trans('label.note') }}</label>
                        <input type="text" class="form-control" v-model="note" name="note">
                        <br>
                        <button class="btn btn-primary" @click.once="addSession" >{{ trans('button.save') }}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade-scale" id="modal-deduct" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"> {{ trans('button.deduct_session') }} </h4>
                </div>
                <div class="modal-body">
                   
                        <label for="">횟수</label>
                        <input min="1" type="number" class="form-control" v-model="number" name="number">
                        <br>
                        <label for="">{{ trans('label.note') }}</label>
                        <input type="text" class="form-control" v-model="note" name="note">
                        <br>
                        <button class="btn btn-primary" @click.once="deductSession" >{{ trans('button.save') }}</button>
                 
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade-scale" id="modal-history" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
               <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">{{ trans('label.class_movement') }}</h4>
                </div>
                <div class="modal-body">
                   <table class="table">
                       <thead>
                           <tr>
                               <td>{{ trans('label.type') }}</td>
                               <td>{{  trans('label.description') }}</td>
                               <td>{{  trans('label.note') }}</td>
                               <td></td>
                           </tr>
                       </thead>
                       <tbody>
                           <log-tr v-for="log in logs" :classid="classid" @log-delete="deleteLog" :key="log.id" :log="log"></log-tr>
                           <!-- <tr >
                               <td>{{ trans('label.' + log.type) }}</td>
                               <td>{{ log.content }}</td>
                               <td>
                                   <i class="fa fa-pencil"></i>
                                    {{ log.note }} 
                                </td>
                               <td>{{ log.created_at }}</td>
                               <td><button @click="deleteLog(log)" class="btn btn-xs btn-default">X</button></td>
                           </tr> -->
                       </tbody>
                   </table>
                      
                 
                </div>
            </div>
        </div>
    </div>
    </div>
    
</template>
<style>
    .activetr{
        border:2px solid #1abb9c !important;
    }


</style>
<script>
    export default {
        props:[
            'classid', 
            'classtype', 
            'perpage',
            'rangedefault',
            'today',
            'postponed_credits'     
        ],
        data(){
            return {
                classes: {},
                classer:{},
                next_page_url: "",
                prev_page_url: "",
                number: 1,
                note: '',
                logs:[],
                
            }
        }
        ,created()
        {
            this.getResults();
            this.getLogs();
        },  
        methods:{
            // Our method to GET results from a Laravel endpoint
            addSession()
            {
                axios.post(baseUrl + '/admin/classer/addsession', {
                    class_id: this.classid,
                    number: this.number,
                    note: this.note
                })
                .then( response => {
                    location.reload()
                })
                .catch( error => {

                })
            },

            deductSession()
            {
                axios.post(baseUrl + '/admin/classer/deductsession', {
                    class_id: this.classid,
                    number: this.number,
                    note: this.note
                })
                .then( response => {
                    location.reload()
                })
                .catch( error => {

                })
            },
            getResults(page = 1) {
                this.classes = {}
                 axios.post(baseUrl + '/admin/api/classlist/' + this.classid + "/" + this.perpage + "?page=" + page)
                    .then(response => {
                        
                        this.classes = response.data;
                        var tod = parseInt(this.today);
                        var ses = this.findObjectByKey(this.classes.data, 'id', tod)

                        if(ses)
                        {
                            this.sessionClicked(ses)
                        }
                    });
            },

            getLogs() {
                 axios.post(baseUrl + '/admin/api/class/log/' + this.classid)
                    .then(response => {
                       this.logs = response.data
                    });
            },
            deleteLog(log)
            {
              this.logs.splice(log, 1)
            },
            
            sessionClicked(val)
            {
                this.$emit('sessionclicked', val)
            },

            date_format(date_string)
            {   
                var weekdays = new Array(7);
               weekdays[1] = '월';
                weekdays[2] = '화';
                weekdays[3] = '수';
                weekdays[4] = '목';
                weekdays[5] = '금';
                weekdays[6] = '토';
                weekdays[0] = '일';

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
            sessionReload()
            {
                this.$refs.postponedManager.getSession();
            },

            findObjectByKey(array, key, value) {
                for (var i = 0; i < array.length; i++) {
                    if (array[i][key] === value) {
                        return array[i];
                    }
                }
                return null;
            },
           
            converToKorean(day)
            {
                if( day == "ready")
                {
                    return "수강대기"
                }
                else if( day == "absent")
                {
                    return "결석"
                }
                else if( day == "present")
                {
                    return "출석"
                }
                else if( day == "postponed")
                {
                    return "연기"
                }   
            }


            
        },

    }
</script>

