export const state = () => ({
    books: [],
    details: [],
    information: {
        title: "",
        description: "",
        url: "",
        isbn: "",
        author: "",
        publisher: "",
        published_at: "",
        img: ""
    }
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
        console.log(bookInformation,"bookInformation")
        ctx.commit("setIsbn",bookInformation.items[0])
    },
}