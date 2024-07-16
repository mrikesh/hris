<template>
<div class="card">
    <div class="table-top">
        <PageTitle title="Attendances" />
        <div class="table-control">
            <FilterTab placeholder="Filter by Project" :filter-items="['National Path Labs', 'Animator/Videographer', 'Social Media : academic', 'Student Care', 'Academic', 'Loksewa']" />
            <ClearFilterBtn />
            <RefreshBtn />
        </div>
    </div>
    <TableInfo :theaders="theading" :rows="trows" />
</div>
</template>

<script>
import ClearFilterBtn from '@/components/ClearFilterBtn.vue'
import RefreshBtn from '@/components/RefreshBtn.vue'
import PageTitle from '@/components/PageTitle.vue'
import FilterTab from '@/components/FilterTab.vue'
import TableInfo from '@/components/TableInfo.vue'
export default {
    name: "Attendances",
    components: {
        FilterTab,
        TableInfo,
        PageTitle,
        ClearFilterBtn,
        RefreshBtn,
    },
    data() {
        return {
            theading: ["#", "Date", "Check In", "Work Duration", "Office Timing", "Created At"],
            trows: [
                ["1", "2024-07-02", "10:35", "7 hrs 30 min", "10:30 - 18:00", "Wed, Jun 26, 2024 10:39 AM"],
            ],
        }
    }
}
</script>

<style>
.table-top {
    padding: 12px 16px;
    display: flex;
    justify-content: space-between;
}

.table-control {
    display: flex;
}
</style>
