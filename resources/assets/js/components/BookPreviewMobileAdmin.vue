<template>
    <div>
        <div> 
             <div class="row">
                <div class="col-xs-4">
                    <input v-model="page" placeholder="페이지 입력" type="number" class="form-control input-sm">
                </div>
                <div class="col-xs-4">
                    <button @click="updatePage" class="btn btn-primary btn-sm">페이지이동</button>
                </div>
                  <div class="col-xs-4">
                    <button class="btn btn-primary" @click="reload"><i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <pagination  :data="pages" @pagination-change-page="getResults" :limit="1"></pagination>
                </div>
            </div>
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
        'default_page'
    ],
    data(){
        return {
            perpage: 1,
            pages: {},
            page:this.default_page
        }
    },
    created(){
        this.getResults()
        
    },
    methods:{
        getResults(page = this.default_page) {
            axios.get(baseUrl + '/api/book/preview/' + this.bookid + "/" + this.perpage + "?page=" + page)
            .then(response => {
                this.pages = response.data
                this.page = page;
            }); 
        },
        updatePage()
        {
            axios.get(baseUrl + '/api/book/preview/' + this.bookid + "/" + this.perpage + "?page=" + this.page)
            .then(response => {
                this.pages = response.data
            }); 
        },
        reload()
        {
            this.getResults()
        }
    }

}
</script>
<style>
    .pagination{
        margin:0px !important;
    }
</style>

