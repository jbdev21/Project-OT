<template>
    <div>
        <div class="dropdown" style="display:inline-block">
            <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn-block btn btn-danger btn-sm">
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
                        <i class="fa fa-remove" ></i>{{ trans('button.deduct_session') }}
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
            <select v-model="session" class="form-control">
                <option v-for="class_item in classes"   v-bind:key="class_item.id" :value="class_item"> {{ class_item.formated_date_time }}</option>
            </select>
             
        <!-- <button class="btn btn-default" :disabled="!prev_page_url" @click.prevent="prevpage" >prev</button>
        <button class="btn btn-default" :disabled="!next_page_url" @click.prevent="nextpage" >next</button> -->
    <div class="modal fade-scale" id="postponed_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"> {{ trans('label.postponed_manager') }}</h4>
                </div>
                <div class="modal-body" style="padding:0px">
                
                    <postponed-manager-mobile ref="postponedManager" :classid="classid" @submitpostpone="getResults"
                         ></postponed-manager-mobile>
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
                        <br>
                        <button class="btn btn-primary" @click="addSession" >{{ trans('button.save') }}</button>
                 
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade-scale" id="modal-deduct" tabindex="-1" role="dialog">
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
                        <button class="btn btn-primary" @click="deductSession" >{{ trans('button.save') }}</button>
                 
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
                           </tr>
                       </thead>
                       <tbody>
                           <tr v-for="log in logs" :key="log.id">
                               <td>{{ trans('label.' + log.type) }}</td>
                               <td>{{ log.content }}</td>
                               <td>{{ log.created_at }}</td>
                           </tr>
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
            'perpage',
            'rangedefault',
            'today'
        ],
        data(){
            return {
                classes: {},
                next_page_url: "",
                prev_page_url: "",
                session: "",
                note: '',
                number: 1,
                logs:[]
            }
        }
        ,created()
        {
            this.getResults();
            this.getLogs();
        },
        watch:{
            session()
            {
                this.sessionClicked(this.session)
            }
        },  
        methods:{
            // Our method to GET results from a Laravel endpoint
            getResults(page = 1) {
                this.classes = {}
                 this.date_list = ""
                axios.get(baseUrl + "/admin/api/sessions/" + this.classid)
                .then( response =>{
                    this.classes = response.data
                     var tod = parseInt(this.today);
                    var ses = this.findObjectByKey(this.classes, 'id', tod)
                    if(ses)
                    {
                        this.session = ses
                        this.sessionClicked(ses)
                    }
                })
                .catch( error => {
                    console.log(error)
                })
                //  axios.post(baseUrl + '/admin/api/classlist/' + this.classid + "/" + this.perpage + "?page=" + page)
                //     .then(response => {
                //         this.classes = response.data;
                //         var tod = parseInt(this.today);
                //         var ses = this.findObjectByKey(this.classes.data, 'id', tod)
                //         if(ses)
                //         {
                //             this.sessionClicked(ses)
                //         }
                //     });
            },

            getLogs() {
                 axios.post(baseUrl + '/admin/api/class/log/' + this.classid)
                    .then(response => {
                       this.logs = response.data
                    });
            },
            
            addSession()
            {
                axios.post(baseUrl + '/admin/classer/addsession', {
                    class_id: this.classid,
                    number: this.number,
                    note: this.note,
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

