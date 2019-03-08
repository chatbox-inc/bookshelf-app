export const state = () => ({
    books: [],
    details: [],
    addBook: [],
})

export const mutations = {
    setBooks (state, books) {
        state.books = books
    },
    setBookDetails (state, details) {
        state.details = details
    },
    setAddbook (state, addBook) {
        state.addBook = addBook
    }

}

export const actions = {
    async load(ctx) {
        const bookList = await this.$axios.$get(`${process.env.NUXT_APIDOMAIN}/api/v1/books`)
        console.log(bookList)
        ctx.commit("setBooks",bookList)
    },
    async loadDetail(ctx,id) {
        const bookDetail = await this.$axios.$get(`${process.env.NUXT_APIDOMAIN}/api/v1/books/${id}`)
        ctx.commit("setBookDetails",bookDetail)
    },
    async addBook(ctx) {
        const addBooks = await this.$axios.$post(`${process.env.NUXT_APIDOMAIN}/api/v1/books/add`)
        ctx.commit("setAddbook",addBooks)
    }
}