<template>
    <div class="column">
        <div class="col-md-12">
            <span class="parent-title">{{ title }}</span>
        </div>
        <div class="cards">
            <DbCard route="/ad-employee" dbTitle="Employees" dbNum="10" imgBoxBgColor="rgb(142, 106, 178)" iconColor="#ffffff" iconClass="eva eva-people-outline" />
            <DbCard route="/ad-department" dbTitle="Departments" :dbNum="departmentCount" imgBoxBgColor="rgb(237, 132, 132)" iconColor="#ffffff" iconClass="eva eva-briefcase-outline" />
            <DbCard route="/ad-position" dbTitle="Positions" dbNum="5" imgBoxBgColor="rgb(237, 132, 132)" iconColor="#ffffff" iconClass="eva eva-calendar-outline" />
            <DbCard route="/ad-leave" dbTitle="Leave Request" dbNum="1" imgBoxBgColor="rgb(237, 132, 132)" iconColor="#ffffff" iconClass="eva eva-close-square-outline" />
        </div>
        <div class="flex w-full center space between">
            <div class="decision-container">
                <div class="mr-5"><TableComponent formTitle="Attendance Request"/></div>
                <div class="mr-5"><TableComponent formTitle="Leave Request"/></div>
            </div>
            <div class="ml-250">
                <ChartDb />
            </div>
        </div>
    </div>
</template>

<script>
import ChartDb from '@/components/ChartDb.vue';
import DbCard from '@/components/DbCard.vue';
import TableComponent from '@/components/TableComponent.vue';
import axios from 'axios';

export default {
    name: 'AdminDashboard',
    components: {
        DbCard,
        ChartDb,
        TableComponent,
    },
    data() {
        return {
            title: 'Dashboard',
            departmentCount: 0 // Initialize the department count
        }
    },
    async mounted() {
        await this.fetchDepartmentCount(); // Fetch the department count when the component mounts
    },
    methods: {
        async fetchDepartmentCount() {
            try {
                const response = await axios.get('http://127.0.0.1:8000/api/department/count'); // API call to fetch department count
                this.departmentCount = response.data.count; // Set the department count from the response
            } catch (error) {
                console.error('Error fetching department count:', error.response?.data || error.message);
            }
        },
    }
}
</script>

<style>
.parent-title {
    color: #343434;
    font-size: 20px;
    font-weight: 500;
    line-height: 26px;
}

.cards {
    display: flex;
    margin-bottom: 50px;
}

.flex {
    display: flex;
}

.decision-container {
    display: flex;
}
</style>
