<template lang="pug">
  div
    router-view
</template>

<script>
  export default {
      data () {
          return {}
      }
  }
</script>

<style>
  html,body {
    height: 100%;
    width: 100%;
    overflow-x: hidden;
    font-family: "Microsoft YaHei", "Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
  }
  a,a:hover,a:focus {
    text-decoration: none!important;
  }
  [v-cloak] {
    display: none;
  }
</style>