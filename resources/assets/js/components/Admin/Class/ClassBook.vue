<template>
<div>
    <div class="row">
        <div class="col-sm-7">
            <label for="">제목</label>
              <transition name="fade">
                <span v-show="saving">
                    <span class="fa fa-spinner fa-spin" style="margin-left:10px;"></span> {{ saving_label }}..
                </span>
                </transition>
            <select name="book" v-model="book_id" class="form-control" @change="changebook">
                <option :value="book.id" v-for="book in books" :key="book.id">{{ book.title }}</option>
            </select>
        </div>
        <div class="col-sm-3">
            <label for="">페이지</label>
            <input type="number" :placeholder="trans.page" v-model="page_number" min="1" :max="limit_of_page" @change="changepage" class="form-control">
        </div>
        <div  class="col-sm-2">
            <br>
            <button style="margin-top:5px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#bookPreviewModal">
                <i class="fa fa-book"></i>
            </button>
        </div>
        
    </div>
    <!-- Modal -->
    <div class="modal fade" id="bookPreviewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{ trans('label.book') }}</h4>
            </div>
            <div class="modal-body">
                <book-preview v-if="showBook"  :bookid="book_id"  :default_page="page_number"></book-preview>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
export default {
    props: ['classid'],
    data(){
        return {
            books:[],
            book_id: '',
            page_number: 1,
            limit_of_page: '',
            showBook:false,
            saving: false,
            saving_label: 'saving',
        }
    },
    created(){
      axios.get(baseUrl + '/admin/api/book')
        .then( (response) => {
            this.books = response.data
        })
        .catch( error => {
            console.log(error)
        })

    
       axios.post(baseUrl + '/admin/api/class/' + this.classid)
        .then( response => {
            this.book_id = response.data.book_id
            this.page_number = response.data.page
            console.log(response.data.page)
            this.showBook = true;
        })
        .catch( error => {
            console.log(error)
        })
    },
    methods:{
        changebook(){
            this.saving = true
            this.saving_label = 'saving'
            axios.post(baseUrl + '/admin/api/updateclassbook/' + this.classid,{
                book_id: this.book_id
            })
            .then( response => {
                this.limit_of_page = response.data
                this.saving = false
                this.saving_label = 'Saved'
            })
            .catch( error => {
                console.log(error)
            })
            
          //  console.log(this.book_id)
        },
        changepage:_.debounce(function(){
            this.saving = true
            this.saving_label = 'saving'

            // if(this.page_number > this.limit_of_page)
            // {
            //     this.page_number = this.limit_of_page
            // }

             axios.post(baseUrl + '/admin/api/updateclassbookpage/' + this.classid,{
                    page: this.page_number                    
                })
                .then( response => {
                    // if(response.statusText == "OK"){
                    //     console.log(response)
                    // }
                    // console.log("changeing")
                    // console.log(this.page_number)
                    this.saving = false
                    this.saving_label = 'Saved'
                    
                })
                .catch( error => {
                    console.log(error)
                })
            
        }, 1000)
    }
}
</script>

<style>
    .fade-leave-active {
     transition: opacity 3s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
</style>
