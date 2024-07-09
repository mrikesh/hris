<template>
<div class="wrapper">
    <Button class="btn-container" @mouseover="showTooltip" @mouseleave="hideTooltip">
        <i class="material-icons">filter_alt_off</i>
    </Button>
    <div v-if="isTooltipVisible" class="toolTip">
        Clear Filter
    </div>
</div>
</template>

<script>
export default {
    name: "ClearFilterBtn",
    data() {
        return {
            isTooltipVisible: false,
        };
    },
    methods: {
        showTooltip() {
            this.isTooltipVisible = true;
        },
        hideTooltip() {
            this.isTooltipVisible = false;
        },
    },
};
</script>

<style scoped>
.wrapper {
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
    background-color: #e9f1fc;
    color: #2374e1;
}

.btn-container:hover {
    background-color: #d8e5f8;
}

.toolTip {
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
    z-index: 1;
    /* Ensure the tooltip is above other elements */
}
</style>
