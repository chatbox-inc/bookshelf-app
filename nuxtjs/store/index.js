export const state = () => ({
    books: [],
})

export const mutations = {
    setBooks (state, bookDetails) {
        state.books = bookDetails
    },
}

export const actions = {
    async load(ctx) {
        const bookList = await this.$axios.$get(`${process.env.NUXT_APIDOMAIN}/api/v1/books`)
        console.log(bookList)
        ctx.commit("setBooks",bookList)
    }
}