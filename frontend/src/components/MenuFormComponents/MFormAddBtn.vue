<template>
<div class="btn-container">
    <button class="add-btn" type="submit" required>{{addTitle}}</button>
</div>
</template>

<script>
export default {
    name: 'MFormAddBtn',
    props: {
        addTitle: {
            type: String,
        }
    }
}
</script>

<style scoped>
.btn-container{
    display: flex;
    justify-content: right;
    align-items: center;
}
.add-btn {
    margin: 8px 16px;
    width: 100px;
    height: 35px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: .375rem;
    border: none;
    background-color: #2374e1;
    color: #ffffff;
    font-size: 16px;
    cursor: pointer;
}

.add-btn:hover {
    background-color: #3d84e3;
}

</style>
