<template>
    <div class="card">
        <div class="table-top">
            <PageTitle title="Employees" />
        </div>
        <div class="employee-list-container">
            <TableData />
        </div>
        
    </div>
    </template>
    
    <script>
    import PageTitle from '@/components/PageTitle.vue'
    import TableData from '@/components/TableData.vue'
    
    export default {
        name: 'AdminEmployee',
        components: {
            PageTitle,
            TableData,
        },
    }
    </script>