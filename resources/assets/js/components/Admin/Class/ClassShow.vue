<template>
    <div class="row">
        <div class="col-sm-5">
            <div id="calendar_bernas"></div>
            <br>
            <label for="">메모</label>
            <span v-show="is_saving"> saving..</span>
            <editor v-model="remarks" @input="updateRemarks"  api-key="67ql42s1dg868xcwuzycclu96ynily1svyoaxi0y0sgq1t2e" :init="editor_config"></editor>
            <br>
        </div>
        <div class="col-sm-3">
            <class-show-list  :classtype="classtype"   :postponed_credits="postponed_credits"  :today="today" :rangedefault="rangedefault" :classid="classid" :perpage="20" @sessionclicked="selected_session = $event" ></class-show-list>
        </div>
        <div class="col-sm-4">
            <class-book :classid="classid" ></class-book>
            <hr>
            <class-list-info :session="selected_session" ></class-list-info>
            <hr>
            <label for="">{{ trans('label.mistake_&_correction')}}</label>
            <mistake :session="session_id"></mistake>
        </div>
    </div>
</template>
<script>
export default {
    props:[
            'classid', 
            'bookid',
            'classtype',
            'postponed_credits',
            'studentid',
            'defaultsession',
            'rangedefault',
            'today',
            'logs'
        ],
    data(){
        return {
            remarks:'',
            session_id:'',
            selected_session: "",
            is_saving: false,
            editor_config: {
                height:"230",
                menubar: false,
                branding:false,
                themes: "modern",
                language : 'ko_KR',
                forced_root_block : false,
                plugins: [
                "image link"
                ],
                toolbar: "insertfile  bold italic  alignleft aligncenter alignright alignjustify  bullist numlist link image media",
                relative_urls: false,
                file_browser_callback : function(field_name, url, type, win) {
                    var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                    var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                    var cmsURL = '/media?field_name=' + field_name;
                
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Media Manager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
                }
            }
        }
        
    },
    created(){
        
        axios.post(baseUrl + '/admin/api/studentremarks/' + this.studentid)
                .then( response => {
                   this.remarks = response.data.toString()
                })
                .catch( error => {
                    console.log(error)
                })

        if(this.defaultsession)
        {
            this.session_id  = this.defaultsession;
        }else{
            this.session_id = this.selected_session.id
        }
    },
    methods:{
        updateRemarks: _.debounce( function(){
            this.is_saving = true
            if(this.studentid){
                axios.post(baseUrl + '/admin/api/updatestudentremarks/' + this.studentid, {
                    remarks: this.remarks
                })
                .then( response => {
                    this.is_saving = false
                })
                .catch( error => {
                    console.log(error)
                })
            }
        },2000),
        
    },
    watch:{
        selected_session()
        {
            this.session_id = this.selected_session.id
        }
    }
}
</script>

