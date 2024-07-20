<template>
<div class="column">
    <div class="col-md-12">
        <span class="parent-title">{{ title }}</span>
    </div>
    <div class="cards">
        <DbCard route="/ad-employee" dbTitle="Employees" dbNum="10" imgBoxBgColor="rgb(142, 106, 178)" iconColor="#ffffff" iconClass="eva eva-people-outline" />
        <DbCard route="/ad-department" dbTitle="Departments" dbNum="2" imgBoxBgColor="rgb(237, 132, 132)" iconColor="#ffffff" iconClass="eva eva-briefcase-outline" />
        <DbCard route="/ad-position" dbTitle="Positions" dbNum="5" imgBoxBgColor="rgb(237, 132, 132)" iconColor="#ffffff" iconClass="eva eva-calendar-outline" />
        <DbCard route="/ad-leave" dbTitle="Leave Request" dbNum="1" imgBoxBgColor="rgb(237, 132, 132)" iconColor="#ffffff" iconClass="eva eva-close-square-outline" />
    </div>
</div>
</template>

<script>
import DbCard from '@/components/DbCard.vue';
export default {
    name: 'AdminDashboard',
    components: {
        DbCard,
    },
    data() {
        return {
            title: 'Dashboard',
        }
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

.db-tables {
    display: flex;
    padding-bottom: 24px;
}
</style>
