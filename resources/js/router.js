import Vue from 'vue'
import VueRouter from 'vue-router'



Vue.use(VueRouter);

export default new VueRouter({
  model:'History',
  routes: [
    {
      path: '/books',
      name: 'books',
      component: require(/*WebpackChunkName: 'books'*/ "./components/books.vue").default
    },
    {
      path: '/bookForm',
      name: 'bookForm',
      component: require(/*WebpackChunkName: 'creatForm'*/ "./components/createBook.vue").default
    },
    {
      path: '/about',
      name: 'about',
      component: require(/*WebpackChunkName: 'about'*/ "./components/about.vue").default
    },
    {
      path: '/book/:id/edit',
      name: 'updateBook',
      component: require(/*WebpackChunkName: 'updateBook'*/ "./components/updateBook.vue").default,
      props:true
    },
  ]
})
