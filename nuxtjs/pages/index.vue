<template>
  <section>
    <h2>書籍一覧</h2>
    <div class="text-right mb-3">
      <router-link class="btn btn-outline-primary" to="/add">書籍を追加</router-link>
    </div>

      <table class="table">
          <thead>
          <tr>
              <th>No.</th>
              <th>書籍名</th>
              <th>貸出可否</th>
              <th>累計貸出件数</th>
          </tr>
          </thead>
          <tbody>
          <tr v-for="(book, index) in books" :key="index">
              <td>{{index+1}}</td>
              <td>
                  <!--<router-link :to="`/book/${books[index].number}`">-->
                  <router-link :to="`/book/${book.id}`">
                  {{book.title}}
                  </router-link>
              </td>
              <td>○</td>
              <td>5</td>
          </tr>
          </tbody>
      </table>
  </section>
</template>

<script>
export default {
  data () {
    return {
    }
  },
  computed: {
      books(){
          return this.$store.state.books
      }
  },
  mounted(){
      this.$store.dispatch("load")
    }
 }
</script>

<style>

</style>
