import axios from "axios"
export const state = () => ({
    books: [],
})

export const mutations = {
    setBooks (state, bookDetails) {
        state.books = bookDetails
    },
}

export const actions = {
    // async load(ctx) {
    //     const bookDetails = [
    load(ctx){
        axios.get("http://jsonplaceholder.typicode.com/posts").then((result)=>{
            ctx.commit("set",result.data)
        })
    }
            // {
            //     "id": 1,
            //     "title": "PHPの本",
            //     "detail": "PHPの本詳細",
            //     "url": "内容",
            //     "image": "内容",
            //     "ISBN": "内容",
            //     "author": "内容",
            //     "publisher": "内容",
            //     "publishedYear": "内容",
            //     "rentalHistory": [
            //         {
            //             "rentalHistoryId": 1,
            //             "rentalPersonName": "barbara",
            //             "rentalDateFrom": "2019-03-01",
            //             "rentalDateTo": "2019-03-10",
            //         },
            //         {
            //             "rentalHistoryId": 2,
            //             "rentalPersonName": "barbara2",
            //             "rentalDateFrom": "2019-03-01",
            //             "rentalDateTo": "2019-03-10",
            //         },
            //         {
            //             "rentalHistoryId": 3,
            //             "rentalPersonName": "barbara3",
            //             "rentalDateFrom": "2019-03-01",
            //             "rentalDateTo": "2019-03-10",
            //         }
            //     ]
            // },
            // {
            //     "id": 2,
            //     "title": "HTMLの本",
            //     "detail": "HTMLの本詳細",
            //     "url": "内容",
            //     "image": "内容",
            //     "ISBN": "内容",
            //     "author": "内容",
            //     "publisher": "内容",
            //     "publishedYear": "内容",
            //     "rentalHistory": [
            //         {
            //             "rentalHistoryId": 1,
            //             "rentalPersonName": "barbara",
            //             "rentalDateFrom": "2019-03-01",
            //             "rentalDateTo": "2019-03-10",
            //         }
            //     ]
            // },
            // {
            //     "id": 3,
            //     "title": "CSSの本",
            //     "detail": "CSSの本詳細",
            //     "url": "内容",
            //     "image": "内容",
            //     "ISBN": "内容",
            //     "author": "内容",
            //     "publisher": "内容",
            //     "publishedYear": "内容",
            //     "rentalHistory": [
            //         {
            //
            //         }
            //     ]
            // }
        //]
        // const ip = await this.$axios.$get(`${process.env.NUXT_APIDOMAIN}/api/v1/books`)
        // ctx.commit("setBooks", bookDetails)
        //bookItemsにipを渡してあげる？
    //}
}