<template>
    <section>
        <h2>書籍追加</h2>
        <div>
            <form>
                <div class="form-group">
                    <label>書籍名</label>
                    <input type="text" class="form-control">
                </div>
            </form>
            <form>
                <div class="form-group">
                    <label>書籍詳細</label>
                    <input type="text" class="form-control">
                </div>
            </form>
            <form>
                <div class="form-group">
                    <label>Amazon URL</label>
                    <input type="text" class="form-control">
                </div>
            </form>
            <form>
                <div class="form-group">
                    <label>ISBN</label>
                    <input type="text" class="form-control">
                </div>
            </form>
            <form>
                <div class="form-group">
                    <label>著者</label>
                    <input type="text" class="form-control">
                </div>
            </form>
            <form>
                <div class="form-group">
                    <label>出版社</label>
                    <input type="text" class="form-control">
                </div>
            </form>
            <form>
                <div class="form-group">
                    <label>発行年</label>
                    <input type="text" class="form-control">
                </div>
            </form>
            <form>
                    <label>画像</label><br>
                    <input type="file">
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
                    body: ""
                }
            }
        },
        methods: {
            submit() {
                this.$router.push("/")
            }
        }
    }
</script>

<style>
.btn-back{
    padding-top: 15px;
    padding-bottom: 20px;
}
</style>