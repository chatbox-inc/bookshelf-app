export const state = () => ({
    books: []
})

export const mutations = {
    set (state, items) {
        state.books = items
    },
}

export const actions = {
    load(ctx) {
        const items = [
            {
                "id": 1,
                "title": "PHPの本",
                "detail": "PHPの本詳細"
            },
            {
                "id": 2,
                "title": "HTMLの本",
                "detail": "HTMLの本詳細"
            },
            {
                "id": 3,
                "title": "CSSの本",
                "detail": "CSSの本詳細"
            }

        ]
        ctx.commit("set", items)
    }
}