<template>
    <section>
        <h2>書籍追加</h2>
        <div>
            <form>
                <div class="form-group">
                    <label>書籍名</label>
                    <input type="text" class="form-control" v-model="form.title">
                </div>
            </form>
            <form>
                <div class="form-group">
                    <label>書籍詳細</label>
                    <input type="text" class="form-control" v-model="form.description">
                </div>
            </form>
            <form>
                <div class="form-group">
                    <label>Amazon URL</label>
                    <input type="text" class="form-control" v-model="form.url">
                </div>
            </form>
            <form>
                <div class="form-group">
                    <label>ISBN</label>
                    <input type="text" class="form-control" v-model="form.isbn">
                </div>
            </form>
            <form>
                <div class="form-group">
                    <label>著者</label>
                    <input type="text" class="form-control" v-model="form.author">
                </div>
            </form>
            <form>
                <div class="form-group">
                    <label>出版社</label>
                    <input type="text" class="form-control" v-model="form.publisher">
                </div>
            </form>
            <form>
                <div class="form-group">
                    <label>発行年</label>
                    <input type="text" class="form-control" v-model="form.published_at">
                </div>
            </form>
            <form>
                    <!--<label>画像</label><br>-->
                    <!--<input type="file">-->
                <a class="btn btn-primary" tabindex="" @click="submit">追加</a>
            </form>
            <div class="btn-back">
                <router-link class="btn btn-outline-primary" to="/">戻る</router-link>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    title: "",
                    url: "",
                    // img: "",
                    description: "",
                    isbn: "",
                    author: "",
                    publisher: "",
                    published_at: "",
                    // is_rental: ""
                }
            }
        },
        methods: {
            submit() {
                console.log(this.form)
                this.$store.dispatch("addBook",{
                    form: this.form
                })
                this.$router.push("/")
            }
        },
        async mounted() {

        }
    }
</script>

<style>
.btn-back{
    padding-top: 15px;
    padding-bottom: 20px;
}
</style>