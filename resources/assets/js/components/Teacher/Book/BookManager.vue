<template>
    <div>
        <div class="row">
            <div class="col-sm-9">
                <label for=""> Title</label>
                <select  v-model="book_selected" class="form-control input-sm" required>
                   <option v-for="(bo, index) in books" :value="bo.id" :key="index" > {{ bo.title }}</option>
                </select>
            </div>
            <div class="col-sm-3">
                <label for=""> Page</label>
                <input type="number" required name="name" v-model="current_page"  placeholder=" page number" class=" input-sm form-control">
            </div>
        </div>
        <br>
        <button class="btn btn-primary btn-sm btn-block" @click="updateBook" type="submit"><i class="fa fa-check"></i>{{saving_label}}</button>
        <div class="text-center"> 
            <pagination  :data="pages" @pagination-change-page="getResults" :limit="4"></pagination>
            <br>
            <img class="img-responsive" v-for="page in pages.data" :key="page.id" :src="page.url" alt="">
            <img class="img-responsive" v-show="pages.data == null" src="http://cdn01.strandbooks.weblinc.com/images/products/placeHolders/placeHolder.zoom.jpg">
        </div>
    </div>
</template>
<script>
export default {
    props: [
        'bookid',
        'classid',
        'currentpage'
    ],
    data(){
        return {
            perpage: 1,
            pages: {},
            current_page: 1,
            books:{},
            book_selected:1,
            selected_page:'',
            saving_label: "Update"
        }
    },
    created(){
        //this.getResults()
        this.getBooks()
        if(this.bookid != null){
            this.book_selected = this.bookid 
            this.current_page = this.currentpage > 0 ? this.currentpage : 1
        } 
    },
    watch:
    {
       book_selected()
       {
          this.getResults(this.current_page)
       },
       current_page()
       {
          this.getResults(this.current_page)
       } 
    },
    methods:{
        getResults(page = 1) {
            if(this.book_selected){
                this.current_page = page;
                axios.get(baseUrl + '/api/book/preview/' + this.book_selected + "/" + this.perpage + "?page=" + page)
                .then(response => {
                    this.pages = response.data
                }); 
            }
        },
        getBooks(){
            axios.get(baseUrl + '/api/book/all/')
            .then(response => {
                this.books = response.data
            }); 
        },
        updateBook()
        {
            this.saving_label = " saving.."
            axios.post(baseUrl + '/teacher/api/updatebook',{
                book_id: this.book_selected,
                page: this.current_page,
                class_id: this.classid,
            })
            .then( response => {
                this.saving_label = " Saved"    
                setTimeout(function(){
                    this.saving_label = " Update"    
                },2000)
            })
            .catch( error => {
                console.log(error)
            })
        }
    }

}
</script>
