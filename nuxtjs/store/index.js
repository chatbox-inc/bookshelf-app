export const state = () => ({
    books: [],
    details: []
})

export const mutations = {
    setBooks (state, books) {
        state.books = books
    },
    setBookDetails (state, details) {
        state.details = details
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
    }
}