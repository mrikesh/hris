<template>
<div class="input-wrapper">
    <input :type="inputType" :placeholder="placeHolder" :name="formName" v-model="inputValue">
</div>
</template>

<script>
export default{
    name: "FormInput",
    data(){
        return{
            inputValue: "",
        }
    },
    props:{
        inputType:{
            type: String,
        },
        placeHolder:{
            type: String,
        },
        formName:{
            type: String,
        },
    }
}
</script>

<style>
.input-wrapper{
    margin: 20px 10px;
    width: 400px;
    height: 56px;
    padding: 0px 8px;
    border: .25px solid #c7c1c180;
    border-radius: .375rem;
    background-color: #ffffff;
    display: flex;
    align-items: center;
}

.input-wrapper input{
    border: none;
    font-size: 16px;
    width: 100%;
    padding: 12px 8px;
}

.input-wrapper input:focus {
    outline: none;
    box-shadow: none;
}
</style>