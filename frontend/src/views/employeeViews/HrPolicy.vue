<template>
<div class="card">
    <div class="table-top">
        <PageTitle title="HR Policy" />
    </div>
    <div class="policy-list-container">
        <div class="policy-content">
            <PolicyInfo policyTitle="Salary Policy" />
            <PolicyInfo policyTitle="Revised Leave Policy" />
            <PolicyInfo policyTitle="Interim HR Policy" />
            <PolicyInfo policyTitle="ISMS Manual" />
            <PolicyInfo policyTitle="Secure Coding Best Practice Policy" />
            <PolicyInfo policyTitle="Software Development Life Cycle" />
        </div>
    </div>
</div>
</template>

<script>
import PolicyInfo from '@/components/PolicyInfo.vue';
import PageTitle from '@/components/PageTitle.vue';
export default {
    name: "Training",
    components: {
        PageTitle,
        PolicyInfo,
    },
}
</script>

<style scoped>
.policy-list-container {
    display: flex;
    justify-content: center;
    padding-bottom: 16px;
}

.policy-content{
    width: 70%;
}
</style>
