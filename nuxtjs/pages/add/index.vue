<template>
    <section>
        <h2>書籍追加</h2>
        <fieldset class="input-group">
            <label for="barcode_upload" class="btn btn-outline-secondary">バーコード画像から書籍情報を検索</label>
            <input id="barcode_upload" class="barcode_input" type="file" accept="image/*" capture="camera" @change="searchByBarcode"/>
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
            <div v-if="information">
            <p>{{ information.title }}</p>
            <p>{{ information.description }}</p>
            <p>{{ information.authors}}</p>
            <p>{{ information.publishedDate }}</p>
            </div>
            <!--<div v-if="information">-->
                <!--<p v-for="(item,index) in information.authors" :key="index">-->
                    <!--{{ item.authors }}-->
                <!--</p>-->
            <!--</div>-->
            <div v-if="information">
                <p v-for="(item,index) in information.industryIdentifiers" :key="index">
                    <span v-if="item.type == 'ISBN_13'">
                        {{ item.identifier }}
                    </span>
                </p>
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
    computed: {
        information() {
            if (this.$store.state.information) {
                console.log(this.$store.state.information.volumeInfo, "hoge")
                this.setInformation()
                return this.$store.state.information.volumeInfo

            }
        },
    },
    methods: {
        submit() {
            this.$store.dispatch("addBook",{
                form: this.form
            })
            this.$router.push("/")
        },
        searchByBarcode(e) {
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
        },
        setInformation() {
            if(this.$store.state.information.volumeInfo){
                console.log(this.$store.state.information.volumeInfo.title, "piyo")
                this.form.title = this.$store.state.information.volumeInfo.title
                this.form.description = this.$store.state.information.volumeInfo.description
                this.form.published_at = this.$store.state.information.volumeInfo.publishedDate
                // this.form.title = this.$store.state.information.volumeInfo.title
            }

            // return {
            //     form: {
            //         title: this.$store.state.information.volumeInfo.title,
            //         // url: "",
            //         // img: "",
            //         // description: information.description,
            //         // isbn: "",
            //         // author: information.authors,
            //         // publisher: "",
            //         // published_at: information.publishedDate
            //     },
            // }
        }
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