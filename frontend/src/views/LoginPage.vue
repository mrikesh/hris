<template>
  <div class="login">
    <h2>Login</h2>
    <form @submit.prevent="login">
      <div v-if="message" :class="{'error': error}">
        {{ message }}
      </div>
      
      <div class="form-group">
        <label for="email">Email:</label>
        <input
          type="email"
          id="email"
          v-model="form.email"
          :class="{'is-invalid': errors.email}"
        />
        <div v-if="errors.email" class="error">{{ errors.email[0] }}</div>
      </div>

      <div class="form-group">
        <label for="password">Password:</label>
        <input
          type="password"
          id="password"
          v-model="form.password"
          :class="{'is-invalid': errors.password}"
        />
        <div v-if="errors.password" class="error">{{ errors.password[0] }}</div>
      </div>

      <button type="submit">Login</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      form: {
        email: '',
        password: ''
      },
      errors: {},
      message: '',
      error: false
    };
  },
  methods: {
    async login() {
      this.errors = {};
      this.message = '';
      this.error = false;

      try {
        const response = await axios.post('/api/login', this.form);
        if (response.data.success) {
          // Store token and user info (for demonstration purposes)
          localStorage.setItem('token', response.data.token);
          localStorage.setItem('user', JSON.stringify(response.data.user));
          
          // Redirect or handle successful login
          this.$router.push({ name: 'dashboard' }); // Adjust as needed
        } else {
          this.message = response.data.message;
          this.error = true;
        }
      } catch (error) {
        if (error.response && error.response.data) {
          const { data } = error.response;
          if (data.message) {
            this.message = data.message;
            this.error = true;
          }
          if (data.errors) {
            this.errors = data.errors;
          }
        } else {
          this.message = 'An unexpected error occurred.';
          this.error = true;
        }
      }
    }
  }
};
</script>

<style scoped>
.login {
  max-width: 400px;
  margin: 0 auto;
  padding: 1rem;
}

.form-group {
  margin-bottom: 1rem;
}

input {
  width: 100%;
  padding: 0.5rem;
}

button {
  padding: 0.5rem 1rem;
}

.error {
  color: red;
  font-size: 0.875rem;
}
</style>
