export const state = () => ({
    books: [],
    details: [],
    information: null
})

export const mutations = {
    setBooks (state, books) {
        state.books = books
    },
    setBookDetails (state, details) {
        state.details = details
    },
    setIsbn (state, information) {
        state.information = information
    }
}

export const actions = {
    async load(ctx) {
        const bookList = await this.$axios.$get(`${process.env.NUXT_APIDOMAIN}/api/v1/books`)
        ctx.commit("setBooks",bookList)
    },
    async loadDetail(ctx,id) {
        const bookDetail = await this.$axios.$get(`${process.env.NUXT_APIDOMAIN}/api/v1/books/${id}`)
        ctx.commit("setBookDetails",bookDetail)
    },
    async addBook(ctx,{form}) {
        const addBooks = await this.$axios.$post(`${process.env.NUXT_APIDOMAIN}/api/v1/books/add`, form)
    },
    async addByIsbn(ctx,isbn) {
        const bookInformation = await this.$axios.$get(`${process.env.NUXT_APIDOMAIN}/api/v1/books/search`,{
            params: {
                isbn: isbn
            }
        })
        ctx.commit("setIsbn",bookInformation.items[0])
        // console.log("hoge", ctx.state.information)

        // console.log(bookInformation)
        // console.log(bookInformation.items[0].volumeInfo.title)
        // console.log(bookInformation.items[0].volumeInfo.description)
        // console.log(bookInformation.items[0].volumeInfo.authors[0])
        // console.log(bookInformation.items[0].volumeInfo.publishedDate)
        // console.log(bookInformation.items[0].volumeInfo.industryIdentifiers[1].identifier)
    },
}