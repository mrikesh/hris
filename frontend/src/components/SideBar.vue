<template>
<div class="sidebar">
    <ul>
        <li :class="{ active: isActive('/dashboard') }">
            <router-link to="/dashboard" active-class="active"><i class="eva eva-grid-outline custom-icon"></i> Dashboard</router-link>
        </li>
        <li :class="{ active: isActive('/attendances') }">
            <router-link to="/attendances" active-class="active"><i class="eva eva-activity-outline custom-icon"></i> Attendances</router-link>
        </li>
        <li :class="{ active: isActive('/leave') }">
            <router-link to="/leave" active-class="active"><i class="eva eva-minus-circle-outline custom-icon"></i> Leave</router-link>
        </li>
        <li :class="{ active: isActive('/policy') }">
            <router-link to="/policy" active-class="active"><i class="eva eva-file-text-outline custom-icon"></i> Policy</router-link>
        </li>
        <li :class="{ active: isActive('/profile') }">
            <router-link to="/profile" active-class="active"><i class="eva eva-person-outline custom-icon"></i> Profile</router-link>
        </li>   
    </ul>
</div>
</template>

<script>
export default {
    name: 'SideBar',
    methods: {
        isActive(path) {
            return this.$route.path === path;
        }
    }
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
