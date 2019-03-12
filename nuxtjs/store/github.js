import firebase from '~/servise/firebase'

export const state = () => {

return {
user:undefined,
posts:[]
    }
  }

export const mutations = {
    setUser(state, user) {
        state.user = user
    }
}


    export const actions = {
    async loginWithUserName({commit}) {
        const provider = new firebase.auth.GithubAuthProvider()
        const result = await firebase.auth().signInWithPopup(provider)
        // var token = result.credential.accessToken
        var user = result.user
        commit("setUser",{ name: user.displayName })
    },
    async INIT_USERS({commit} ){
        firebase.auth().onAuthStateChanged(user => {
            if(user){
                commit("setUser",{ name: user.displayName })
            }else{
                commit("setUser", null)
            }
        })
    }
}
