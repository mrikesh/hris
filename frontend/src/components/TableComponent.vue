<template>
<div class="card">
    <div class="form-title-box">
        <span class="form-title">{{ formTitle }}</span>
    </div>
    <hr />
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

.table-container {
    width: 100%;
}

.table-head {
    background-color: #e6f1fd;
    height: 38px;
    font-size: 16px;
    font-weight: 500;
}

.table-head th {
    padding: 8px 10px;

}

.table-body tr:hover {
    background-color: #f7f7f7;
}

.table-body tr {
    border-bottom: 1px solid #dfdbda;
}

.table-container td {
    padding: 8px 10px;
    max-width: 250px;
    color: #5e5c5c;
    font-size: 16px;
    line-height: 20px;

}


</style>
