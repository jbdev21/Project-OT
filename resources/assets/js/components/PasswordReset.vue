<template>
   <div>
        <div class="alert alert-danger" v-show="message">
            {{ message }}
        </div>
        <div v-show="!isValidated">
            <label for="email">아이디</label>
            <input type="text" class="form-control input-lg" v-model="username"  required>
            <br>
            <label for="email">이메일</label>
            <input type="email"  class="form-control form-control-lg" v-model="email"  required>
            <br>
            <button type="submit" @click="validate" class="btn btn-primary btn-lg" >
                확인
            </button>
        </div>
        <div v-show="isValidated && !done">
            <label for="email">비밀번호</label>
            <input type="password" class="form-control input-lg" v-model="password"  required>
            <br>
            <label for="email">비밀번호 확인</label>
            <input type="password" class="form-control input-lg" v-model="repeat_password"  required>
            <br>
            <button type="submit" @click="savePassword" class="btn btn-primary btn-lg" >
                확인
            </button>
            <button type="submit" @click="cancel" class="btn btn-warning btn-lg" >
                취소
            </button>
        </div>
        <div v-if="done" class="text-center">
            <div class="check_mark">
                <div class="sa-icon sa-success animate">
                <span class="sa-line sa-tip animateSuccessTip"></span>
                <span class="sa-line sa-long animateSuccessLong"></span>
                <div class="sa-placeholder"></div>
                <div class="sa-fix"></div>
                </div>
            </div>
            <a class="btn btn-success btn-lg" href="/login">로그인</a>
        </div>
        
   </div>
</template>
<script>
export default {
    data()
    {
        return{
            username:'',
            email:'',
            isValidated: false,
            password: '',
            repeat_password:'',
            studentID: '',
            message: '',
            done: false,
        }
    },
    methods:{
        validate()
        {
            if(this.username){
                this.message = ''
                axios.post(baseUrl + '/api/validateusername', {
                    username: this.username,
                    email: this.email
                 })
                 .then( (response) => {
                     if(response.data != ""){
                        console.log(response.data)
                        this.studentID = response.data
                        this.isValidated = true
                     }else{
                         this.message = "아이디/이메일 확인요망 (매니저에게 리셋신청 가능)"
                     }
                 })
                 .catch( (error) => {
                     console.log(error);
                 })
            }
        },

        savePassword()
        {
            if(this.password == this.repeat_password)
            {
                axios.post(baseUrl + '/api/savenewpassword',{
                    student_id: this.studentID,
                    password: this.password
                })
                .then( (response) => {
                    this.done = true;
                } )
                .catch( (error) => {
                    console.log(error)
                })
            }else{
                 this.message = " 아이디 이메일 불일치"
            }
        },

        cancel()
        {
            this.isValidated = false
        }
    }
}
</script>
