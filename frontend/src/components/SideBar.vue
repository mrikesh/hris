<template>
<div class="sidebar">
    <ul>
        <li v-for="item in items" :key="item.path" :class="{ active: isActive(item.path) }">
            <router-link :to="item.path" active-class="active">
                <i :class="item.icon + ' custom-icon'"></i> {{ item.name }}
            </router-link>
        </li>
    </ul>
</div>
</template>

  
<script>
export default {
    name: 'SideBar',
    props: {
        items: {
            type: Array,
            required: true,
        },
    },
    methods: {
        isActive(path) {
            return this.$route.path === path;
        },
    },
};
</script>

  
<style scoped>
.sidebar {
    border: 1px solid #dfdbda;
    width: 50px;
    height: calc(100vh - 62px);
    position: fixed;
    top: 62px;
    left: 0;
    background-color: #ffffff;
    transition: 0.3s;
    z-index: 1000;
}

.sidebar:hover {
    width: 280px;
}

.sidebar ul {
    list-style: none;
    padding: 0;
    margin: 0;
    height: 100%;
    overflow-y: auto;
}

.sidebar ul::-webkit-scrollbar {
    width: 8px;
}

.sidebar ul::-webkit-scrollbar-thumb {
    background-color: #cccccc;
    border-radius: 4px;
}

.sidebar ul::-webkit-scrollbar-track {
    background: transparent;
}

.sidebar ul:hover::-webkit-scrollbar {
    display: block;
}

.sidebar ul::-webkit-scrollbar {
    display: none;
}

.sidebar ul li {
    padding: 12px;
    text-align: left;
    white-space: nowrap;
    line-height: 30px;
    display: flex;
    align-items: center;
    cursor: pointer;
}

.sidebar ul li:hover {
    background-color: #f0f0f0;
}

.sidebar ul li a {
    color: #5e5c5c;
    text-decoration: none;
    display: flex;
    align-items: center;
    font-size: 14px;
    font-weight: 500;
    width: 100%;
}

.custom-icon {
    margin-right: 25px;
}

.eva {
    font-size: 24px;
}

.sidebar ul li.active {
    background-color: #d8d7d7;
}

.sidebar ul li.active a {
    color: #1e1d1d;
}
</style>
