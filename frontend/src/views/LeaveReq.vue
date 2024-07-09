<template>
<div class="card">
    <div class="table-top">
        <PageTitle title="Leave" />
        <div class="table-control">
            <FilterTab placeholder="Filter by Status" :filter-items="['Approved', 'Applied', 'Edited', 'Rejected']" />
            <ClearFilterBtn />
            <RefreshBtn />
            <AddBtn />
        </div>
    </div>
    <TableInfo :theaders="theading" :rows="trows" />
</div>
</template>

<script>
import AddBtn from '../components/AddBtn.vue'
import RefreshBtn from '../components/RefreshBtn.vue'
import ClearFilterBtn from '../components/ClearFilterBtn.vue'
import PageTitle from '../components/PageTitle.vue'
import FilterTab from '../components/FilterTab.vue'
import TableInfo from '../components/TableInfo.vue'
export default {
    name: "LeaveReq",
    components: {
        FilterTab,
        TableInfo,
        PageTitle,
        AddBtn,
        RefreshBtn,
        ClearFilterBtn,
    },
    data() {
        return {
            theading: ["#", "Start Date", "No Of Day(s)", "Reason", "Status", "Created At", "Actions"],
            trows: [
                ["1", "2024-07-02", "1", "College Work", "Approved", "Wed, Jun 26, 2024 10:39 AM", ""],
            ],
        }
    }
}
</script>
