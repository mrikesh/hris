<template>
<div class="card">
    <div class="form-title-box">
        <span class="form-title">{{ formTitle }}</span>
    </div>
    <hr />
    <div class="table-content">
        <table class="table-container">
            <thead class="table-head">
                <tr>
                    <th v-for="(header, index) in headers" :key="index">{{ header }}</th>
                </tr>
            </thead>
            <tbody class="table-body">
                <tr v-for="(row, rowIndex) in rows" :key="rowIndex">
                    <td v-for="(cell, cellIndex) in row" :key="cellIndex">
                        <slot :name="'cell-' + cellIndex" :cell="cell" :row="row" :rowIndex="rowIndex">{{ cell }}</slot>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</template>

<script>
export default {
    name: 'TableComponent',
    props: {
        formTitle: {
            type: String,
            required: true
        },
        headers: {
            type: Array,
            required: true
        },
        rows: {
            type: Array,
            required: true
        }
    }
}
</script>

<style scoped>
.card {
    min-height: 241px;
}

.form-title-box {
    margin: 8px 16px;
    display: flex;
    align-items: center;
}

.form-title {
    color: #5e5c5c;
    font-weight: 500;
    font-size: 20px;
    line-height: 26px;
}

.table-content {
    margin: 16px 0;
    border: 1px solid #dfdbda;
    overflow-x: auto;
}

.table-container {
    width: 100%;
    border-collapse: collapse;
}

.table-head {
    background-color: #f7f9fc;
    text-align: left;
}

.table-head th {
    padding: 12px 16px;
    font-size: 16px;
    font-weight: 600;
    border-bottom: 2px solid #e0e0e0;
}

.table-body tr {
    transition: background-color 0.3s ease;
}

.table-body tr:hover {
    background-color: #f1f1f1;
}

.table-body td {
    padding: 12px 16px;
    border-bottom: 1px solid #e0e0e0;
    font-size: 14px;
    color: #666;
    line-height: 14px;
}
</style>
