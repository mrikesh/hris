<template>
    <div class="todo-list">
      <h1>Todo List</h1>
      
      <form @submit.prevent="addTask">
        <input v-model="newTask.title" placeholder="Task title" required>
        <input v-model="newTask.description" placeholder="Task description">
        <button type="submit">Add Task</button>
      </form>
  
      <ul>
        <li v-for="task in tasks" :key="task.id">
          {{ task.title }} - {{ task.description }}
          <button @click="editTask(task.id)">Edit</button>
          <button @click="completeTask(task.id)">Complete</button>
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  import { ref, onMounted } from 'vue';
  import axios from 'axios';
  
  const api = axios.create({
    baseURL: 'http://127.0.0.1:8000/api',
    headers: {
      'X-Requested-With': 'XMLHttpRequest',
      'Content-Type': 'application/json'
    }
  });
  
  export default {
    name: 'TodoList',
    setup() {
      const newTask = ref({ title: '', description: '' });
      const tasks = ref([]);
  
      const fetchTasks = async () => {
        try {
          const response = await api.get('/tasks');
          tasks.value = response.data;
        } catch (error) {
          console.error('Error fetching tasks:', error.response?.data || error.message);
        }
      };
  
      const addTask = async () => {
        try {
          const response = await api.post('/tasks-store', newTask.value);
          tasks.value.push(response.data);
          newTask.value = { title: '', description: '' };
        } catch (error) {
          console.error('Error adding task:', error.response?.data || error.message);
        }
      };
  
      const editTask = async (id) => {
        // Implement edit functionality
        console.log('Edit task:', id);
      };
  
      const completeTask = async (id) => {
        try {
          await api.delete(`/tasks/${id}`);
          tasks.value = tasks.value.filter(task => task.id !== id);
        } catch (error) {
          console.error('Error completing task:', error.response?.data || error.message);
        }
      };
  
      onMounted(fetchTasks);
  
      return {
        newTask,
        tasks,
        addTask,
        editTask,
        completeTask
      };
    }
  };
  </script>