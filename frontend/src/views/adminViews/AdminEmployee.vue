<template>
    <div class="card">
        <div class="table-top">
            <PageTitle title="Employees" />
        </div>
        <div class="employee-list-container">
            
        </div>
        
    </div>
    </template>
    
    <script>
    import PageTitle from '@/components/PageTitle.vue'
    
    export default {
        name: 'AdminEmployee',
        components: {
            PageTitle,
        },
    }
    </script>