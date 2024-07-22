
<template>
  <router-view />
</template>

<script>
import LoginPage from './views/LoginPage.vue';

export default{
  name: 'App',
  components:{
    LoginPage
  }
}
</script>

<style scoped>
#app{
  background-color: #f5f5f5;
}
</style>



