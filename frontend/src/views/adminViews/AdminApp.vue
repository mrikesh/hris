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
    name: 'AdminApp',
    components: {
        NavBar,
        SideBar,
    },
    data() {
        return {
            sidebarItems: [{
                    name: 'Dashboard',
                    path: '/ad-dashboard',
                    icon: 'eva eva-grid-outline'
                },
                {
                    name: 'Employees',
                    path: '/ad-employee',
                    icon: 'eva eva-people-outline'
                },
                {
                    name: 'Departments',
                    path: '/ad-department',
                    icon: 'eva eva-briefcase-outline'
                },
                {
                    name: 'Position',
                    path: '/ad-position',
                    icon: 'eva eva-person-outline'
                },
                {
                    name: 'Attendances',
                    path: '/ad-attendance',
                    icon: 'eva eva-activity-outline'
                },
                {
                    name: 'Leave',
                    path: '/ad-leave',
                    icon: 'eva eva-minus-circle-outline'
                },
                {
                    name: 'Policy',
                    path: 'policy',
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
