<template>
    <div class="table-title">
        <span class="parent-title">{{ title }}</span>
    </div>
    </template>
    
    <script>
    export default {
        name: "PageTitle",
        props: {
            title: {
                type: String,
            }
        }
    }
    </script>
    
    <style scoped>
    .parent-title {
        color: #343434;
        font-size: 20px;
        font-weight: 500;
        line-height: 26px;
    }
    </style>
    