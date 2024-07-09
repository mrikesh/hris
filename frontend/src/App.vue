
<template>
  <NavBar />

  <div class="content-container">
    <SideBar />
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

