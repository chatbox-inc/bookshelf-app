export const state = () => ({
    books: []
})

export const mutations = {
    set (state, items) {
        state.books = items
    },
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
        const addBooks = await this.$axios.$post(`${process.env.NUXT_APIDOMAIN}/api/v1/books/add`,{
            form
        })
        ctx.commit("setAddbook",addBooks)
    }
}