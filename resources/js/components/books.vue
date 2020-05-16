<template>
  <div v-if="loading">
    <p>
      Loading ...
    </p>
  </div>
  <div v-else>
    <div v-if="books.length > 0 ">
      <section>
        <div class='table-responsive'>
          <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Author Name</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Genres</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(book, index) in books">
                    <td data-label="ID" scope="row" >{{getOverallIndex(index)}}</td>
                    <td data-label="name">{{ book.name }}</td>
                    <td data-label="Author Name">{{ book.authorname }}</td>
                    <td data-label="ISBN">{{ book.isbn }}</td>
                    <td data-label="Genres">{{ book.genres }}</td>
                    <td data-label="Price">{{ book.price }}</td>
                    <td data-label="Actions">
                        <a @click="deleteBook(book.id,book.name)" class="btn-delete">Delete</a> |
                          <router-link class="btn-update" :to="{name:'updateBook',params:{id:book.id}}">
                            Update
                          </router-link>
                    </td>
                </tr>
            </tbody>
         </table>
        </div>

       </section>
        <paginate
                :page-count="pageCount"
                :click-handler="fetch"
                :prev-text="'Prev'"
                :next-text="'Next'"
                :container-class="'pagination'">
        </paginate>
    </div>
    <div v-else>
      <strong>There is no Data</strong>.
   </div>
 </div>
</template>

<script>
    export default {

        data() {
            return {
               loading: true,
                books: [],
                pageCount: 1,
                pageNum:1,
                endpoint: 'api/books?page='
            };
        },

        created() {
            this.fetch();
        },

        methods: {
            fetch(page = 1) {
                axios.get(this.endpoint + page)
                    .then(({data}) => {
                        this.books = data.data;
                        this.pageCount = data.meta.last_page;
                        this.pageNum = page
                    })
                    .finally(() => (this.loading = false));
            },
            deleteBook(id,name) {
              if(confirm("Do you really want to delete ' "+ name +"' ?")){
                    axios.delete('api/book/'+id+'/destroy')
                    .then(response => this.afterDeleteBook(id));
                  }

            },
            afterDeleteBook(id) {
                this.books = _.remove(this.books, function (book) {
                    return book.id !== id;
                });
            },
            getOverallIndex(index) {
              return (this.pageNum*10)-10 + index + 1
            }
        },

    }
</script>
