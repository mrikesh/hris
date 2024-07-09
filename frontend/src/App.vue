
<template>
  <NavBar />

  <div class="content-container">
    <div class="sidebar-container">
      <SideBar />
    </div>
    <div class="main-content">
      <RouterView />
    </div>
  </div>
</template>

<script>
import SideBar from './components/SideBar.vue'
import NavBar from './components/NavBar.vue';
import TodoView from './views/TodoView.vue';

export default{
  name: 'App',
  components:{
    TodoView,
    NavBar,
    SideBar,
  }
}
</script>

<style scoped>
.content-container{
  display: flex;
  margin-top: 62px;
}

.main-content {
  margin-left: 46px;
  /* same as the sidebar width */
  padding: 24px;
  background-color: #ffffff;
  height: 100vh;
  width: 100%;
}
</style>

