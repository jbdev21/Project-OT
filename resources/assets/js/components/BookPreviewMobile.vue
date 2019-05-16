<template>
    <div>
        <div> 
            <pagination  :data="pages" @pagination-change-page="getResults" :limit="1"></pagination>
            <div class="row">
                <div class="col-xs-8">
                    <input placeholder="페이지 입력"  v-model="page" type="number" class="form-control input-sm">
                </div>
                <div class="col-xs-4">
                    <button @click="updatePage" class="btn btn-primary btn-sm">페이지이동</button>
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
            page: this.default_page
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
        }
    }

}
</script>

<style>
    .pagination a{
        font-size:12px;
    }

</style>
