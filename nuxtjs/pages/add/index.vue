<template>
    <section>
        <h2>書籍追加</h2>
        <fieldset class="input-group">
            <label for="barcode_upload" class="btn btn-outline-secondary">バーコード画像から書籍情報を検索</label>
            <input id="barcode_upload" class="barcode_input" type="file" accept="image/*" capture="camera" @change="seachByBarcode"/>
        </fieldset>
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
import Quagga from 'quagga';

export default {
    data() {
        return {
            form: {
                title: "",
                url: "",
                img: "",
                description: "",
                isbn: "",
                author: "",
                publisher: "",
                published_at: ""
            },
            config: {
                inputStream: {
                    size: 800,
                    singleChannel: false
                },
                locator: {
                    patchSize: "medium",
                    halfSample: true
                },
                decoder: {
                    readers: [{
                        format: "ean_reader",
                        config: {}
                    }]
                },
                locate: true,
                src: null
            }
        }
    },
    methods: {
        submit() {
            this.$store.dispatch("addBook",{
                form: this.form
            })
            this.$router.push("/")
        },
        seachByBarcode(e) {
            const file = e.target.files[0]
            if (file) {
                this.decode(URL.createObjectURL(file));
            }
        },
        decode(src) {
            this.config.src = src
            Quagga.decodeSingle(this.config, (result) => {
                let isbn = this.formatIsbn(result.codeResult.code)
                this.getBookInfo(isbn)
            });
        },
        formatIsbn(isbn) {
            const isbn3 = isbn.substring(0, 3)
            const isbn10 = isbn.substring(3)
            return isbn3+"-"+isbn10
        },
        getBookInfo(isbn) {
            this.$store.dispatch("addByIsbn", isbn)
        }
    },
    async mounted(){

    }
}
</script>

<style>
.btn-back{
    padding-top: 15px;
    padding-bottom: 20px;
}
.barcode_input {
    display: none;
}
</style>