<template>
    <div class="card">
      <div class="table-top">
        <PageTitle title="Leave" />
        <div class="toolbar">
          <AddAttendanceBtn />
        </div>
      </div>
      <div class="leave-container">
        <TableComponent :formTitle="'Leave Application'" :headers="headers" :rows="employeeRows">
          <template v-slot:cell-4="{ rowIndex }">
            <button class="edit-btn" @click="editEmployee(rowIndex)">Edit</button>
            <button class="delete-btn" @click="deleteEmployee(rowIndex)">Delete</button>
          </template>
        </TableComponent>
      </div>
    </div>
  </template>
  
  <script>
  import PageTitle from '@/components/PageTitle.vue';
  import TableComponent from '@/components/TableComponent.vue';
  import AddAttendanceBtn from '@/components/AddAttendanceBtn.vue';
  
  export default {
    name: 'AdminLeave',
    components: {
      PageTitle,
      TableComponent,
      AddAttendanceBtn,
    },
    data() {
      return {
        headers: ['S.no', 'Employee Id', 'Employee Name', 'Start-Date', 'End-Date', 'Duration', 'Description', 'Status', 'Actions'],
        employeeRows: [
          { id: 1, employeeId: '114', name: 'John Doe', start_date: '2024-7-25', end_date: '2024-7-25', duration: '1days', desc: 'sick', status:'pending'},
        ]
      };
    },
    methods: {
      editEmployee(rowIndex) {
        console.log('Edit employee at index:', rowIndex);
      },
      deleteEmployee(rowIndex) {
        console.log('Delete employee at index:', rowIndex);
      }
    }
  };
  </script>
  
  
  <style scoped>
  
  .leave-container{
    padding: 0px 16px;
  }
  
  .table-top{
    display: flex;
    justify-content: space-between;
  }
  
  .edit-btn,
  .delete-btn {
    margin-right: 10px;
    border-radius: 4px;
    color: #ffffff;
    font-size: 14px;
    padding: 5px 10px;
    border: none;
    cursor: pointer;
  }
  
  .edit-btn {
    background-color: #2374E1;
  }
  
  .edit-btn:hover {
    background-color: #256fce;
  }
  
  .delete-btn {
    background-color: #da1010;
  }
  
  .delete-btn:hover {
    background-color: #c70d0d;
  }
  </style>
  