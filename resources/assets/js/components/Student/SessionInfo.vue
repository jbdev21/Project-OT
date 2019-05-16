<template>
    <div>
        <h3>
            {{ session.date_time }}
        </h3>
        <div class="well" v-show="session.comment != null" v-html="session.comment" style="min-height: 350px;border:1px solid #ccc" rows="4">
        </div>
        <div class="well" v-show="session.comment == null" style="min-height: 350px;border:1px solid #ccc" rows="4">
            수업 후 코멘트 입력 됩니다.
        </div>
               
    </div>
</template>
<script>
export default {
    props:['session'],
    data()
    {
        return {

        }
    },
    computed:{
        total(){
           var sum =  this.session.grammar + this.session.pronounciation + this.session.comprehension + this.session.fluency + this.session.vocabulary
           return sum / 5;
        }
    },
}
</script>
<style>
    star-rating{
        font-size: 11px;
    }
</style>
