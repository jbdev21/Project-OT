<template>
    <div>
        <a v-if="sessionurl != null" :href="sessionurl" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-video-camera"></i> {{ trans('button.class_room') }}</a>
        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#postpone_modal">{{ trans('button.request_manager') }}</button>
        
        <br>
	    <br>
        <label>{{ trans('label.teacher') }}</label>: {{ classinfo.admin ? classinfo.admin.name : "" }} &nbsp;&nbsp;&nbsp;&nbsp;
        <label>{{ trans('label.type') }}</label>: {{ classinfo.type}} &nbsp;&nbsp;&nbsp;&nbsp;
        <label>{{ trans('label.time') }}</label>: {{ time_format(classinfo.time) }}&nbsp;&nbsp;&nbsp;&nbsp;
        <label>{{ trans('label.credit') }}</label>: {{ classinfo.postponed_credits }}
        <hr>

        <div class="row">
            <div class="col-sm-5">
                <table  class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <td><b>날짜 시간</b></td>
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
                            v-for="class_item in sessions.data"  v-bind:key="class_item.id" style="cursor:pointer"  @click="sessionClicked(class_item)" >
                            <td><a>{{ class_item.date_time }}  </a></td>
                            <td align="right">{{ converToKorean(class_item.status) }}</td>
                        </tr>
                    </tbody>
                </table>
                <pagination  :data="sessions" @pagination-change-page="getSessions" :limit="2"></pagination>
                <table class="table">
                    <tr>
                        <td>듣기:</td>
                        <td>
                        <star-rating :starSize="20"  :read-only="true" :max-rating="10"  :rating="session.comprehension" ></star-rating>
                        </td>
                    </tr>
                    <tr>
                        <td>말하기:</td>
                        <td>
                        <star-rating :starSize="20"  :read-only="true" :max-rating="10"  :rating="session.pronounciation" ></star-rating>

                        </td>
                    </tr>
                    <tr>
                        <td>발음:</td>
                        <td>
                        <star-rating :starSize="20"  :read-only="true" :max-rating="10"  :rating="session.fluency" ></star-rating>

                        </td>
                    </tr>
                    <tr>
                        <td>단어:</td>
                        <td>
                        <star-rating :starSize="20"  :read-only="true" :max-rating="10"  :rating="session.vocabulary" ></star-rating>
                        </td>
                    </tr>
                    <tr>
                        <td>문법:</td>
                        <td>
                        <star-rating :starSize="20"  :read-only="true" :max-rating="10"  :rating="session.grammar" ></star-rating>

                        </td>
                    </tr>
                    <!-- <tr>
                        <td><b>총평</b></td>
                        <td>
                            <star-rating :starSize="20"  :read-only="true" :max-rating="10"  :rating="total" ></star-rating>
                        </td>
                    </tr> -->
                </table>
                <hr>
                <h4 for="">{{ trans('label.mistake_&_correction')}}</h4>
                <div class="mistakes">
                    <div class="well" v-for="mistake in session.mistake" :key="mistake.id">
                        <span class="wrong text-danger"><i class="fa fa-ban"></i>
                        {{ mistake.mistake_body }}
                        </span>
                        <br>
                        <span class="correct text-primary"><i class="fa fa-check"></i>
                        {{ mistake.correction }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <session-info :session="session"></session-info>
            </div>
    </div>

        <div class="modal fade" id="postpone_modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">{{ trans('label.postponed_manager') }}</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                        <session-postpone :credits="credits" :cid="classid" :today="today"></session-postpone>
                        </div>
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
    props: [
        'classid',
        'sessionurl',
        'today',
        'credits',
        'modalshow'
    ],
    data(){
        return{
            classinfo: {},
            sessions: {},
            session: {}
        }
    },
    computed:{
        total(){
           var sum =  this.session.grammar + this.session.pronounciation + this.session.comprehension + this.session.fluency + this.session.vocabulary
           return sum / 5;
        }
    },
    mounted()
    {
        this.getClassInfo()
        this.getSessions()

        if(this.modalshow == 1)
        {
            $('#myModal').modal('show')
        }
        
    },
    methods:{
        sessionClicked(session)
        {
            this.session = session
        },
        getClassInfo()
        {
            axios.post(baseUrl + '/dashboard/api/class/' + this.classid)
             .then( response => {
                 this.classinfo = response.data
             })
             .catch( error => {
                 console.log(error)
             })
        }, 
         getSessions(page = 1) {
                this.classes = {}
                 axios.post(baseUrl + '/dashboard/api/sessions/' + this.classid + "/15?page=" + page)
                    .then(response => {
                        this.sessions = response.data;
                        var tod = parseInt(this.today);
                        var ses = this.findObjectByKey(this.sessions.data, 'id', tod)
                        if(ses)
                        {
                            this.session = ses
                        }
                    });
        },
       

        time_format(date_string)
        {   
            var hours = String(date_string).split(':')
            var ampm = hours[0] >= 12 ? 'PM' : 'AM';
            return hours[0] + ':' + hours[1] + " " + ampm;

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
    }
}
</script>

