<template>
<div class="submit-btn-container">
    <button class="submit-btn" type="submit">{{submitTitle}}</button>
</div>
</template>

<script>
export default{
    name: "FormSubmitBtn",
    props:{
        submitTitle:{
            type: String,
        }
    }
}
</script>

<style>
.submit-btn-container{
    margin: 20px 10px;
    width: 400px;
    height: 56px;
}

.submit-btn{
    width: 100%;
    height: 100%;
    border: none;
    background-color: #2374E1;
    color: #ffffff;
}

.submit-btn:hover{
    background-color: #4f90e7;
}
</style>