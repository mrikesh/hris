<template>
<div class="btn-wrapper">
    <button class="btn-container" @mouseover="showTooltip" @mouseleave="hideTooltip">
        <i class="material-icons">add</i>
    </button>
    <div v-if="isTooltipVisible" class="tooltip">
        Add
    </div>
</div>
</template>

<script>
export default {
    name: "AddBtn",
    data() {
        return {
            isTooltipVisible: false
        }
    },
    methods: {
        showTooltip() {
            this.isTooltipVisible = true;
        },
        hideTooltip() {
            this.isTooltipVisible = false;
        }
    }
}
</script>

<style scoped>
.btn-wrapper {
    position: relative;
    display: inline-block;
}

.btn-container {
    margin-left: 8px;
    width: 42px;
    height: 42px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    border: none;
    background-color: #2374e1;
    color: #ffffff;
    font-size: 24px;
    cursor: pointer;
}

.btn-container:hover {
    background-color: #3d84e3;
}

.tooltip {
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translateX(-50%);
    margin-top: 8px;
    padding: 4px 8px;
    background-color: #757575;
    color: #ffffff;
    border-radius: 4px;
    font-size: 12px;
    white-space: nowrap;
    opacity: 0;
    animation: fadeIn 0.3s forwards;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }

    to {
        opacity: 1;
    }
}
</style>
