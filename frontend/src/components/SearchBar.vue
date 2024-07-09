<template>
    <div class="search-bar-container">
        <input type="text" :placeholder="placeHolder" :style="{width: widthSize}">
        <div class="search-icon">
            <i class="eva eva-search-outline custom-icon"></i>
        </div>
    </div>
</template>

<script>
export default {
    name: "SearchBar",
    props:{
        placeHolder:{
            type: String,
        },
        widthSize:{
            type: String,
            default: '245px',
        }
    }
}
</script>

<style scoped>
.search-bar-container {
    padding: 0 8px;
    display: flex;
    border: .25px solid #c7c1c180;
    border-radius: 4px;
}

.search-bar-container input {
    border: none;
    font-size: 14px;
}

.search-bar-container input:focus {
    outline: none;
    box-shadow: none;
}

.search-icon {
    width: 30px;
    height: 40px;
    padding: 0 0 0 6px;
    display: flex;
    align-items: center;
}

.search-icon .custom-icon {
    font-size: 20px;
    color: #0000008A;
}
</style>