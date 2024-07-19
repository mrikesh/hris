<template>
    <div class="login-container">
        <div class="container">
            <div class="logo-container">
                <img :src="imageSrc" alt="HR Logo" />
            </div>
            <div class="form-container">
                <div class="form">
                    <div class="login-title">
                        <h1>Get Started</h1>
                    </div>
                    <form @submit.prevent="handleSubmit">
                        <FormInput v-model="email" inputType="text" placeHolder="Email*" formName="email" />
                        <FormInput v-model="password" inputType="password" placeHolder="Password *" formName="password" />
                        <FormSubmitBtn submitTitle="Login" />
                        <p class="copyright">2024 © HRIS. All rights reserved.</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </template>
    
    <script>
    import axios from 'axios';
    import FormSubmitBtn from '../components/FormComponents/FormSubmitBtn.vue';
    import FormInput from '../components/FormComponents/FormInput.vue';
    import hrLogo from '@/assets/hrLogo.svg';
    
    export default {
        name: "LoginPage",
        components: {
            FormInput,
            FormSubmitBtn,
        },
        data() {
            return {
                email: '',
                password: '',
                imageSrc: hrLogo,
            };
        },
        methods: {
            async handleSubmit() {
                try {
                    const response = await axios.post('/api/login', {
                        email: this.email,
                        password: this.password,
                    });
    
                    if (response.data.success) {
                        localStorage.setItem('token', response.data.token);
                        if (response.data.role === 'admin') {
                            this.$router.push({ name: 'ad-dashboard' });
                        } else if (response.data.role === 'employee') {
                            this.$router.push({ name: 'dashboard' });
                        }
                    } else {
                        alert('Invalid login credentials');
                    }
                } catch (error) {
                    console.error('Login error:', error);
                    alert('An error occurred during login.');
                }
            }
        }
    };
    </script>
    
    <style scoped>
    .login-container {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }
    
    .container {
        padding: 16px;
        width: 100%;
        display: flex;
        border: 1px solid #c7c1c180;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    .form-container {
        width: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .login-title {
        margin: 10px;
    }
    
    .logo-container {
        width: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        border-right: 1px solid #c7c1c180;
    }
    
    .logo-container img {
        width: 65%;
    }
    
    .copyright {
        margin: 10px;
        font-size: 12px;
    }
    </style>
    