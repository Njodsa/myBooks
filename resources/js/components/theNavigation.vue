<template>
  <ul class="header">
    <li :class="[currentPage.includes('books') ? 'active':'']">
      <router-link :to="{name:'books'}">Books</router-link>
    </li>
    <li :class="[currentPage.includes('bookForm') ? 'active':'']">
      <router-link :to="{name:'bookForm'}">Add New Book</router-link>
    </li>
    <li :class="[currentPage.includes('about') ? 'active':'']">
      <router-link :to="{name:'about'}">About AppBooks</router-link>
    </li>
  </ul>
</template>

<script>
    export default {
        computed: {
          currentPage(){
            return this.$route.path;
          }
        }
    }
</script>
