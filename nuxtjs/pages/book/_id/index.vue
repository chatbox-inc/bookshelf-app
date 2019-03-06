<template>
    <section>
        <h2 class="mb-3">書籍詳細</h2>
        <table class="table" v-if="book">
            <tr>
                <th>書籍名</th>
                <td>{{book.title}}</td>
            </tr>
            <tr>
                <th>内容詳細</th>
                <td>{{book.detail}}</td>
            </tr>
            <tr>
                <th>Amazon URL</th>
                <td>URL</td>
            </tr>
            <tr>
                <th>画像</th>
                <td>内容</td>
            </tr>
            <tr>
                <th>ISBN</th>
                <td>内容</td>
            </tr>
            <tr>
                <th>著者</th>
                <td>内容</td>
            </tr>
            <tr>
                <th>出版社</th>
                <td>内容</td>
            </tr>
            <tr>
                <th>発行年</th>
                <td>内容</td>
            </tr>
        </table>
        <h2 class="mb-3">貸出履歴</h2>
        <table class="table" v-if="book">
            <thead>
            <tr>
                <th>No.</th>
                <th>名前</th>
                <th>貸出日</th>
                <th>返却日</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item, index) in book.rental" :key="index">
                <td>{{item.rentalHistoryId}}</td>
                <td>{{item.rentalPersonName}}</td>
                <td>{{item.rentalDateFrom}}</td>
                <td>{{item.rentalDateTo}}</td>
            </tr>
            </tbody>
        </table>
        <h2 class="mb-3">この書籍を借りる</h2>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="名前を入力してください">
            <div class="input-group-append">
                <router-link to="/">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">借りる</button>
                </router-link>
            </div>
        </div>
        <div class="btn-back">
            <router-link class="btn btn-outline-primary" to="/">戻る</router-link>
        </div>
    </section>
</template>

<script>
    export default {
        data () {
            return {
                book: null,
                history: null,
            }
        },
        mounted(){
            for(let book of this.$store.state.books){
                if(book.id == this.$route.params.id){
                    this.book = book
                }
            }
            if(!this.book){
                this.$router.push("/")
            }
            for(let history of this.$store.state.rentalHistory){
                this.history = history
            }
            if(!this.history){
                this.$router.push("/")
            }
        },
        computed: {
            histories(){
                return this.$store.state.rentalHistory
            },
            mounted(){
                this.$store.dispatch("load")
            }
        }
    }
</script>

<style>
    .btn-back{
        padding-bottom: 20px;
    }
</style>