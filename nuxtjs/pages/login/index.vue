<template>
 <div class="container">


       <button @click="login" class="btn btn-primary text-center">ログインする</button>
 </div>
</template>

<script>
    export default {
        layout: "default",

        async mounted() {
            await this.$store.dispatch("github/INIT_USERS")
        },
        methods: {
            login() {
                this.$store.dispatch("github/loginWithUserName", this.name)
            },
        }
    }
</script>

<style lang="scss" scoped>

</style>
