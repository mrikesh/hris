<template>
<div class="form-title-box">
    <span class="form-title">{{formTitle}}</span>
</div>
</template>

<script>
export default {
    name: "MFormTitle",
    props: {
        formTitle: {
            type: String,
        }
    }
}
</script>

<style scoped>

.form-title-box{
    margin: 8px 16px;
    display: flex;
    align-items: center;
}

.form-title {
    color: #5e5c5c;
    font-weight: 500;
    font-size: 20px;
    line-height: 26px;
}
</style>

