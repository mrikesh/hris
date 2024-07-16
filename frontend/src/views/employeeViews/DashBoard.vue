<template>
<div class="column">
    <div class="col-md-12">
        <span class="parent-title">{{ title }}</span>
    </div>
    <div class="cards">
        <DbCard route="/leave-transaction" dbTitle="Leave Balance" dbNum="7.55" imgBoxBgColor="rgb(142, 106, 178)" iconColor="#ffffff" iconClass="eva eva-pie-chart-outline" />
        <DbCard route="/late-arrival" dbTitle="Late Arrival" dbNum="2" imgBoxBgColor="rgb(237, 132, 132)" iconColor="#ffffff" iconClass="eva eva-clock-outline" />
        <DbCard route="/" dbTitle="No Leave Attendance" dbNum="0" imgBoxBgColor="rgb(237, 132, 132)" iconColor="#ffffff" iconClass="eva eva-calendar-outline" />
        <DbCard route="/missing-checkouts" dbTitle="Missing Checkouts" dbNum="1" imgBoxBgColor="rgb(237, 132, 132)" iconColor="#ffffff" iconClass="eva eva-close-square-outline" />
        <DbCard route="/daily-updates" dbTitle="No Acknowledgements" dbNum="3" imgBoxBgColor="rgb(237, 132, 132)" iconColor="#ffffff" iconClass="eva eva-file-add-outline" />

        <BirthdateBtn />
    </div>
</div>
</template>

<script>
import DbCard from '@/components/DbCard.vue'
import BirthdateBtn from '@/components/BirthdateBtn.vue'
export default {
    name: "DashBoard",
    components: {
        DbCard,
        BirthdateBtn,
    },
    data() {
        return {
            title: "My Status",
        }
    }
}
</script>

<style scoped>
/*.col-md-12{
    padding: 16px 0 0 16px;
  }*/

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
