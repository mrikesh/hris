<template>
<NavBar />
<div class="content-container">
    <div class="sidebar-container">
        <SideBar :items="sidebarItems" />
    </div>
    <div class="main-content">
        <RouterView />
    </div>
</div>
</template>

<script>
import SideBar from '@/components/SideBar.vue';
import NavBar from '@/components/NavBar.vue';

export default {
    name: 'EmployeeApp',
    components: {
        NavBar,
        SideBar,
    },
    data() {
        return {
            sidebarItems: [{
                    name: 'Dashboard',
                    path: '/dashboard',
                    icon: 'eva eva-grid-outline'
                },
                {
                    name: 'Attendances',
                    path: '/attendances',
                    icon: 'eva eva-activity-outline'
                },
                {
                    name: 'Leave',
                    path: '/leave',
                    icon: 'eva eva-minus-circle-outline'
                },
                {
                    name: 'Policy',
                    path: '/policy',
                    icon: 'eva eva-file-text-outline'
                },
                {
                    name: 'Profile',
                    path: '/profile',
                    icon: 'eva eva-person-outline'
                },
            ],
        };
    },
};
</script>

<style scoped>
.content-container {
    display: flex;
    margin-top: 62px;
}

.main-content {
    margin-left: 46px;
    /* same as the sidebar width */
    padding: 24px;
    background-color: #ffffff;
    height: 100vh;
    width: 100%;
}
</style>
