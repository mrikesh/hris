

<template>
  <div class="container">
    <TodoView />
  </div>

</template>

<script>
import TodoView from './views/TodoView.vue';

export default{
  name: 'App',
  components:{
    TodoView
  }
}
</script>

