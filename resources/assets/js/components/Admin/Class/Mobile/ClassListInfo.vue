<template>
    <div>
       <div class="row">
            <div class="col-sm-12">
                <label for="">{{ trans('label.attendance') }} </label>
                <select v-model="session.status" :disabled="session.status == 'postponed'" class="form-control" @change="changestatus">
                    <option disabled value="postponed">연기 </option>
                    <option value="ready"> 수강대기 </option>
                    <option value="present">출석 </option>
                    <option value="absent">결석 </option>
                </select>
            </div>
           
        </div>
        <br>
        <editor v-model="session.comment" @onKeyUp="changecomment" ref="editor" api-key="67ql42s1dg868xcwuzycclu96ynily1svyoaxi0y0sgq1t2e" :init="editor_config"></editor>
        <!-- <vue-ckeditor v-model="comment" :config="config" /> -->
        
        <!-- <textarea class="form-control my-editor" rows="6" v-model="comment"></textarea> -->
         <div class="columns">
            <div class="column padding-sm">
                <label for=""> {{ trans('label.comprehension') }} </label>
                 <select class="form-control" style="padding:0px" v-model="session.comprehension" @change="changecomprehension">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                 </select>
            </div>
            <div class="column padding-sm">
                <label for="">{{ trans('label.pronounciation') }}</label>
                 <select class="form-control" style="padding:0px" v-model="session.pronounciation" @change="changepronounciation">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                 </select>
            </div>
            <div class="column padding-sm">
                <label for="">{{ trans('label.fluency') }}</label>
                 <select class="form-control" style="padding:0px" v-model="session.fluency" @change="changefluency">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                 </select>
            </div>
            <div class="column padding-sm">
                <label for="">{{ trans('label.vocabulary') }}</label>
                 <select class="form-control" style="padding:0px" v-model="session.vocabulary" @change="changevocabulary">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                 </select>
            </div>
            <div class="column padding-sm">
                <label for="">{{ trans('label.grammar') }}</label>
                 <select class="form-control" style="padding:0px" v-model="session.grammar" @change="changegrammar">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                 </select>
            </div>
         </div>
          
    </div>
</template>
<script>
export default {
    props:['session'],
    data(){
        return {
            editor_config: {
                height:"200",
                menubar: false,
                innerHTML: "heha",
                branding:false,
                themes: "modern",
                language : 'ko_KR',
                forced_root_block : false,
                plugins: [
                " anchor"
                ],
                toolbar: "insertfile  bold italic  alignleft aligncenter alignright alignjustify  bullist numlist link image media",
            }
        }
    },
    
    created(){
        if(this.session)
        {
            this.status = this.session.status
            this.comprehension = this.session.comprehension
            this.pronounciation = this.session.pronounciation
            this.fluency = this.session.fluency
            this.vocabulary = this.session.vocabulary
            this.grammar = this.session.grammar
            this.date_time = this.session.date_time
        }
      
    },
    watch: {
        session(session) {
           if(this.session.comment == null){
               this.session.comment = ""
            }
        }
    },
    methods:{
        changestatus(){
            if(this.session)
            {
                axios.post(baseUrl + "/admin/api/updatesessionstatus/" + this.session.id, {
                    status: this.session.status
                })
                .then( response => {
                   // console.log("status saved: " + this.session.status)
                })
                .catch( error => {

                })
            }
              
        },
        changecomprehension(){
            if(this.session)
            {
                axios.post(baseUrl + "/admin/api/updatecomprehension/" + this.session.id, {
                    comprehension: this.session.comprehension
                })
                .then( response => {
                   // console.log("comprehension saved:" + this.session.comprehension) 
                })
                .catch( error => {

                })

            }
        },
        changepronounciation(){
            if(this.session)
            {
                axios.post(baseUrl + "/admin/api/updatepronounciation/" + this.session.id, {
                    pronounciation: this.session.pronounciation
                })
                .then( response => {
                   // console.log("pronounciation saved")
                })
                .catch( error => {

                })

            }
        },
        changefluency(){
            if(this.session)
            {
                axios.post(baseUrl + "/admin/api/updatefluency/" + this.session.id, {
                    fluency: this.session.fluency
                })
                .then( response => {
                    //console.log("fluency saved")
                })
                .catch( error => {

                })

            }
        },
        changevocabulary(){
            if(this.session)
            {
                axios.post(baseUrl + "/admin/api/updatevocabulary/" + this.session.id, {
                    vocabulary: this.session.vocabulary
                })
                .then( response => {
                   //console.log("vocabulary saved")
                    //console.log(response.data)
                })
                .catch( error => {

                })

            }
        },
        changegrammar(){
            if(this.session)
            {
                axios.post(baseUrl + "/admin/api/updategrammar/" + this.session.id, {
                    grammar: this.session.grammar
                })
                .then( response => {
                   // console.log("grammar saved")
                })
                .catch( error => {

                })

            }
        },
        changecomment: _.debounce(function(){
            if(this.session)
            {
                axios.post(baseUrl + "/admin/api/updatecomment/" + this.session.id, {
                     comment: this.session.comment
                })
                .then( response => {
                     console.log(response.data)
                })
                .catch( error => {

                })

            }
        },2000)
        ,

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

            }

    }

}

</script>

