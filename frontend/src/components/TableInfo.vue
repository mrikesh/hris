<template>
<table class="table-container">
    <thead class="table-head">
        <tr>
            <th v-for="(theader, index) in theaders" :key="index" class="table-heading">{{ theader }}</th>
        </tr>
    </thead>
    <tbody class="table-body">
        <tr v-for="(row, rowIndex) in rows" :key="rowIndex">
            <td v-for="(cell, cellIndex) in row" :key="cellIndex">{{ cell }}</td>
        </tr>
    </tbody>
</table>
</template>

<script>
export default {
    name: "TableInfo",
    props: {
        theaders: {
            type: Array,
            required: true,
        },
        rows: {
            type: Array,
            required: true,
        }
    }
}
</script>

<style>
.table-container {
    width: 100%;
}

.table-head {
    background-color: #e6f1fd;
    height: 48px;
}

.table-heading {
    padding: 0 16px;
    font-size: 12px;
    font-weight: 500;
}

.table-body tr:hover {
    background-color: #f7f7f7;
}

.table-container td {
    padding: 0 16px;
    max-width: 250px;
    line-height: 48px;
    color: #000000;
    font-size: 13px;
}
</style>
