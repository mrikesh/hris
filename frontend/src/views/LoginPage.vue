<template>
    <div class="container">
        <div class="logo-container">
            <img :src="imageSrc" alt="HR Logo" />
        </div>
        <div class="form-container">
            <div class="form">
                <div class="login-title">
                    <h1>Get Started</h1>
                </div>
                <form>
                    <FormInput inputType="text" placeHolder="UserName/Email*" formName="username" />
                    <FormInput inputType="password" placeHolder="Password *" formName="password" />
                    <FormSubmitBtn submitTitle="Login" />
                    <p class="copyright">2024 © HRIS. All rights reserved.</p>
                </form>
            </div>
        </div>
    </div>
    </template>
    
    <script>
    import FormSubmitBtn from '../components/FormComponents/FormSubmitBtn.vue'
    import FormInput from '../components/FormComponents/FormInput.vue'
    import hrLogo from '@/assets/hrLogo.svg';
    export default {
        name: "LoginPage",
        components: {
            FormInput,
            FormSubmitBtn,
        },
        data() {
            return {
                imageSrc: hrLogo
            };
        }
    }
    </script>
    
    <style scoped>
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

    .login-title{
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
        width: 80%;
    }

    .copyright {
        margin: 10px;
        font-size: 12px;
    }
    </style>
    